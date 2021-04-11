<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Carbon\Exceptions\OutOfRangeException;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function show(Request $request) {
        if(!is_numeric($request->query('zodiac'))) {
            return redirect('/');
        }

        $date = Carbon::now();
        if(is_numeric($request->query('year')) && is_numeric($request->query('month'))) {
            try {
                $date = Carbon::create($request->query('year'), $request->query('month'), 1, 0, 0, 0);
            } catch (OutOfRangeException $e) { } // Fail silently if out of range and use today
        }

        $zodiac = \App\Models\Zodiac::with(['horoscopes'])->find($request->query('zodiac'));
        if(is_null($zodiac)) { return redirect('/'); }

        $horoscopes = $zodiac->horoscopes->filter(function($value, $key) use ($date) {
            return $value->date->year === $date->year && $value->date->month === $date->month;
        })->map(function($item, $key) {

            if($item->score === 1) { $item->color = '#ff0000'; }
            else if($item->score === 10) { $item->color = '#00ff00'; }
            else if($item->score <= 5) {
                $r = 190;
                $g = $this->lerp(130, 200, ($item->score - 2) / 3);
                $item->color = sprintf("#%02x%02x%02x", $r, $g, 0);
            } else if ($item->score > 5){
                $r = $this->lerp(200, 130, ($item->score - 6) / 3);
                $g = 190;
                $item->color = sprintf("#%02x%02x%02x", $r, $g, 0);
            } else {
                $item->color = '#ffffff';
            }

            return $item;
        })->values();

        //dd($horoscopes);
        $prevMonth = new Carbon($date);
        $prevMonth->subMonth();
        $nextMonth = new Carbon($date);
        $nextMonth->addMonth();

        return view('calendar', [
            'date' => $date,
            'prevMonth' => $prevMonth,
            'nextMonth' => $nextMonth,
            'zodiac' => $zodiac,
            'horoscopes' => $horoscopes
        ]);
    }

    private function lerp($min, $max, $t) {
        return (1 - $t) * $min + $t * $max;
    }
}
