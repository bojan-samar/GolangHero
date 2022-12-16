<?php

namespace App\Models;

use App\Models\Account\Worker;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'id',
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    protected $roles = [
        'superadmin',
        'admin',
        'editor',
        'subscriber'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function($model){
            $model->username = Str::uuid();
        });

        static::created(function($model){
            Tracking::storeTracking($model);
        });
    }


    public function scopeFilter($query)
    {
        request()->validate([
            'search' => 'nullable|string|min:2|max:100',
        ]);

        if ($search = request()->search) {
            collect(explode(' ', $search))->each(function ($term, $key) use ($query) {
                $term = "%$term%";
                $query->where('username', 'LIKE', $term)
                    ->orWhere('name', 'LIKE', $term)
                    ->orWhere('email', 'LIKE', $term);
            });
        }

        //If sort else latest.
        if ($sort = request()->get('sort')) {
            $direction = request()->get('direction') ?? 'asc';
            $query = $query->orderBy($sort, $direction);
        } else {
            $query->latest();
        }

        return $query;
    }



    public function hasRole($role){
        //CHECK IF ROLE REQUESTED EXISTS
        if (! in_array($role, $this->roles)){
            return false;
        }

        //CHECK IF USER ROLE EXISTS
        $userRoleExists = array_search($this->role, $this->roles);


        if ($userRoleExists === false){
            return false;
        }

        $userAvailableRoles = array_slice($this->roles, $userRoleExists);
        return in_array($role, $userAvailableRoles);
    }

    public function getProfilePhotoUrlAttribute()
    {
        return $this->profile_photo_path
            ? Storage::disk($this->profilePhotoDisk())->url($this->profile_photo_path)
            : asset('files/icons/avatar.svg');
    }

    public function createdAtDateString(): Attribute
    {
        return Attribute::get(function ($value, $attributes) {
            return $attributes['created_at'] ? Carbon::parse($attributes['created_at'])->format('M d, Y') : null;
        });
    }

    public function tracking()
    {
        return $this->morphOne(Tracking::class, 'trackable');
    }

    public function worker()
    {
        return $this->hasOne(Worker::class);
    }
}
