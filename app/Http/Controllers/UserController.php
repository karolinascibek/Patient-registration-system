<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Calendar;

class UserController extends Controller
{
    public function userData(Request $request){
        return $request->user();
    }

    public function calendars(){
        // return $this->hasMany(Calendar::class);
    }


}
