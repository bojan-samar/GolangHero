<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cookie;

class Tracking extends Model
{
    use HasFactory;

    protected $fillable = ['utm', 'referral', 'referer'];

    protected $casts = ['utm' => 'array'];

    public static function storeTracking($model)
    {
        if ($tracking = Cookie::get('tracking')){
            $tracking = json_decode($tracking, true);
            $model->tracking()->save(new Tracking($tracking));
        }
    }

    public function trackable()
    {
        return $this->morphTo();
    }
}
