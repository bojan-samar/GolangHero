<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {
        return response()->view('sitemap.index')
            ->header('Content-Type', 'text/xml');
    }

    public function jobs()
    {
        $jobs = Job::query()->latest()->get();

        return response()->view('sitemap.jobs', compact('jobs'))
            ->header('Content-Type', 'text/xml');
    }
}
