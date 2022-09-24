<?php

namespace App\Http\Controllers;

use App\Models\Series;
use App\Models\User;
use Illuminate\Http\Request;

class profileController extends Controller
{
    public function index(User $user){
        // dd($user);
        $data['user'] = $user;
        $data['series'] = $user->getSeriesWasWatched();
        $data['completed_lesson'] = $user->getCountCompleteLesson();
        return view('front.profile', $data);
    }
}
