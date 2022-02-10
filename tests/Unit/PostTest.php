<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Post;

class PostTest extends TestCase
{

   
    /**
     * @group formatted-date
     * @return type [description ]
    */
    public function testCanGetCreatedAtFormattedDate(){
    	// Arrange
    	// create a post
    	// Action
    	// get the value by calling the method
    	// Assert
    	// assert that returned value is as we expect

    	$post = Post::create([
            'title' => 'A simple title',
            'body' => 'A simply body', 
            'user_id' => 1,
            'topic_id' =>1 
        ]);

    	$formattedDate = $post->createdAt();

    	$this->assertEquals($post->created_at->toFormattedDateString(), $formattedDate);



    }
}
