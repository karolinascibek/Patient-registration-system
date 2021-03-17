<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class UserController extends Controller
{
    public function userData(Request $request){
        return $request->user();
    }


}
