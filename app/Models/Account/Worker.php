<?php

namespace App\Models\Account;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;
    protected $casts = [
        'skills' => 'array',
    ];

    protected $guarded = [];

    public function scopePublic($query)
    {
        return $query->where('status', true);
    }

    public function scopeFilter($query)
    {
        $skill = request()->get('skill');

        if (\request()->get('skill')){
            $query = $query->whereRelation(
                'skills', 'skill', $skill
            );
        }

        return $query;
    }


    public function employments()
    {
        return $this->hasMany(WorkerEmployment::class)->orderBy('from_year', 'desc');
    }

    public function skills()
    {
        return $this->hasMany(WorkerSkill::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
