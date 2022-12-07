<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobPost;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {
        return response()->view('sitemap.index')
            ->header('Content-Type', 'text/xml');
    }

    public function main()
    {
        return response()->view('sitemap.main')
            ->header('Content-Type', 'text/xml');
    }

    public function jobs()
    {
        $jobs = JobPost::query()->latest()->get();

        return response()->view('sitemap.jobs', compact('jobs'))
            ->header('Content-Type', 'text/xml');
    }
}
