<?php

namespace App\Http\Controllers\API;
use App\Http\Resources\Topic as TopicResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTopicRequest;
use App\Models\Topic;
use App\Models\Post;

class TopicController extends Controller
{    
    public function index(){

        \Log::info("Req=API/TopicController@index called");
        
        $topics = Topic::latestFirst()->simplePaginate(3);

        return TopicResource::collection($topics);
    }

    public function store(StoreTopicRequest $request, Topic $topic, Post $post){

        \Log::info("Req=API/TopicController@store called");

        $topic->title = $request->title;
        $topic->user()->associate($request->user());

        $post->body = $request->body;
        $post->user()->associate($request->user());

        $topic->save();
        $topic->posts()->save($post);

        return new TopicResource($topic);

    }

    public function show(Topic $topic){
        
        \Log::info("Req=API/TopicController@show called");

        return new TopicResource($topic);
    }

    public function update(StoreTopicRequest $request, Topic $topic){
        
        \Log::info("Req=API/TopicController@update called");

        $this->authorize('update', $topic);

        // $topic->title = $request->get('title', $topic->title);
        $topic->title = $request->title;

        $topic->save();

        return new TopicResource($topic);
    }

    public function destroy(Topic $topic){

        \Log::info("Req=API/TopicController@destroy called");

        $this->authorize('destroy', $topic);
        
        $topic->delete();

        return  response(null, 204);
    }
}
