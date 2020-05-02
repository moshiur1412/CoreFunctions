<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    
    public function register(){
        
        // return 'it worked';
        return response()->json(User::all());
    }

}

