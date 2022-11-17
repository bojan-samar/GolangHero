<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class TrackingMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $tracking = collect(
            json_decode(Cookie::get('tracking'), true)
        ) ?? collect();


        //UTM Params
        if($request->hasAny('utm_source','utm_medium', 'utm_campaign', 'utm_term', 'utm_content', 'gclid')){
            $utmParams = $request->only(['utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content', 'gclid']);
            $utm = [];
            if ($tracking->has('utm')){
                $utm = $tracking['utm'];
            }
            $utm[] = $utmParams;
            $tracking->put('utm', $utm );
        }


        if($referer = $request->header('referer') and ! Str::contains($referer, url('/')) ){
            $tracking->put('referer', $referer);
        }

        if($referral = $request->referral){
            if (! $tracking->has('utm')){
                $tracking->put('referral', $referral);
            }
        }

        if ($tracking->count()){
            cookie()->queue(
                cookie()->forever('tracking', $tracking->toJson(), '/', null, null, false)
            );
        }

        return $next($request);
    }
}
