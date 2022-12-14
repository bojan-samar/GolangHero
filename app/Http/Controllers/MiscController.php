<?php

namespace App\Http\Controllers;

use App\Http\Resources\JobResource;
use App\Mail\Misc\ContactUsEmail;
use App\Models\Company;
use App\Models\JobPost;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;

class MiscController extends Controller
{
    public function welcome(Request $request)
    {
        $jobs = JobPost::query()
            ->active()
            ->orderBy('order_by_date', 'desc')
            ->with(['company'])
            ->paginate(80)
            ->withQueryString();

        $jobs->links = $jobs->onEachSide(1)->links();
        $jobs = JobResource::collection($jobs);
        $jobsTotalCount = $jobs->total();

        $companyCount = Company::query()->selectRaw("count(id) as companyCount")->active()->first();
        $companyCount = $companyCount->companyCount;

        return Inertia::render('Welcome', compact('jobs', 'jobsTotalCount', 'companyCount'));
    }

    public function contactStore(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:1', 'max:191'],
            'email' => ['required', 'string', 'email', 'max:191'],
            'message' => ['required', 'string', 'min:5', 'max:191'],
        ]);

        Mail::to( config('mail.from.address') )->queue(new ContactUsEmail($request->all()));


        return $request->wantsJson()
            ? new JsonResponse('', 200)
            : back();
    }

    public function queueWorkerStart()
    {
        //        $schedule->command('queue:work --stop-when-empty')->everyFiveMinutes();
        Artisan::call('queue:work --stop-when-empty', []);
    }
}
