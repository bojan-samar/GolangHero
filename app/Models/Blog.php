<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Blog extends Model
{
    use HasFactory;
    protected $appends = ['photo_url'];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function getPhotoUrlAttribute()
    {
        return $this->photo ? Storage::url($this->photo) : null;
    }

    public function photoNameOnly()
    {
        $photoNameExploded = explode('/', $this->photo);
        return end($photoNameExploded);
    }

}
