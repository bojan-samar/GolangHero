<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Job;
use App\Models\JobImport;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;

class JobImportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = JobImport::query()
            ->select('id', 'title', 'company_name', 'salary_min', 'salary_max')
            ->filter()
            ->latest()->active()->paginate(50);

        $sort = \request()->get('sort');
        $direction = \request()->get('direction');


        return Inertia::render('Admin/JobImport/Index', compact('jobs', 'sort', 'direction'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\JobImport  $jobImport
     * @return \Illuminate\Http\Response
     */
    public function show(JobImport $jobImport)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobImport  $jobImport
     * @return \Illuminate\Http\Response
     */
    public function edit(JobImport $jobImport)
    {
        $jobModel = new Job;
        $types = $jobModel->jobTypes;
        $jobImport->load(['company']);

        return Inertia::render('Admin/JobImport/Edit', [
            'job' => $jobImport,
            'jobTypes' => $types
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JobImport  $jobImport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobImport $jobImport)
    {
        $request->validate([
            'title' => 'required|string|min:2|max:191',
            'company_slug' => 'required|string|min:2|max:191',
            'company_name' => 'required|string|min:2|max:191',
            'description' => 'required|array|min:2',
            'location' => 'nullable|string|min:2',
            'salary_min' => 'nullable|numeric',
            'salary_max' => 'nullable|numeric',
            'job_type' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        $company = Company::where('slug', $request->get('company_slug'))->first();

        $job = new Job;
        $job->user_id = 1;
        $job->company_id = $company->id;
        $job->title = $request->get('title');
        $job->location = $request->get('location');
        $job->description = json_encode($request->get('description'));
        $job->salary_min = $request->get('salary_min');
        $job->salary_max = $request->get('salary_max');
        $job->type = $request->get('job_type');
        $job->status = 1;
        $job->order_by_date = $job->calculateOrderByDate();
        $job->save();

        $jobImport->status = 0;
        $jobImport->save();

        return redirect()->route('admin.job-import.index')->with('flash.success', 'Job Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobImport  $jobImport
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobImport $jobImport, Request $request)
    {
        $jobImport->status = 0;
        $jobImport->save();

        return $request->wantsJson()
            ? new JsonResponse('Import Deleted', 200)
            : redirect()->route('admin.job-import.index');
    }
}
