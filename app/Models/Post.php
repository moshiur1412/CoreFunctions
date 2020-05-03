<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Topic;

class Post extends Model
{
    protected $guarded = [];
    
    public function user(){
        // post->user
        return $this->belongsTo(User::class);
    }

    public function topic(){
        // post->topic
        return $this->belongsTo(Topic::class);
    }
}
