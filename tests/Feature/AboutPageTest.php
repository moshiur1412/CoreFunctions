<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AboutPageTest extends TestCase
{

    public function testCanViewAboutPage(){
        
        $res = $this->get('/about');

        $res->assertStatus(200);

        $res->assertSee("About me");
    }

}
