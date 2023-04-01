<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class JobImport extends Model
{
    use HasFactory;

    protected function salaryMin(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                $value = Str::remove('$', $value);
                $value = Str::remove(',', $value);
                return $value;
            },
        );
    }

    protected function jobType(): Attribute
    {
        $types =[
          'full-time' => "FULL_TIME"
        ];
        return Attribute::make(
            get: function (string $value) use ($types) {
                return $types[$value] ?? $value;
            },

            set: function (string $value) use ($types) {
                return $types[$value] ?? $value;
            },
        );
    }

    public function scopeFilter($query)
    {
//        request()->validate([
//            'status' => 'nullable|numeric',
//            'search' => 'nullable|string|min:2|max:100',
//        ]);

        $search = request()->search;
        if ($search) {
            collect(explode(' ', $search))->each(function ($term, $key) use ($query) {
                $term = "%$term%";
                $query->where(function ($query) use ($term){
                    $query->where('title', 'LIKE', $term)
                        ->orWhere('company_name', 'LIKE', $term);
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

    protected function salaryMax(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                $value = Str::remove('$', $value);
                $value = Str::remove(',', $value);
                return $value;
            },
        );
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function companySlug(): Attribute
    {
        return Attribute::get(fn($value, $attributes) => Str::lower($attributes['company_slug']));
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_slug', 'slug');
    }
}
