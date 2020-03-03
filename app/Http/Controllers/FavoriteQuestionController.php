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

        return back();
    }

    public function distroy(Question $question){
        $question->favorites()->detach(\Auth()->user()->id);
        return back();
    }
}
