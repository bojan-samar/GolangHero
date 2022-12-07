<?php

namespace App\Http\Controllers;

use App\Http\Resources\JobResource;
use App\Models\Company;
use App\Models\JobPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Inertia\Inertia;

class MiscController extends Controller
{
    public function welcome(Request $request)
    {
        $jobs = JobPost::query()
            ->active()
            ->orderBy('order_by_date', 'desc')
            ->with(['company'])
            ->paginate(80)
            ->withQueryString();

        $jobs->links = $jobs->onEachSide(1)->links();
        $jobs = JobResource::collection($jobs);
        $jobsTotalCount = $jobs->total();

        $companyCount = Company::query()->selectRaw("count(id) as companyCount")->active()->first();
        $companyCount = $companyCount->companyCount;

        return Inertia::render('Welcome', compact('jobs', 'jobsTotalCount', 'companyCount'));
    }

    public function queueWorkerStart()
    {
        //        $schedule->command('queue:work --stop-when-empty')->everyFiveMinutes();
        Artisan::call('queue:work --stop-when-empty', []);
    }
}
