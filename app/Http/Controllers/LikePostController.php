<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resource\LikeResource;
use App\Models\Like;

class LikePostController extends Controller
{
    public function index(Like $like){

        \Log::info("Req=Api/LikePostController@index called");

        return new LikeResource($like);
    }

    public function store(Like $like){

        \Log::info("Req=Api/LikePostController@store called");

        
    }
}
