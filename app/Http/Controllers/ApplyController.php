<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Job;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ApplyController extends Controller
{
    public function show($jobSlug)
    {
        $job = Job::query()->select('slug', 'title')->where('slug', $jobSlug)->firstOrFail();
        return Inertia::render('Apply/Show', compact('job'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:5|max:191',
            'jobSlug' => 'required|string|min:5|max:191',
            'email' => 'required|email',
            'description' => 'required|array|min:2',
        ]);

        $job = Job::query()->where('slug', $request->get('jobSlug'))->firstOrFail();

        $application = new Application;
        $application->job_id = $job->id;
        $application->name = $request->get('name');
        $application->email = $request->get('email');
        $application->phone = $request->get('phone');
        $application->save();

        return back();
    }
}
