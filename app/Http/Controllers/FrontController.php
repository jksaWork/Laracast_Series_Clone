<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        $series = Series::get();
        return view('front.index', compact('series'));
    }

    public function show(Series $series){
        return view('front.show_series', compact('series'));
    }
}
