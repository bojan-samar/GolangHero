<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class Application extends Model
{
    use HasFactory;
    protected $primaryKey = 'uuid';
    public $incrementing = false;
    protected $keyType = 'string';

    public static function boot()
    {
        parent::boot();

        static::creating(function($model){
            $model->uuid = Str::uuid();
        });

        static::created(function($model){
            Tracking::storeTracking($model);

            Mail::raw('New Application Submitted: ' . $model->name, function ($message) {
                $message->to( env('MAIL_TO_ADDRESS') )->subject('New Application Submitted');
            });
        });
    }

    public function createdAtDateString(): Attribute
    {
        return Attribute::get(function ($value, $attributes) {
            $date = null;
            if ($attributes['created_at']){
                $dateString = Carbon::parse($attributes['created_at'])->format('M d, Y');
                $diffForHumans = Carbon::parse($attributes['created_at'])->diffForHumans();
                $date = "$dateString ($diffForHumans)";
            }

            return $date;
        });
    }

    public function job()
    {
        return $this->belongsTo(JobPost::class);
    }

    public function tracking()
    {
        return $this->morphOne(Tracking::class, 'trackable');
    }
}
