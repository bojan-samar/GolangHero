<?php

namespace App\Http\Traits;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait CompanyTrait
{
    public function handlePhotoUpload($request)
    {
        $photo = null;
        $startOfDayStamp = Carbon::now()->startOfDay()->timestamp;

        //Check if photo uploaded and check if photo url imported
        if ($request->has('photo')){
            $photo = $request->file('photo')->storePublicly('company/' . $startOfDayStamp);
        }elseif ( $importPhotoUrl = $request->get('importPhotoUrl') ){
            $response = Http::get($importPhotoUrl);
            $photo = 'company/' . $startOfDayStamp . '/' . Str::random(20) . '.jpg';
            Storage::put($photo, $response->body(),'public');
        }

        return $photo;
    }
}
