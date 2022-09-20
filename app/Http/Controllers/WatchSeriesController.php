<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;

class WatchSeriesController extends Controller
{
    public function WatchSeries(Series $series){
        return redirect()->route('watch.series.lesson',
        [
            'get_series' => $series->id,
            'lesson' => $series->Lessons->first()->id,
        ]);
    }

    public function WatchSeriesLesson(Series $series){

    }
}