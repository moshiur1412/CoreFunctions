<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class FavoriteQuestionController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
    }

    public function store(Question $question){

        \Log::info('Req=FavoriteQuestionController@store called');

        $question->favorites()->attach(\Auth()->user()->id);

        if(request()->expectsJson()){
            return response()->json(null,204);
        }
        return back();
    }

    public function distroy(Question $question){
        
        \Log::info('Req=FavoriteQuestionController@distroy Called');
        
        $question->favorites()->detach(\Auth()->user()->id);

        if(request()->expectsJson()){
            return response()->json(null, 204);
        }
        return back();
    }
}
