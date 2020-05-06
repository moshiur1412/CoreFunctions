<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Traits\OrderableTrait;

class Topic extends Model
{
    use OrderableTrait;

    protected $guarded = [];

    public function user(){
        // topic->user
        return $this->belongsTo(User::class);
    }

    public function posts(){
        // topic->posts
        return $this->hasMany(Post::class);
    }

    public function likes(){
        // topic->likes
        return $this->morphMany(Like::class);
    }
}
