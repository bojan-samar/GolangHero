<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cookie;

class Tracking extends Model
{
    use HasFactory;

    protected $fillable = ['utm'];

    protected $casts = [
        'utm' => 'array'
    ];

    public function getTracking()
    {
        if ($tracking = Cookie::get('tracking')){
            return json_decode($tracking, true);
        }

        return null;
    }

    public function trackable()
    {
        return $this->morphTo();
    }
}
