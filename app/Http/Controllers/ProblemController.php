<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProblemController extends Controller
{
    public function problem(){
        
        \Log::info("Req=ProblemController@problem Called");

        $people = [
            ['name' => 'John Doe', 'email' => 'j@gmail.com', 'age' => 42],
            ['name' => 'Mohn Doe', 'email' => 'm@gmail.com', 'age' => 50]
        ];

        $full_array= [];
        $email = [];
       
        foreach($people as $key => $p){
            $full_array[] = $p;
        }
        
        
        foreach($full_array as $k => $v){
            $email[] = $v['email'];
        }
        
        $array_map = array_map('self::solution', $people, $email);
    
        dd($array_map);

    }

    function solution($people, $email){

        return [$email => $people];
    }
}
