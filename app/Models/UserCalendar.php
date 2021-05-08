<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCalendar extends Model
{
    use HasFactory;

    protected $table = "user_calendars";

    protected $fillable = [
        'user_id',
        'calendar_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function findUserCalendar($user_id, $calendar_id){
        return UserCalendar::where([
            ['user_id','=', $user_id],
            ['calendar_id', '=', $calendar_id]
            ]
        )->first();
    }
}
