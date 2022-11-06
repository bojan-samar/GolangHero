<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Job;
use Illuminate\Http\Request;

class ApplyController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:5|max:191',
            'jobSlug' => 'nullable|string|min:5|max:191',
            'email' => 'required|email',
            'postalCode' => 'required|string|min:5|max:5',
            'experience' => 'required|string|min:5|max:191',
            'endorsement' => 'nullable|string|min:5|max:191',
            'freightType' => 'required|string|min:5|max:191',
            'driverType' => 'required|string|min:5|max:191',
            'cdlStatus' => 'required|boolean',
        ]);

        $jobSlug = $request->get('jobSlug');
        $jobId = 1;
        if ($jobSlug){
            $job = Job::query()->where('slug', $request->get('jobSlug'))->firstOrFail();
            $jobId = $job->id;
        }


        $application = new Application;
        $application->job_id = $jobId;
        $application->name = $request->get('name');
        $application->email = $request->get('email');
        $application->postal_code = $request->get('postalCode');
        $application->phone = $request->get('phone');
        $application->bday_year = $request->get('bdayYear');
        $application->cdl_status = $request->get('cdlStatus');
        $application->experience = $request->get('experience');
        $application->endorsement = $request->get('endorsement');
        $application->freight_type = $request->get('freightType');
        $application->driver_type = $request->get('driverType');
        $application->save();

        return back();
    }
}
