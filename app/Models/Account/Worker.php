<?php

namespace App\Models\Account;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Worker extends Model
{
    use HasFactory;
    protected $casts = [
        'skills' => 'array',
    ];

    protected $hidden = ['id', 'user_id'];

    protected $guarded = [];

    public function scopePublic($query)
    {
        return $query->where('status', true);
    }

    public function scopeFilter($query)
    {
        request()->validate([
            'status' => 'nullable|numeric',
            'search' => 'nullable|string|min:2|max:100',
        ]);

        if ($search = request()->search) {
            collect(explode(' ', $search))->each(function ($term, $key) use ($query) {
                $term = "%$term%";
                $query->where(function ($query) use ($term){
                    $query->where('twitter', 'LIKE', $term)
                        ->orWhereHas('user', function (Builder $query) use ($term) {
                            $query->where('name', 'like', $term);
                        });
                });
            });
        }

        return $query;
    }

    public function createdAtDateString(): Attribute
    {
        return Attribute::get(function ($value, $attributes) {
            return $attributes['created_at'] ? Carbon::parse($attributes['created_at'])->format('M d, Y') : null;
        });
    }


    public function employments()
    {
        return $this->hasMany(WorkerEmployment::class)->orderBy('from_year', 'desc');
    }

    public function workerSkills()
    {
        return $this->hasMany(WorkerSkill::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
