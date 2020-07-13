<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Post;

class ViewAblogPostTest extends TestCase
{
    
    public function testCanViewABlogPost(){

        // Arrangement
        // creating a blog post
        // Action 
        // visiting a route
        // Assert
        // assert status code 200
        // assert that we see post title
        // assert that we see post body
        // assert that we see published date



        // Arrangement
        // creating a blog post
        $post = Post::create([
            'title' => 'A simple title',
            'body' => 'A simply body', 
            'user_id' => 1,
            'topic_id' =>1 
        ]);
        // Action 
        // visiting a route
        $resp = $this->get("/post/{$post->id}");
        // Assert
        // assert status code 200
        $resp->assertStatus(200);
        // assert that we see post title
        $resp->assertSee($post->title);
        // assert that we see post body
        $resp->assertSee($post->body);
        // assert that we see published date
        $resp->assertSee($post->created_at->toFormattedDateString());

    }
}
