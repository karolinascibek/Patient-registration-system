<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\User;
use Exception;

class RegisterController extends Controller
{
    public function register(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6|confirmed',
                'password_confirmation' => 'required',
            ]);

            if($validator->fails()){
                return response()->json([
                    'errors' => $validator->errors(),
                    'status_code' => 422
                ]);
            }


            $request['remember_token'] = Str::random(10);
            $newUser = new User;
            $newUser->create([
                'name' => $request->name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            return response()->json([
                'msg'=>"Account created successfully",
                'status_code'=>200
                ]);
        }
        catch(Exception $error){
            return response()->json([
                'msg' => "Error in Registration",
                'error' => $error,
                'status_code' => 500,
                'last_name' => $request->last_name,
            ]);
        }
    }


}
