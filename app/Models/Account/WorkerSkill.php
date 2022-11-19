<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WorkerSkill extends Model
{
    use HasFactory;

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }

    protected function name(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => Str::title($value),
        );
    }
}
