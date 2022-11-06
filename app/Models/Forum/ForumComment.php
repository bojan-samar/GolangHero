<?php

namespace App\Models\Forum;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ForumComment extends Model
{
    use HasFactory;
    protected $hidden = ['id'];
    protected $appends = ['created_at_human','is_owner'];
    protected $fillable = ['user_uuid','forum_uuid','parent_uuid','description'];

    public static function boot()
    {
        parent::boot();
        static::creating(function($model){
            $model->uuid = Str::uuid();
        });
    }

    public function scopeParent($query)
    {
        return $query->whereNull('parent_id');
    }

    public function createdAtHuman(): Attribute
    {
        return Attribute::get(fn ($value, $attributes) => Carbon::parse($attributes['created_at'])->diffForHumans());
    }

    public function getIsOwnerAttribute()
    {
        if (auth()->guest()){
            return false;
        }
        return $this->attributes['user_uuid'] == auth()->user()->uuid;
    }


    public function children(){
        return $this->hasMany(ForumComment::class, 'parent_uuid','uuid')->oldest();
    }

    public function forum(){
        return $this->belongsTo(Forum::class,'forum_uuid','uuid');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_uuid','uuid');
    }
}
