<?php

namespace App\Http\Controllers;

use App\Http\Resources\JobResource;
use App\Models\Company;
use App\Models\Job;
use App\Models\JobAlert;
use App\Models\Vehicle;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class MiscController extends Controller
{
    public function welcome(Request $request)
    {
        $jobs = Job::query()
            ->active()
            ->orderBy('order_by_date','desc')
            ->with(['company'])
            ->paginate(60)
            ->withQueryString();

        $jobs->links = $jobs->onEachSide(1)->links();
        $jobs = JobResource::collection($jobs);
        $jobsTotalCount = $jobs->total();

        $companyCount = Company::query()->selectRaw("count(id) as companyCount")->active()->first();
        $companyCount = $companyCount->companyCount;

        return Inertia::render('Welcome', compact('jobs','jobsTotalCount','companyCount'));
    }

}
