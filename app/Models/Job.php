<?php

namespace App\Models;

use App\Helpers\Helpers;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Traits\JobTrait;


class Job extends Model
{
    use HasFactory;
    use SoftDeletes;
    use JobTrait;

    public $statuses = [
        '-1' =>['text' => 'Declined', 'css' => 'bg-red-200'],
        '0' =>['text' => 'Draft', 'css' => 'bg-red-200'],
        '1' =>['text' => 'Active', 'css' => 'bg-green-200'],
        '2' =>['text' => 'Pending Approval', 'css' => 'bg-green-200'],
    ];

    public $jobTypes = [
        'FULL_TIME' => 'Full Time',
        'PART_TIME' => 'Part Time',
        'CONTRACTOR' => 'Contractor',
        'TEMPORARY' => 'Temporary',
        'INTERN' => 'Intern',
        'VOLUNTEER' => 'Volunteer',
        'PER_DIEM' => 'Per Diem',
    ];

    protected $casts = [
        'expired_at' => 'datetime',
        'meta' => 'json',
        'tags' => 'json',
    ];


    public static function boot()
    {
        parent::boot();
        static::creating(function($job){
            $titleLimited = Str::limit($job->title,180);
            $slug = Str::slug($titleLimited) . "-" . Str::random(6);
            $job->slug = $slug;
            $job->expired_at = now()->addDays(60);
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
                $query->where(function ($query) use ($term){
                    $query->where('title', 'LIKE', $term)
                        ->orWhereHas('company', function (Builder $query) use ($term) {
                            $query->where('name', 'like', $term);
                        });
                });
            });
        }

        if (\request()->get('admin')){
            $query = $query->whereRelation(
                'user', 'id', '!=', 1
            );
        }

        if (request()->get('draft')){
            $query = $query->where('status', 0);
        }

        $user_id = request()->get('user');
        if ($user_id){
            $query = $query->where('user_id', $user_id);
        }

        return $query;
    }

    public function scopeActive($query)
    {
        return $query->where([
            ['status',1],
            ['expired_at',">=", now()]
        ]);
    }

    public function scopeDraft($query)
    {
        return $query->where('status',0);
    }


    public function jobTypeDisplay()
    {
        $without_underscore = Str::replace('_',' ', $this->type);
        return Str::title($without_underscore);
    }


    public function is_active()
    {
        if ($this->status == 1 && now()->lessThan($this->expired_at)){
            return true;
        }
        return false;
    }


    public function payDisplay()
    {
        $pay_min = $this->pay_min;
        $pay_max = $this->pay_max;

        if (!$pay_min && !$pay_max) {
            return null;
        }

        if ($this->pay_type == 'hour') {
            $pay_min = "$" . number_format($pay_min,2);
            $pay_max = "$" . number_format($pay_max,2);
        }else{
            $pay_min = "$" . number_format($pay_min);
            $pay_max = "$" . number_format($pay_max);
        }

        if ($pay_min && $pay_max) {
            return $pay_min . " - " . $pay_max . " per " . $this->pay_type;
        }
    }


    public function date_display($value)
    {
        return $value->format('M d, Y');
    }

    public function status_string()
    {
        if ($this->status == 1 && $this->expired_at >= now()){
            return true;
        }

        return false;
    }

    public function status_display()
    {
        if ($this->is_active()){
            return ['text' => 'Active', 'css' => 'bg-green-400'];
        }

        if ($this->status == 0){
            return ['text' => 'Draft', 'css' => 'bg-yellow-400'];
        }

        if ($this->expired()){
            return ['text' => 'Expired', 'css' => 'bg-gray-300'];
        }

        return ['text' => 'Deleted', 'css' => 'bg-red-400 text-white'];
    }

    public function expired()
    {
        if (now()->greaterThan($this->expired_at)){
            return true;
        }
        return false;
    }

    public function calculateOrderByDate()
    {
        $randomNumber = rand(0,25);
        if ($randomNumber == 1){
            return now()->addDays(30);
        }

        return now();
    }

    public function styles()
    {
        if (!$this->meta){
            return null;
        }

        if (array_key_exists('styles', $this->meta)) {
            $string  = '';
            foreach($this->meta['styles']  as $key => $value){
                $string .= $key.':'.$value.';';
            }

            return $string;
        }

        return null;
    }

    public function jobSaved(){
        if (auth()->guest()){
            $userId = null;
        }else{
            $userId = auth()->user()->id;
        }

        return $this->hasOne(JobSave::class)->where('user_id', $userId);
    }

    public function tweeted(): Attribute
    {
        return Attribute::get(function ($value, $attributes) {
            $meta = $attributes['meta'] ? json_decode($attributes['meta'], true) : [];
            if (Arr::has($meta, 'tweeted')){
                return true;
            }

            return false;
        });
    }

    public function createdAtDateString(): Attribute
    {
        return Attribute::get(function ($value, $attributes) {
            $date = null;
            if ($attributes['created_at']){
                $dateString = Carbon::parse($attributes['created_at'])->format('M d, Y');
                $diffForHumans = Carbon::parse($attributes['created_at'])->diffForHumans();
                $date = "$dateString ($diffForHumans)";
            }

            return $date;
        });
    }

    function applications(){
        return $this->hasMany(Application::class);
    }

    function company(){
        return $this->belongsTo(Company::class,'company_id','id');
    }

    function order(){
        return $this->hasOne(Order::class);
    }


    function user(){
        return $this->belongsTo(User::class,'user_id', 'id');
    }
}
