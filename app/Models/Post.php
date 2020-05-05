<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Topic;
use APp\Models\Like;

use App\Models\Traits\Orderable;

class Post extends Model
{
    use Orderable;

    protected $guarded = [];

    public function user(){
        // post->user
        return $this->belongsTo(User::class);
    }

    public function topic(){
        // post->topic
        return $this->belongsTo(Topic::class);
    }

    public function like(){
        // post->like
        return $this->morphMany(Like::class, 'likeable');
    }
}
