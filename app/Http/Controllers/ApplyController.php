<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Job;
use App\Models\Tracking;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ApplyController extends Controller
{
    public function show($jobSlug)
    {
        $job = Job::query()
            ->select('slug', 'title', 'company_id')
            ->where('slug', $jobSlug)
            ->with('company:id,name')
            ->firstOrFail();

        return Inertia::render('Apply/Show', compact('job'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:5|max:191',
            'jobSlug' => 'required|string|min:5|max:191',
            'email' => 'required|email',
            'resume' => 'required|array|min:2',
        ]);

        $job = Job::query()->where('slug', $request->get('jobSlug'))->firstOrFail();

        $application = new Application;
        $application->job_id = $job->id;
        $application->name = $request->get('name');
        $application->email = $request->get('email');
        $application->phone = $request->get('phone');
        $application->resume = json_encode($request->get('resume'));
        $application->save();

        $application->job = $job;

        $trackingModel = new Tracking;
        $tracking = $trackingModel->getTracking();
        if ($tracking){
            $tracking = new Tracking($tracking);
            $application->tracking()->save($tracking);
        }

        return Inertia::render('Apply/Success');
    }
}
