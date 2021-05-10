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
}
