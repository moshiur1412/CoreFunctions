<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class VoteQuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Question $question )
    {

        \Log::info('Req=VoteQuestionController@invoke called');

        $vote = (int) request()->vote;
        auth()->user()->voteQuestion($question, $vote);

        if(request()->expectsJson()){      
            return response()->json([
                'message' => 'Thank you for your feedback'
            ]);

        }
        
        return back();
    }
}
