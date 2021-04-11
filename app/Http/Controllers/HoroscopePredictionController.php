<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HoroscopePredictionController extends Controller
{
    /**
    * API method to deterministically pick a random prediction
    *
    * @param Request $request
    * 
    * @return json
    */ 
    public function predict(Request $request) {
        if(!is_numeric($request->query('year')) || !is_numeric($request->query('month')) ||
            !is_numeric($request->query('day')) || !is_numeric($request->query('score')) ||
            !is_numeric($request->query('zodiac'))) {

                return response('Invalid parameter', 400);
        }

        $validPredictions = \App\Models\HoroscopePrediction::whereBetween('score', [$request->query('score') - 2, $request->query('score') + 1])->get();

        $hash = sha1(sprintf('%d%02d%d%02d%d', $request->query('year'), $request->query('month'),
                                                $request->query('day'), $request->query('score'), $request->query('zodiac')));
        
        $hash = substr($hash, 0, 7);
        mt_srand(hexdec($hash));
        $pick = mt_rand(0, $validPredictions->count() - 1);

        return response()->json([
            'prediction' => $validPredictions[$pick]->prediction,
            'state' => 'success',
            'code' => 200
        ]);;
    }
}
