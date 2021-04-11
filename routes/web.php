<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HoroscopeController;
use \App\Http\Controllers\CalendarController;
use \App\Http\Controllers\MenuController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [MenuController::class, 'show']);

Route::get('calendar', [CalendarController::class, 'show']);

Route::get('generate', function () {
    return view('generate');
});
Route::post('generate', [HoroscopeController::class, 'generate_horoscopes']);


