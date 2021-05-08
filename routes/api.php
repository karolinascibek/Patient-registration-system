<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\UserCalendarController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware("auth:sanctum");

Route::get('calendars', [CalendarController::class, 'index'])->middleware("auth:sanctum");
Route::post('calendar/create', [CalendarController::class, 'create'])->middleware("auth:sanctum");
Route::post('calendar/add', [UserCalendarController::class, 'create'])->middleware("auth:sanctum");
Route::get('calendar/{id}', [CalendarController::class, 'show'])->middleware("auth:sanctum");

