<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalendarEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'contents',
        'date',
        'time_start',
        'time_end',
        'calendar_id',
        'user_id',
        'created_at',
        'updated_at'
    ];


    public  static function getEventsForDate($calendar_id, $date_start, $date_end){
        return CalendarEvent::where('calendar_id','=',$calendar_id)
                            ->whereBetween('date',[$date_start, $date_end])
                            ->orderBy('date')
                            ->orderBy('time_start')
                            ->join('calendars', 'calendars.id',"=","calendar_events.calendar_id")
                            ->where("calendars.id","=",$calendar_id)
                            ->select('calendar_events.*','calendars.user_id as owner')->get();
    }
}
