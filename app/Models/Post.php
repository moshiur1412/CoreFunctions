<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Traits\OrderableTrait;

class Post extends Model
{
    use OrderableTrait;

    protected $guarded = [];

    public function user(){
        // post->user
        return $this->belongsTo(User::class);
    }

    public function topic(){
        // post->topic
        return $this->belongsTo(Topic::class);
    }

    public function likes(){
        // post->like
        return $this->morphMany(Like::class, 'likeable');
    }
}
