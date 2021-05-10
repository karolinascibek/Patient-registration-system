<?php

namespace App\Http\Controllers;

use App\Models\CalendarEvent;
use App\Models\Calendar;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class CalendarEventController extends Controller
{

    public function index()
    {

    }
    public function showEventsForWeek(Request $request, $id){
        $date_start = Carbon::createFromFormat("Y-m-d",$request->date_start)->format("Y-m-d");
        $date_end = Carbon::createFromFormat("Y-m-d",$request->date_end)->format("Y-m-d");
        $events = CalendarEvent::where('calendar_id','=',$id)
                                ->whereBetween('date',[$request->date_start, $request->date_end])
                                ->orderBy('date')
                                ->orderBy('time_start')
                                ->get();
        return response()->json([
            'msg'=>"Wydarzenia dla danego dnia pobrano",
            'events'=> $events
        ]);

    }
    public function showDayEvents(Request $request, $id){
        $date = Carbon::createFromFormat("Y-m-d",$request->date)->format("Y-m-d");
        $events = CalendarEvent::where('calendar_id','=',$id)->where('date','=',$date)->get();
        return response()->json([
            'msg'=>"Wydarzenia dla danego dnia pobrano",
            'events'=> $events
        ]);
    }

    public function create(Request $request, $id)
    {
        $rules =[
            'contents'=>"required|max:255",
            'day'=>"required|numeric",
            'month'=>"required|numeric",
            'year'=>"required|numeric",
            'hour_start'=>"required|numeric",
            'hour_end'=>"required|numeric",
            'minutes_start'=>"required|numeric",
            'minutes_end'=>"required|numeric",
        ];
        $messages = [
            'required'=>"Pole jest wymagane",
            'numeric'=>'Podano niepoprawno wartosc',
        ];

        $validator= Validator::make($request->all(),$rules, $messages);
        if($validator->fails()){
            return response()->json([
                "errors"=>$validator->errors(),
                "form"=>$request->all()
            ]);
        }

        $calendar = Calendar::find($id);
        $event = new CalendarEvent();
        $event->create([
            'contents'=>$request->contents,
            'user_id'=>$request->user()->id,
            'calendar_id'=>$calendar->id,
            'date'=>$request->year."-".$request->month."-".$request->day,
            'time_start'=>$request->hour_start.":".$request->minutes_start,
            'time_end'=>$request->hour_end.":".$request->minutes_end,
        ]);
        return response()->json([
            'msg'=>"Wydarzenie zostalo dodane"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CalendarEvent  $calendarEvent
     * @return \Illuminate\Http\Response
     */
    public function show(CalendarEvent $calendarEvent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CalendarEvent  $calendarEvent
     * @return \Illuminate\Http\Response
     */
    public function edit(CalendarEvent $calendarEvent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CalendarEvent  $calendarEvent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CalendarEvent $calendarEvent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CalendarEvent  $calendarEvent
     * @return \Illuminate\Http\Response
     */
    public function destroy(CalendarEvent $calendarEvent)
    {
        //
    }
}
