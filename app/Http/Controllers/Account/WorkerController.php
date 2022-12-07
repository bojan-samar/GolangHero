<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Jobs\SendRawEmailNotification;
use App\Models\Account\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user()->load([ 'worker.employments', 'worker.workerSkills']);

        if (! $user->worker){
            return Inertia::render('Account/Worker/Create');
        }

        return Inertia::render('Account/Worker/Index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('account.worker.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Worker::query()->create([
           'user_id' => auth()->user()->id
        ]);

        SendRawEmailNotification::dispatch('New Worker Created', 'Name:'. auth()->user()->name);

        return redirect()->route('account.worker.index')->with('queueWorkerStart', true);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }

    public function updateResume(Request $request)
    {
        $request->validate([
            'resume' => 'array',
        ]);

        $worker = Worker::where('user_id', auth()->user()->id)->first();
        $worker->resume = $request->get('resume');
        $worker->save();

        return back();
    }
}
