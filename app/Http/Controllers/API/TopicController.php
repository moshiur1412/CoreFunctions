<?php

namespace App\Http\Controllers\API;
use App\Http\Resources\Topic as TopicResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePost;
use App\Models\Topic;
use App\Models\Post;

class TopicController extends Controller
{    
    public function index(){

        \Log::info("Req=API\TopicController@index called");
        
        $topics = Topic::latestFirst()->get();

        return TopicResource::collection($topics);
    }

    public function store(StorePost $storePost, Topic $topic, Post $post){

        \Log::info("Req=API\TopicController@store called");

        $topic->title = $storePost->title;
        $topic->user()->associate($storePost->user());

        $post->body = $storePost->body;
        $post->user()->associate($storePost->user());

        $topic->save();
        $topic->posts()->save($post);

        return new TopicResource($topic);

    }
}
