<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Vehicle extends Model
{

    use HasFactory;

    protected $hidden = ['id'];
    protected $primaryKey = 'uuid';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $casts = [
        'images' => 'array',
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function($model){
            $model->uuid = Str::uuid();
        });
    }

    public function scopeFilter($query)
    {
        if (request()->search) {
            $query = $query->where('name', "LIKE", '%'. request()->search .'%');
        }

        if (request()->capacity) {
            $query = $query->where('capacity', ">=", request()->capacity)->orderBy('capacity','asc');
        }

        if (request()->get('type')){
            $query = $query->where('type', request()->get('type'));
        }

        return $query;
    }

    public function fullImageUrls(): Attribute
    {
        return Attribute::get(function ($value, $attributes) {
            $urls = [];
            foreach (json_decode($attributes['images']) as $image){
                $urls[] = Storage::url('images/vehicles/' . $attributes['uuid'] . '/' . $image);
            }
            return $urls;
        });
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

}
