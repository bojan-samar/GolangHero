<?php

namespace App\Http\Controllers;

use App\Models\JobAlert;
use Illuminate\Http\Request;
use Inertia\Inertia;

class JobAlertController extends Controller
{
    public function index()
    {
        $jobAlertModel = new JobAlert;
        $frequency = $jobAlertModel->frequency;
        return Inertia::render('Alert', compact('frequency'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'frequency' => 'required|integer|min:2',
        ]);


        $frequency = $request->get('frequency');
        $alert = new JobAlert;
        $alert->email = $request->get('email');
        $alert->frequencyy = $frequency;
        $alert->last_email_date = now()->startOfDay();
        $alert->next_email_date = now()->addDays($frequency)->startOfDay();
        $alert->save();

        return back();
    }
}
