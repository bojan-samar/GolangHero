<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Http\Resources\WorkerResource;
use App\Models\Account\Worker;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WorkerController extends Controller
{
    public function index()
    {
        $workers = Worker::query()->latest()->with(['workerSkills', 'user'])->paginate(50);
        $workers = WorkerResource::collection($workers);

        return Inertia::render('Worker/Index', compact('workers'));
    }

    public function show($username)
    {
        $user = UserResource::make(
            User::query()->where('username', $username)->with(['worker.workerSkills'])->firstOrFail()
        );

        return Inertia::render('Worker/Show', compact('user'));
    }
}
