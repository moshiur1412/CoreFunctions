<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\StoreUser;
use Illuminate\Http\Request;
use App\Http\Resources\User as UserResource;

class UserController extends Controller 
{
    public function register(StoreUser $request){
        
        \Log::info('Req=API\UserController@register Called');
      
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        

        if(!$token = auth()->attempt($request->only(['email', 'password']))){
            return abort(401);
        }

      
        return (new UserResource($request->user()))->additional([
            'meta' => [
                'token' => $token

            ]
        ]);
        // return response()->json(User::all());
    }

   

}

