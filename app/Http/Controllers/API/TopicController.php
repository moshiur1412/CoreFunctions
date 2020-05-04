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

        \Log::info("Req=API/TopicController@index called");
        
        $topics = Topic::latestFirst()->simplePaginate(3);

        return TopicResource::collection($topics);
    }

    public function store(StorePost $storePost, Topic $topic, Post $post){

        \Log::info("Req=API/TopicController@store called");

        $topic->title = $storePost->title;
        $topic->user()->associate($storePost->user());

        $post->body = $storePost->body;
        $post->user()->associate($storePost->user());

        $topic->save();
        $topic->posts()->save($post);

        return new TopicResource($topic);

    }

    public function show(Topic $topic){
        
        \Log::info("Req=API/TopicController@show called");

        return new TopicResource($topic);
    }

    public function update(StorePost $storePost, Topic $topic){
        
        \Log::info("Req=API/TopicController@update called");

        $topic->title = $storePost->get('title', $topic->title);
        // $topic->body = $storePost->get('body', $topic->body);

        $topic->save();

        return new TopicResource($topic);
    }
}
