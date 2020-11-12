<?php

use App\Http\Controllers\AdminController;
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
Route::get('/home', [AdminController::class,'index']);
Route::get('/index/{locale}', function ($locale) {
    App::setLocale($locale);
    return view('index');
});
Route::get('/privacy', function () {
    return view('privacy');
});
Route::get('/law', function () {
    return view('laws');
});
Route::get('/editor', function () {
    return view('editor');
});
Route::get('/call', function () {
    return view('call');
});
Route::get('/who', function () {
    return view('who');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
