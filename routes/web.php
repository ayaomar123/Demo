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
Route::get('/index/{locale}', function ($locale) {
    App::setLocale($locale);
    return view('index');
});
*/
Route::get('/home', [AdminController::class,'index']);
Route::get('/admin/{locale}', function ($locale) {
    App::setLocale($locale);
    return view('layouts.admin');
});
Route::get('/index', function () {
    return view('pages.index');
});
Route::get('/privacy', function () {
    return view('pages.privacy');
});
Route::get('/law', function () {
    return view('pages.laws');
});
Route::get('/editor', function () {
    return view('pages.editor');
});
Route::get('/call', function () {
    return view('pages.call');
});
Route::get('/who', function () {
    return view('pages.who');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', function () {
    return view('profile');
});
