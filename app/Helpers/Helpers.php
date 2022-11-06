<?php

namespace App\Helpers;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;

class Helpers
{
    public static function isAdmin(): bool
    {
        if (auth()->guest()){
            return false;
        }
        if (request()->user()->hasRole('admin')){
            return true;
        }
        return false;
    }


    public static function canShowTrackingScripts(): bool
    {
        if (! App::isProduction()) {
            return false;
        }
        if (self::isAdmin()) {
            return false;
        }
        return true;
    }

    public static function getTrackingId($platform)
    {
        if (!self::canShowTrackingScripts()){
            return null;
        }

        return env($platform);
    }


    public static function stringIsEmail($string): bool
    {
        $validator = Validator::make(['string' => $string], [
            'string' => 'email',
        ]);

        return !$validator->fails();
    }

    public static function isHoneyPot($honeyHiddenField = null, $searchTerm = null)
    {
        if ($honeyHiddenField){
            return true;
        }

        if ($searchTerm){
            $searchTerm = strtolower($searchTerm);
            $botWords = collect(['now()','-1 OR','(SELECT','waitfor delay','AND 2*3*8']);
            foreach ($botWords as $word){
                $word = strtolower($word);
                if (strpos($word, $searchTerm) !== false) {
                    return true;
                }
            }
        }

        return false;
    }
}
