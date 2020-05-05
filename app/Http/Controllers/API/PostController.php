<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Http\Resources\Post as PostResource;
use App\Models\Topic;

class PostController extends Controller
{
    
    
    public function index(Request $request, Post $post){
        
        \Log::info("Req=API/PostController@index Called");
       
        $posts = $post::where('topic_id', $request->topic)->get();

        return PostResource::collection($posts);
    }

    public function store(StorePostRequest $request, Post $post, Topic $topic){

        \Log::info("Req=API/PostController@store called");

        $post->body = $request->body;

        $post->user()->associate($request->user());
        
        $topic->posts()->save($post);

        return new PostResource($post);

    }

    public function update(StorePostRequest $request, Topic $topic, Post $post){
        
        \Log::info("Req=API/PostController@update called");

        $this->authorize('update', $post);

        $post->body = $request->get('body', $post->body);
        
        // $post->user()->associate($request->user());
        
        // $topic->posts()->save($post);

        $post->save();

        return new PostResource($post);
        
    }

    public function show(Topic $topic, Post $post){
        
        \Log::info("Req=API/PostController@show Called");

        // $post = $post->where('id', $request->post);

        return new PostResource($post);
    }

    public function destroy(Topic $topic, Post $post){
       
        \Log::info("Req=API/PostController@destroy called");
      
        $this->authorize('delete', $post);

        $post->delete();

        return response('Done', 204);
    }
}
