<?php

namespace App\Models\Forum;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Forum extends Model
{
    use HasFactory;
    protected $appends = ['created_at_human','description_preview'];

    protected $hidden = ['id'];

    public static function boot()
    {
        parent::boot();
        static::creating(function($model){
            $model->uuid = Str::uuid();
        });
    }

    public function scopeFilter($query)
    {
        request()->validate([
            'search' => 'nullable|string|min:2|max:100'
        ]);

        $search = request()->search;
        if ($search) {
            $query = $query->where('title', "LIKE", '%'. $search .'%');
        }

        return $query;
    }

    public function createdAtHuman(): Attribute
    {
        return Attribute::get(fn ($value, $attributes) => Carbon::parse($attributes['created_at'])->diffForHumans());
    }

    public function descriptionPreview(): Attribute
    {
        return Attribute::get(fn ($value, $attributes) => Str::limit($attributes['description'],191));
    }

    public function comments(){
        return $this->hasMany(ForumComment::class,'forum_uuid','uuid')->whereNull('parent_uuid');
    }

    public function forumSaved(){
        return $this->hasOne(ForumSave::class,'forum_uuid','uuid');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_uuid','uuid');
    }
}
