<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Validation\ValidationException;
use App\Events\ActiveUsers;

class AuthController extends Controller
{

    public function login(Request $request){

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
           return response([
                'email' => ['The provided credentials are incorrect.'],
           ],404);
        }

        $user->is_login = true;
        $user->save();

        // $users = User::findActiveUsers();
        // event(new ActiveUsers($users));

        return response()->json([
            'token'=>$user->createToken($request->device_name)->plainTextToken,
            'user' =>$user,
        ]);

    }

    public function logout(Request $request){
        $user = $request->user();
        $user->is_login = false;
        $user->save();

        $request->user()->currentAccessToken()->delete();

        // $users = User::findActiveUsers();
        // event(new ActiveUsers($users));

        return response()->json([
            'msg' => "Log out",
        ]);
    }
}
