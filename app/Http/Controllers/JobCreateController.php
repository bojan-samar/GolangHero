<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Job;
use App\Models\Order;
use App\Rules\QuillInputRule;
use Illuminate\Http\Request;
use \App\Http\Traits\JobTrait;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

class JobCreateController extends Controller
{
    use JobTrait;

//    public function __construct()
//    {
//        $this->middleware(function ($request, $next) {
//            if (\auth()->user()->credits < 1){
//                return redirect()->route('pricing')->with('error', 'Oops, Please purchase a job package first.');
//            }
//            return $next($request);
//        });
//    }

    public function index()
    {
        $companies = null;
        if (\request()->get('search')){
            $companies = Company::query()->filter()->paginate(50);
        }

        return Inertia::render('JobCreate/Index', compact( 'companies'));
    }

    public function details(Request $request, $companySlug)
    {
        $jobModel = new Job;
        $types = $jobModel->jobTypes;
        $company = Company::query()->where('slug', $companySlug)->first();
        $company = $company->only(['name', 'slug']);
        if (!$company){
            return back()->with('danger', 'Select valid company');
        }

        return Inertia::render('JobCreate/Details', compact( 'company', 'types'));
    }



    public function pay($jobUuid)
    {
        $job = Job::where('uuid', $uuid)->with('order')->firstOrFail();

        if ($job->order){
            return redirect()->route('job-create')->with('error','This job has been paid for already.');
        }

        //Activate job post if no additional cost to process.
        $totalJobCost = $this->calculateTotal($job->meta);
        if ($totalJobCost == 0){
            $job->status = 1;
            $job->save();

            if (array_key_exists('useCredit', $job->meta)) {
                if (\auth()->user()->credits > 0){
                    auth()->user()->decrement('credits');
                }
            }

            return redirect()->route('job.success', $job->slug);
        }

        return view('job.create.pay',[
            'job' => $job,
            'total' => $totalJobCost,
        ]);
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'company_slug' => 'required|string|min:1|max:191|exists:companies,slug',
            'title' => 'required|string|min:1|max:191',
            'type' => 'required|string|min:1|max:191',
            'url' => 'nullable|string|min:1|max:191',
            'remote' => 'required|boolean',
            'location' => 'nullable|string|min:1|max:191',
            'apply_url' => 'required|string|min:1|max:800',
        ]);

        $company = Company::query()->where('slug', $request->get('company_slug'))->first();
        //If the company slug does not exist, redirect back to company selection.
        if (!$company){
            return redirect()->route('job-create')->with('flash.danger', 'Company you selected does not exist. Select a again.');
        }


        $job = new Job();
        $job->user_id = auth()->user()->id;
        $job->company_id = $company->id;
        $job->title = $request->title;
        $job->type = $request->type;
        $job->remote = $request->remote;
        $job->apply_url = $request->apply_url;
        $job->salary_min = $request->salary_min;
        $job->salary_max = $request->salary_max;
        $job->location = $request->location;
        $job->description = json_encode($request->description);
        $job->save();

        return redirect()->route('checkout', $job->slug);
    }

    protected function storeDetail($request)
    {
        $request->validate([
            'company_uuid' => 'required|uuid',
            'title' => 'required|string|min:1|max:191',
            'type' => 'required|string|min:1|max:191',
            'url' => 'nullable|string|min:1|max:191',
            'remote' => 'required|string|min:1|max:191',
            'location' => 'nullable|string|min:1|max:191',
        ]);

        $job = Job::where('uuid', $request->uuid)->first();
        if (!$job){
            $company = Company::where('uuid', $request->company_uuid)->firstOrFail();
            $job = new Job();
            $job->company_id = $company->id;
        }
        $job->user_id = auth()->user()->id;
        $job->uuid = $request->uuid;
        $job->title = $request->title;
        $job->type = $request->type;
        $job->remote = $request->remote;
        $job->apply = $request->url;
        $job->location = $request->location;
        $job->save();
    }


    protected function storeSalary($request)
    {
        $request->validate([
            'pay_min' => 'nullable|numeric',
            'pay_max' => 'nullable|numeric',
            'pay_type' => 'nullable|string|min:1|max:191',
        ]);

        $job = Job::where('uuid', $request->uuid)->firstOrFail();
        $job->pay_min = $request->pay_min;
        $job->pay_max = $request->pay_max;
        $job->pay_type = $request->pay_type;
        $job->save();
    }

    protected function storeDescription($request)
    {
        $request->validate([
            'description' => ['bail','nullable', 'string', new QuillInputRule()],

        ]);

        $description = $request->description;

        $job = Job::where('uuid', $request->uuid)->firstOrFail();
        $job->description = $description;
        $job->save();
    }

    protected function storeDesign($request)
    {
        $request->validate([
            'uuid' => 'required|uuid',
            'showLogo' => 'nullable|string|max:3',
            'highlight' => 'nullable|string|max:3',
            'highlightColor' => 'nullable|string|max:10',
            'useCredit' => 'nullable|string|max:3',
            'featured' => 'required|numeric|max:30',
        ]);

        $meta = [];

        $showLogo = $request->get('showLogo');
        if ($showLogo){
            $meta['showLogo'] = true;
        }

        $useCredit = $request->get('useCredit');
        if ($useCredit){
            $meta['useCredit'] = true;
        }

        $highlight = $request->get('highlight');
        if ($highlight){
            $meta['highlight'] = true;
            $meta['styles'] = [
                'color'=> $request->get('highlightColor'),
                'background'=> $request->get('highlightBackground')
            ];
        }

        $job = Job::where('uuid', $request->uuid)->firstOrFail();

        $featuredDays = intval($request->get('featured'));
        if ($featuredDays){
            $meta['featured'] = $featuredDays;
            $job->order_by_date = now()->addDays($featuredDays);
        }

        $job->meta = $meta;
        $job->save();
    }


    public function calculateTotal($meta)
    {
        $total = 0;

        if (array_key_exists('showLogo', $meta)) {
            $total += 1999;
        }

        if (array_key_exists('highlight', $meta)) {
            $total += 4999;
        }

        if (array_key_exists('featured', $meta)) {
            switch ($meta['featured']) {
                case 1:
                    $total += 2999;
                    break;
                case 7:
                    $total += 11999;
                    break;
                case 30:
                    $total += 21999;
                    break;
            }
        }

        if (array_key_exists('useCredit', $meta)) {
            if (\auth()->user()->credits < 1){
                $total += 20000;
            }
        }else{
            $total += 20000;
        }

        return $total;
    }


    public function submit(Request $request)
    {
        $request->validate([
            'job' => 'required|uuid',
            'paymentMethod' => 'required|string|min:5|max:300',
        ]);

        $job = Job::where('uuid', $request->job)->first();

        if (! $job){
            return back()->with('error','Job Does Not Exist');
        }

        $totalJobCost = $this->calculateTotal($job->meta);

        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $order_uuid = Str::uuid();

        try {
            $charge = $stripe->paymentIntents->create([
                'amount' => $totalJobCost,
                'currency' => 'usd',
                'payment_method' => $request->paymentMethod,
                'description' => $job->title . ' - ' . config('app.name'),
                'confirm' => true,
                'receipt_email' => auth()->user()->email,
                "metadata" => ["order_id" => $order_uuid]
            ]);

        } catch (\Stripe\Exception\CardException $e) {
            return back()->with('error','An error occurred: ' . $e->getError()->message)->withInput();
        }

        $job->status = 1;
        if (array_key_exists('featured', $job->meta)) {
            $job->order_by_date = now()->addDays($job->meta['featured']);
        }
        $job->save();

        $order = new Order;
        $order->uuid = $order_uuid;
        $order->job_id = $job->id;
        $order->processor = 'stripe';
        $order->processor_id = $charge->id;
        $order->user_id = auth()->user()->id;
        $order->total = $totalJobCost;
        $order->plan_name = $job->title;
        $order->save();

        if (array_key_exists('useCredit', $job->meta)) {
            if (\auth()->user()->credits > 0){
                auth()->user()->decrement('credits');
            }
        }

        return redirect()->route('job.success', $job->slug);
    }

}
