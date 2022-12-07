<?php

namespace App\Http\Controllers;

use App\Jobs\SendRawEmailNotification;
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
            'frequency' => 'required|integer|min:1|max:30',
        ]);

        $email = $request->get('email');
        $frequency = $request->get('frequency');

        $alert = JobAlert::where('email', $email)->first();
        if (!$alert){
            $alert = new JobAlert;
        }
        $alert->email = $email;
        $alert['frequency'] = $frequency;
        $alert->last_email_date = now()->startOfDay();
        $alert->next_email_date = now()->addDays($frequency)->startOfDay();
        $alert->save();

        return back();
    }
}
