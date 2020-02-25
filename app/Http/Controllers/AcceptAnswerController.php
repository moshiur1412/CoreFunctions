<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;

class AcceptAnswerController extends Controller
{
   public function __invoke(Answer $answer){

    \Log::info('Req=AcceptAnswerController@__invoke called');

    $answer->question->acceptBestAnswer($answer);

    return back();


   }
}
