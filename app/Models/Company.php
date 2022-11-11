<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        'description' => 'json',
        'meta' => 'array',
    ];

    protected $appends = ['photo_url'];

    public static function boot()
    {
        parent::boot();
        static::creating(function($model){
            $slug = Str::slug($model->name);
            $model->slug = $slug;
        });
    }

    public function jobs(){
        return $this->HasMany(Job::class)->latest();
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeFilter($query)
    {
        request()->validate([
            'status' => 'nullable|numeric',
            'search' => 'nullable|string|min:2|max:100',
        ]);

        $search = request()->search;
        if ($search) {
            collect(explode(' ', $search))->each(function ($term, $key) use ($query) {
                $term = "%$term%";
                $query->where(function ($query) use ($term){
                    $query->where('name', 'LIKE', $term);
                });
            });
        }

        $status = request()->status;
        if (! is_null($status)) {
            $query = $query->where('status', $status);
        }

        if ($sort = request()->get('sort')){
            $direction = request()->get('direction') ?? 'asc';
            $query = $query->orderBy($sort,$direction);
        }

        return $query;
    }


    public function photoUrl(): Attribute
    {
        return Attribute::get(function ($value, $attributes) {
            return isset($attributes['photo']) ? Storage::url( $attributes['photo']) : null;
        });
    }

    public function createdAtDateString(): Attribute
    {
        return Attribute::get(function ($value, $attributes) {
            return $attributes['created_at'] ? Carbon::parse($attributes['created_at'])->format('M d, Y') : null;
        });
    }

    protected function photo(): Attribute
    {
        return Attribute::make(
            set: function ($value){
                if ($value){
                    $version = Str::random(10);
                    $photoPath = explode('?', $value)[0];
                    return "{$photoPath}?=v{$version}";
                }

                return $value;
            },
        );
    }
}
