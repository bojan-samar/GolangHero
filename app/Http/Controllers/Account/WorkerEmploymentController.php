<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Account\Worker;
use App\Models\Account\WorkerEmployment;
use App\Models\Account\WorkerSkill;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Inertia\Inertia;

class WorkerEmploymentController extends Controller
{
    public function create()
    {
        $months = [];
        $years = [];

        for($m=1; $m<=12; $m++){
            $months[] = [
                'month' => $m,
                'name' => date('F', mktime(0,0,0,$m, 1, date('Y')))
            ];
        }

        for($year = date('Y') ; $year > 1900 ; $year--){
            $years[] = $year;
        }

        return Inertia::render('Account/Worker/CreateEmployment', compact('years', 'months'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'fromMonth' => 'required|numeric',
            'fromYear' => 'required|numeric',
            'toMonth' => 'required|numeric',
            'toYear' => 'required|numeric',
            'title' => 'required|string|min:1|max:191',
            'company' => 'required|string|min:1|max:191',
            'url' => 'required|url|min:1|max:191',
        ]);


        $worker = Worker::query()->where('user_id', auth()->user()->id)->firstOrFail();
        $employment = new WorkerEmployment;
        $employment->worker_id = $worker->id;
        $employment->from_month = $request->get('fromMonth');
        $employment->from_year = $request->get('fromYear');
        $employment->to_month = $request->get('toMonth');
        $employment->to_year = $request->get('toYear');
        $employment->title = $request->get('title');
        $employment->company = $request->get('company');
        $employment->url = $request->get('url');
        $employment->save();

        return redirect()->route('account.worker.index')->with('flash.success', 'Employment Created');
    }

    public function updateSocials(Request $request)
    {
        $request->validate([
            'github' => 'required|string|min:1|max:255',
            'website' => 'required|string|min:1|max:255',
            'twitter' => 'required|string|min:1|max:255',
            'linkedin' => 'required|string|min:1|max:255',
        ]);

        $worker = Worker::where('user_id', auth()->user()->id)->first();
        $worker->github = $request->get('github');
        $worker->website = $request->get('website');
        $worker->twitter = $request->get('twitter');
        $worker->linkedin = $request->get('linkedin');
        $worker->save();

        return back();
    }

    public function destroy($uuid)
    {
        WorkerSkill::where('uuid', $uuid)->delete();

        return back();
    }
}
