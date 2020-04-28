<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;

class VoteAnswerController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function __invoke(Answer $answer){
        \Log::info('Req=VoteAnswerController@invoke called');

        $vote = (int) request()->vote;

        auth()->user()->voteAnswer($answer, $vote);

        if(request()->expectsJson()){      
            return response()->json([
                'message' => 'Thank you for your feedback'
            ]);

        }
        return back();

    }
}
