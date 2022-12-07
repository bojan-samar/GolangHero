<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Http\Resources\JobResource;
use App\Models\Company;
use App\Models\Job;
use App\Models\JobPost;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Inertia\Inertia;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth')->only('create');
        $this->middleware('hasCompany')->only('create');
    }

    public function index(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string|min:2|max:100',
            'title-only' => 'nullable|string|min:2|max:3',
            'url' => 'nullable|string|min:2',
        ]);

        $isHoneyPot = Helpers::isHoneyPot(\request()->url, \request()->search);
        if ($isHoneyPot){
            $jobs = null;
            Log::alert('Bot Searching Jobs - ' . \request()->search);
        }

        $jobs = JobPost::query()
            ->filter()
            ->active()
            ->orderBy('order_by_date','desc')
            ->with(['company'])
            ->paginate(30)
            ->withQueryString();


        $jobs->links = $jobs->onEachSide(0)->links();

        $jobs = JobResource::collection($jobs);

        $canonicalUrl = url()->current();

        return Inertia::render('Job/Index', compact('jobs','canonicalUrl'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->credits < 1){
            return redirect()->route('pricing')->with('error', 'Oops, Please purchase a job package first.');
        }
        return view('job.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $jobOriginal = JobPost::query()
            ->where('slug', $slug)
            ->with(['company'])
            ->firstOrFail();

        $job = JobResource::make($jobOriginal);

        $similarJobs = DB::table('job_posts')
            ->select('*')
            ->selectRaw("MATCH (`title`) AGAINST ('". $jobOriginal->title ."' IN NATURAL LANGUAGE MODE) AS score")
            ->where([
                ['company_id','!=', $jobOriginal->company->id],
                ['status',1],
                ['expired_at',">=", now()]
            ])
            ->orderBy('score', 'desc')
            ->limit(5)
            ->get();

        $secondJob = null;
        if ($similarJobs->count()){
            $secondJobSlug = $similarJobs[0]->slug;
            $secondJob = JobResource::make(
                JobPost::where('slug', $secondJobSlug)->with('company')->first()
            );
        }

        $similarJobs->transform(function ($item, $key) {
            return [
                'slug' => $item->slug,
                'title' => $item->title,
            ];
        });

        return Inertia::render('Job/Show', compact('job', 'similarJobs', 'secondJob'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        //
    }

    public function success($slug)
    {
        $job = JobPost::where('slug', $slug)->firstOrFail();
        return view('job.success', compact('job'));
    }

    public function apply($slug)
    {
        $job = JobPost::where('slug', $slug)->with(['company', 'user'])->firstOrFail();
        $alreadyApplied = Application::where([
            'user_id' => auth()->user()->id,
            'job_id' => $job->id
        ])->first();
        if ($alreadyApplied){
            return redirect()->route('job.show', $job->slug)->with('error', 'You already applied for this job');
        }
        $job->increment('apply_clicks');

        return view('job.apply', compact('job'));
    }

    public function remote()
    {
        $jobs = JobPost::filter()
            ->where('remote', 1)
            ->active()
            ->orderBy('order_by_date','desc')
            ->with('company')
            ->paginate(100)
            ->withQueryString();

        return view('job.remote', compact('jobs'));
    }

    public function unsubscribe_alert($uuid)
    {
        $alert = JobAlert::where('uuid', $uuid)->firstOrFail();
        $alert->delete();
        return view('job.alert.unsubscribe');
    }

    public function jobTweet($uuid)
    {
        $job = JobPost::where('uuid', $uuid)->with('company')->firstOrFail();
        $job->meta = $job->meta ? array_merge($job->meta,['tweeted' => true]) : ['tweeted' => true];
        $job->save();

        $company = $job->company;
        $company_name = $company->twitter ? '@' . $company->twitter : $company->name;
        $hashtags = Arr::shuffle(["#blockchainjobs","#cryptojobs","#remotework","#remotejobs","#wfh"]);
        $twitter_text = rawurlencode($company_name .' is looking for a ' . $job->title . ' - ' . implode(' ', $hashtags));
        $url = rawurlencode('https://hellocryptojobs.com/job/' . $job->slug);
        $twitter_url = 'http://twitter.com/intent/tweet?text=' . $twitter_text .'&url='. $url;

        return redirect($twitter_url);
    }
}
