<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        if ($validator->fails()) {
            return self::failure($validator->errors()->first());
        }
        if (Auth::attempt(['email' =>  $request->email, 'password' => $request->password])) {

            $user = Auth::user();
            $token = $user->createToken('credo')->accessToken;
            $role = Role::where('id', $user->role_id)->first();
            $user['role_name'] = $role ? $role->name : null;

            if(!$role){
                return self::failure("User must have a management role to login");
            }

            if($role->name != "management"){
                return self::failure("User must have a management role to login");
            }


            return self::success("Login successful", ['data' => [ 'user' => $user, 'role' => $role, 'token' => $token ]  ]);
        }
        return self::failure('Incorrect email or password');
    }

    public function getUser(Request $request){

        $user = auth()->user();
        $role = Role::where('id', $user->role_id)->first();
        $user['role_name'] = $role ? $role->name : null;


        return self::success("User successful", ['data' => ['user' => $user, 'role' => $role ] ]);

    }

}
