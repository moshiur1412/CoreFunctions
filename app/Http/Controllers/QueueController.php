<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendEmailJob;
use Carbon\Carbon;
class QueueController extends Controller
{
    public function index(){
        
        \Log::info("req=QueueController@index called");

        $details['email'] = 'mdbcorporationbd@gmail.com';
   
        $job = (new SendEmailJob($details))->delay(Carbon::now()->addSeconds(20));
        
        dispatch($job);
	
	    return 'Email Send... :) ';
    }
}
