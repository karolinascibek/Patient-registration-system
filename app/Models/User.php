<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = "users";

    protected $fillable = [
        'id',
        'last_name',
        'name',
        'email',
        'password',
        'is_login',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function myCalendars()
    {
        return $this->hasMany(Calendar::class, "user_id", "id");
    }

    public function calendars(){
        return  $this->hasMany(UserCalendar::class, "user_id", "id")
                        ->join('calendars','calendars.id' ,'=', 'user_calendars.calendar_id')
                        ->where('calendars.user_id',"!=", $this->id);
    }

    public static function findActiveUsers(){
        return User::where('is_login',true)
                            ->get();
    }

}
