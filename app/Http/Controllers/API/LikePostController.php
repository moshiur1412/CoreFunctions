<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Resource\likeable;
use App\Models\Like;

class LikePostController extends Controller
{
    public function index(Like $like){

        \Log::info("Req=Api/LikePostController@index called");

        return likeable::collection($like);
    }

    public function store(Like $like){

        \Log::info("Req=Api/LikePostController@store called");

        
    }
}
