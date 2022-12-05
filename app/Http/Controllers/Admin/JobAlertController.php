<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobAlert;
use Illuminate\Http\Request;
use Inertia\Inertia;

class JobAlertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alerts = JobAlert::query()->latest()->paginate(50)->withQueryString();
        $alerts->append('created_at_date_string');
        $alerts->links = $alerts->onEachSide(0)->links();

        return Inertia::render('Admin/JobAlert/Index', compact('alerts'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        $alert = JobAlert::query()->where('uuid', $uuid)->firstOrFail();
        $alert->append('created_at_date_string');

        return Inertia::render('Admin/JobAlert/Show', compact('alert'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        JobAlert::query()->where('uuid', $uuid)->delete();

        return redirect()->route('admin.job-alert.index')->with('flash.success', 'Alert Deleted');
    }
}
