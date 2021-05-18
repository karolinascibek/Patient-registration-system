<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Calendar;
use App\Models\UserCalendar;

class UserController extends Controller
{
    public function getUsersList($calendar_id){

        $users = UserCalendar::where('calendar_id','=', $calendar_id)
                            ->join('users', 'users.id','=','user_id')
                            ->where('users.is_login','=', true)
                            ->select('users.name')
                            ->get();

        return response()->json([
            'users'=> $users
        ]);
    }


}
