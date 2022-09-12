<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        $series = Series::get();
        // dd($series);
        return view('front.index', compact('series'));
    }
}
