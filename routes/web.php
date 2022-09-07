<?php

use App\Http\Controllers\ConfigrationControler;
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

Route::get('mail', fn() => new RegisterMail(User::find(1)));

