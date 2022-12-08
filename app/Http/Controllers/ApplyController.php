<?php

namespace App\Http\Controllers;

use App\Http\Resources\JobResource;
use App\Jobs\SendRawEmailNotification;
use App\Models\Application;
use App\Models\Job;
use App\Models\JobPost;
use App\Models\Tracking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;

class ApplyController extends Controller
{
    public function show($jobSlug)
    {
        $job = JobPost::query()
            ->select('slug', 'title', 'company_id')
            ->where('slug', $jobSlug)
            ->with('company:id,name')
            ->firstOrFail();


        $canonicalUrl = url('apply');

        return Inertia::render('Apply/Show', compact('job', 'canonicalUrl'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:5|max:191',
            'jobSlug' => 'required|string|min:5|max:191',
            'email' => 'required|email',
            'resume' => 'required|array|min:2',
        ]);

        $job = JobPost::query()->where('slug', $request->get('jobSlug'))
            ->with('company')
            ->firstOrFail();

        $application = new Application;
        $application->job_id = $job->id;
        $application->name = $request->get('name');
        $application->email = $request->get('email');
        $application->phone = $request->get('phone');
        $application->resume = json_encode($request->get('resume'));
        $application->save();

        $message = 'Name: '. $application->name;
        $message .= " \nJob Title: " . $job->title;
        $message .= " \nCompany Name: " . $job->company->name;

        SendRawEmailNotification::dispatch('New Application Submitted', $message);

        return Inertia::render('Apply/Success')->with('queueWorkerStart', true);
    }
}
