<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobPost;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Inertia\Inertia;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = JobPost::query()->filter()->latest()->with('company')->paginate(50)->withQueryString();
        $jobs->append(['created_at_date_string', 'tweeted']);
        $jobs->links = $jobs->onEachSide(1)->links();

        return Inertia::render('Admin/Job/Index', compact('jobs'));
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
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        //
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
    public function destroy(JobPost $job)
    {
        $job->delete();
    }

    public function tweet($slug)
    {
        $job = JobPost::where('slug', $slug)->with('company')->firstOrFail();
        $job->meta = $job->meta ? array_merge($job->meta,['tweeted' => true]) : ['tweeted' => true];
        $job->save();

        $company = $job->company;
        $company_name = $company->twitter ? '@' . $company->twitter : $company->name;
        $hashtags = Arr::shuffle(["#golang", "#golangjobs", "#remotework", "#remotejobs", "#wfh", "#softwareengineer"]);
        $twitter_text = rawurlencode($company_name .' is looking for a ' . $job->title . ' - ' . implode(' ', $hashtags));
        $url = rawurlencode("https://golanghero.com/job/$job->slug?utm_source=twitter");
        $twitter_url = 'https://twitter.com/intent/tweet?text=' . $twitter_text .'&url='. $url;

        return redirect($twitter_url);
    }
}
