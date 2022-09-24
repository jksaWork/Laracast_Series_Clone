<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Series;
use Illuminate\Http\Request;

class WatchSeriesController extends Controller
{
    public function WatchSeries(Series $series){
        if(auth()->check()){
            // dd(auth()->user());
            if(auth()->user()->hasSatredSeries($series)){
                return redirect()->route('watch.series.lesson',
                [
                    'get_series' => $series->id,
                    'lesson' => auth()->user()->getNextLessonToWatch($series    ),
                ]);
            }
        }
        return redirect()->route('watch.series.lesson',
        [
            'get_series' => $series->id,
            'lesson' => $series->Lessons->first()->id,
        ]);
    }

    public function WatchSeriesLesson(Series $series , Lesson $lesson){
        // dd($lesson);
        return view('watch.lesson' , compact('series', 'lesson'));
    }

    public function completeLesson(Lesson $lesson){
        // dd($lesson);
        auth()->user()->completLesson($lesson);
        return \response()->json(['message' => 'ok']);
    }
}
