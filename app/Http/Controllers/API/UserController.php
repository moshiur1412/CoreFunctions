<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\StoreUser;
use Illuminate\Http\Request;

class UserController extends Controller 
{
    public function register(Request $request){
        
        \Log::info('Req=API\UserController@register Called');
        
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);


        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        
        // return 'it worked';
        return response()->json(User::all());
    }

   

}

