<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Topic;
use App\Models\Post;

class TopicController extends Controller
{
    public function store(Topic $topic, Post $post){

        \Log::info("Req=API\TopicController@store called");

        $topic->title = request()->title;
        $topic->user()->associate(request()->user());

        $post->body = request()->body;
        $post->user()->associate(request()->user());

        $topic->save();
        $topic->posts()->save($post);

        // return back();

    }
}
