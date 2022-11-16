<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class JobAlert extends Model
{
    use HasFactory;

    public $frequency = [
        'daily' => [
            'name' => 'Daily',
            'days' => 1
        ],
        'weekly' => [
            'name' => 'Weekly',
            'days' => 7
        ],
        'monthly' => [
            'name' => 'Monthly',
            'days' => 30
        ],
    ];


    public static function boot()
    {
        parent::boot();
        static::creating(function($model){
            $model->uuid = Str::uuid();
        });
    }
}
