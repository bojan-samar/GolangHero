<?php

namespace App\Http\Controllers;

use App\Jobs\SendRawEmailNotification;
use App\Models\Job;
use App\Models\JobPost;
use App\Models\Order;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CheckoutController extends Controller
{
    public function checkout($jobSlug)
    {
        //Check if job exists.
        $job = JobPost::query()->where('slug', $jobSlug)->with('order')->first();
        if (! $job){
            return redirect()->route('job-create')->with('flash.danger', 'This job does not exist. ');
        }

        //Check if job has an order
        if ($job->order){
            return redirect()->route('job-create')->with('flash.danger', 'This job was paid for already.');
        }

        $jobModel = new JobPost();
        $jobPrice = $jobModel->price;

        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $intent = $stripe->paymentIntents->create(
            [
                'amount' => $jobPrice,
                'currency' => 'usd',
                'automatic_payment_methods' => ['enabled' => true],
            ]
        );

        $clientSecret = $intent->client_secret;
        $stripeKey = env('STRIPE_KEY');
        $returnUrl = route('thank-you', $jobSlug);
        $job = $job->only(['title']);

        return Inertia::render('Checkout/Index', compact('clientSecret', 'stripeKey', 'returnUrl', 'job', 'jobPrice'));
    }

    public function thankYou(Request $request, $jobSlug)
    {
        $job = JobPost::query()->where('slug', $jobSlug)->with('order')->firstOrFail();
        //Check if order already in database for this job. Prevents duplicate orders if someone refreshes the page.
        if ($job->order){
            return Inertia::render('Checkout/ThankYou', [
                'slug' => $jobSlug
            ]);
        }

        $job->status = true;
        $job->order_by_date = now();
        $job->save();

        $jobModel = new JobPost();
        $jobPrice = $jobModel->price;

        $order = new Order;
        $order->user_id = auth()->user()->id;
        $order->job_id = $job->id;
        $order->processor = 'stripe';
        $order->processor_id = $request->get('payment_intent');
        $order->total = $jobPrice;
        $order->save();

        SendRawEmailNotification::dispatch('New Order Processed', "New Order");

        return Inertia::render('Checkout/ThankYou', [
            'slug' => $jobSlug,
            "queueWorkerStart" => true
        ]);
    }
}
