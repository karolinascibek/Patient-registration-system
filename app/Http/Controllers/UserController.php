<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;
use App\Models\User;
use App\Models\UserCalendar;
use App\Events\ActiveUsers;

class UserController extends Controller
{
    public function getUsersList(Request $request, $calendar_id){


        $users = UserCalendar::where('calendar_id','=', $calendar_id)
                            ->join('users', 'users.id','=','user_id')
                            ->where('users.is_login','=', true)
                            ->select('users.name')
                            ->get();

        $users = User::findActiveUsers();
        event(new ActiveUsers($users));
        return response()->json([
            'users'=> $users
        ]);
    }


}
