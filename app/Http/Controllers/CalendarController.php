<?php

namespace App\Http\Controllers;

use App\Models\Calendar;

use App\Models\User;
use App\Models\UserCalendar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CalendarController extends Controller
{

    public function index(Request $request)
    {
        $user = $request->user();
        $mycalendars =  $request->user()->myCalendars()->get();
        $calendars =  $request->user()->calendars()->get(['calendars.*']);
        return response()->json([
            "msg" => "kalendarze",
            "myCalendars" => $mycalendars,
            "calendars" => $calendars

        ]);
    }

    function validateData(Request $request){

        $rules =[
            'name'=>"required|max:255",
            'year'=>"required|numeric",
        ];
        $messages = [
            'required'=>"Pole jest wymagane",
            'numeric'=>'Podano niepoprawno wartosc',
        ];

        $validator= Validator::make($request->all(),$rules,$messages);

        return $validator;

    }
    public function create(Request $request)
    {

        $validator=$this->validateData($request);

        if($validator->fails()){
            return response()->json([
                "errors"=>$validator->errors(),
            ]);
        }

        $calendar = new Calendar();

        $code = substr(md5(time()), 0, 6);
        $calendar = $calendar->create([
            'name'=>$request->name,
            'year'=>$request->year,
            'code'=>$code,
            'user_id'=>$request->user()->id,
        ]);

        $usercalendar = new UserCalendar();
        $usercalendar->create([
            "user_id"=>$request->user()->id,
            "calendar_id"=>$calendar->id,
        ]);

        return response()->json([
            "message"=>"Kalendarz zostal utworzony."
        ]);
    }

    public function store(Request $request)
    {
        //
    }

    public function show( $id)
    {
        $calendar = Calendar::find($id);
        $user = User::find($calendar->user_id);
        return response()->json([
            'calendar'=>$calendar,
            'owner'=>$user
        ]);
    }

    public function edit(Calendar $calendar)
    {
        //
    }

    public function update(Request $request, Calendar $calendar)
    {
        //
    }

    public function destroy(Calendar $calendar)
    {
        //
    }
}
