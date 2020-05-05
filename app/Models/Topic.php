<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Post;
use App\Models\Like;

use App\Models\Traits\Orderable;

class Topic extends Model
{
    use Orderable;

    protected $guarded = [];

    public function user(){
        // topic->user
        return $this->belongsTo(User::class);
    }

    public function posts(){
        // topic->posts
        return $this->hasMany(Post::class);
    }

    public function like(){
        // topic->like
        return $this->morphMany(Like::class);
    }
}
