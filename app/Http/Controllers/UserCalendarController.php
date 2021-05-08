<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use App\Models\UserCalendar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserCalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    function validataData(Request $request){
        $messages = [
            'required'=>'Nie podano kodu',
        ];
        $rules = [
            'code' => 'required',
        ];

        $validator = Validator::make($request->all(),$rules, $messages);

        return $validator;
    }

    public function create(Request $request)
    {
        $validator = $this->validataData($request);

        if($validator->fails()){
            return response()->json([
                'message' => $validator->errors()->get('code')[0],
                'status_code' => 422
            ]);
        }

        $calendar = Calendar::findCalendar($request->code);
        if(!$calendar)
        {
            return response()->json([
                'message'=>"Niepoprawny kod",
            ]);
        }

        $result = UserCalendar::findUserCalendar($request->user()->id,$calendar->id);
        if($result)
        {
            return response()->json([
                'message'=>"Nalezysz juz do tego kalendarza",
            ]);
        }

        $userCalendar = new UserCalendar();
        $userCalendar->create([
            "user_id" => $request->user()->id,
            "calendar_id"=>$calendar->id
        ]);

        return response()->json([
            'message'=>"Dodano do kalendarza",
            'cal'=>$calendar,
            'status_code' => 200
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
     * @param  \App\Models\UserCalendar  $userCalendar
     * @return \Illuminate\Http\Response
     */
    public function show(UserCalendar $userCalendar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserCalendar  $userCalendar
     * @return \Illuminate\Http\Response
     */
    public function edit(UserCalendar $userCalendar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserCalendar  $userCalendar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserCalendar $userCalendar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserCalendar  $userCalendar
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserCalendar $userCalendar)
    {
        //
    }
}
