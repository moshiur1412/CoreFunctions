<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;

class AcceptAnswerController extends Controller
{
   public function __invoke(Answer $answer){

    \Log::info('Req=AcceptAnswerController@__invoke called');

    $this->authorize('accept', $answer);
    
    $answer->question->acceptBestAnswer($answer);
    
    if(request()->expectsJson()){
       return response()->json(null, 204);
    }

    return back();


   }
}
