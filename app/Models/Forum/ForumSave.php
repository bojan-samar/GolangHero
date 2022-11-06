<?php

namespace App\Models\Forum;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumSave extends Model
{
    use HasFactory;
    protected $fillable = ['forum_uuid','user_uuid'];
}
