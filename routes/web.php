<?php

use App\Http\Controllers\ConfigrationControler;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\WatchSeriesController;
use App\Mail\RegisterMail;
use Illuminate\Support\Facades\Route;

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
use App\Models\User;
use Illuminate\Support\Facades\Redis;

Route::get('redis', function(){
    // Redis::set('jksa.1' , 'jksa', "EX" , 1);
    Redis::set('jksa.2.jksa' , 'jksa');
    Redis::set('jksa.2' , 'jksa_altigani');
    dd(Redis::keys('jksa.*.jksa'));
});

Route::get('/', function () {
    return view('test');
});

Route::get('confirm/user', [ConfigrationControler::class , 'confirm'])->name('confirm');
Route::get('logout' , function() {
    auth()->logout();
    redirect()->back();
})->name('get.logout');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('series' , [FrontController::class , 'index'])->name('series.front');
Route::get('series/{get_series}' , [FrontController::class, 'show'])->name('front.series.show');
Route::get('watch-series/{get_series}' , [WatchSeriesController::class, 'WatchSeries'])->name('watch.series');
Route::get('watch-series/{get_series}/lesson/{lesson}' , [WatchSeriesController::class, 'WatchSeriesLesson'])->name('watch.series.lesson');
Route::get('complete-lesson/{lesson}' , [WatchSeriesController::class, 'completeLesson'])->name('compleate_lesson')->middleware('auth');

Route::get('mail', fn() => new RegisterMail(User::find(1)));
Route::prefix('admin')->group(function(){
    Route::resource('series' , SeriesController::class);
    Route::resource('{get_series}/lessons' , App\Http\Controllers\LessonController::class);
});


Route::get('profile/{user}' , [profileController::class , 'index'])->name('profile');
