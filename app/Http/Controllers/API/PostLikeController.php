<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Post;

class PostLikeController extends Controller
{
    public function index(Like $like){

        \Log::info("Req=Api/PostLikeController@index called");

        return $like;
    }

    public function store(Like $like, Post $post){

        \Log::info("Req=Api/PostLikeController@store called");

        $this->authorize('like', $post);

        $like->user()->associate(request()->user());
        
        $post->likes()->save($like);

        return response(null, 204);
        
    }
}
