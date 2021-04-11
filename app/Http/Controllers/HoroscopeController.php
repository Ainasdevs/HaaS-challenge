<?php

namespace App\Http\Controllers;

use App\Models\Zodiac;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class HoroscopeController extends Controller
{
    public function generate_horoscopes(Request $request){
        $request->validate([
            'year' => 'required|digits:4',
        ]);

        $date = Carbon::create($request->input('year'), 1, 1, 0, 0, 0);
        $days = $date->isLeapYear() ? 366 : 365;

        $zodiac_signs = Zodiac::all();

        \App\Models\Horoscope::where('date', 'like', $date->year . '%')->delete();

        for($i = 0; $i < $days; $i++) {
            foreach($zodiac_signs as $sign) {
                \App\Models\Horoscope::factory()->dated($date)->for($sign)->create();
            }
            $date->addDay();
        }

        return view('generate', ['success' => new MessageBag(['Horoscopes generated'])]);
    }
}
