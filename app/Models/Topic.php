<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Post;

class Topic extends Model
{
    
    protected $guarded = [];
    
    public function user(){
        // topic->user
        return $this->belongsTo(User::class);
    }

    public function posts(){
        // topic->posts
        return $this->hasMany(Post::class);
    }
}
