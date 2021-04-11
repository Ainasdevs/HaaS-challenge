<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Carbon\Exceptions\OutOfRangeException;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
    * Display the main menu
    *
    * @param Request $request
    * 
    * @return view
    */ 
    public function show(Request $request) {
        $date = Carbon::now();
        if(is_numeric($request->query('year'))) {
            try {
                $date = Carbon::create($request->query('year'), 1, 1, 0, 0, 0);
            } catch (OutOfRangeException $e) { } // Fail silently if out of range and use today
        }

        $prevYear = new Carbon($date);
        $prevYear->subYear();
        $nextYear = new Carbon($date);
        $nextYear->addYear();

        

        $zodiacs = \App\Models\Zodiac::all();
        $this->markBestMonth($zodiacs, $date->year);
        $this->markBestZodiac($zodiacs, $date->year);

        return view('menu', [
            'date' => $date,
            'prevYear' => $prevYear,
            'nextYear' => $nextYear,
            'zodiacs' => $zodiacs
        ]);
    }

    /**
    * Pick the best month for each zodiac sign and append it to each zodiac object
    *
    * @param $zodiacs Collection of Zodiac objects
    * @param $year Relevant year
    * 
    */ 
    private function markBestMonth($zodiacs, $year) {
        foreach($zodiacs as $zodiac) {

            $months = [];
            for($i = 1; $i <= 12; $i++) {
                $horoscopes = \App\Models\Horoscope::where('zodiac_id', $zodiac->id)->where('date', 'like', sprintf("%d-%02d%%", $year, $i))->get();
                if($horoscopes->isEmpty()) { return; }

                $months[$i - 1] = $horoscopes->sum('score') / $horoscopes->count();
            }

            $bestMonth = array_keys($months, max($months))[0] + 1;
            $zodiac->bestMonth = Carbon::create($year, $bestMonth, 1, 0, 0, 0);

        }
    }

    /**
    * Find the best overall zodiac for a given year
    *
    * @param $zodiacs Collection of Zodiac objects
    * @param $year Relevant year
    * 
    */ 
    private function markBestZodiac($zodiacs, $year) {
        foreach($zodiacs as $zodiac) {
            $horoscopes = \App\Models\Horoscope::where('zodiac_id', $zodiac->id)->where('date', 'like', sprintf("%d%%", $year))->get();
            if($horoscopes->isEmpty()) { return; }
            
            $zodiac->yearAvg = $horoscopes->sum('score') / $horoscopes->count();
            $zodiac->isBest = false;
        }
        $bestZodiac = $zodiacs->firstWhere('yearAvg', $zodiacs->max('yearAvg'));
        $bestZodiac->isBest = true;
    }
}
