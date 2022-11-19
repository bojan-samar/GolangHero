<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Account\Worker;
use App\Models\Account\WorkerEmployment;
use App\Models\Account\WorkerSkill;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class WorkerSkillController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'skill' => 'required|string|min:1|max:50',
            'experience' => 'required|numeric|min:1|max:50',
        ]);

        $skill = $request->get('skill');

        $worker = Worker::query()->where('user_id', auth()->user()->id)
            ->withCount(['skills' => function ($query) use($skill) {
                $query->where('name', $skill);
            }])->first();

        if ($worker->skills_count === 0){
            $workerSkill = new WorkerSkill;
            $workerSkill->worker_id = $worker->id;
            $workerSkill->name = $skill;
            $workerSkill->experience = $request->get('experience');
            $workerSkill->save();
        }


        return back();
    }

    public function destroy($uuid)
    {

    }
}
