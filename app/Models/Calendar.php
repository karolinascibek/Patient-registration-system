<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    use HasFactory;

    protected $table = "calendars";

    protected $fillable = [
        'id',
        'name',
        'code',
        'year',
        'user_id',
        'created_at',
        'updated_at'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function  findCalendar($code){
        return Calendar::where('code','=',$code)->first();
    }
    public static function findCalendarAndUser($id){
        $calendar = Calendar::where('id','=',$id)->first();
        $user_id = $calendar->user_id;
        return  $calendar->join('users','calendars.user_id', '=',  'users.id')
                         ->where('users.id',"=", $user_id)->select('calendars.*','users.name as owner','users.last_name')->get();
    }
}
