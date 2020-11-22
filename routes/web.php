<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\SliderController;
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

Route::group(['prefix' => 'categories'], function(){
    Route::get('/',[CategoryController::class, 'index'])->name('categores.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('categores.create');
    Route::post('/',  [CategoryController::class, 'store'])->name('categores.store');
    Route::get('/{id}', [CategoryController::class, 'edit'])->name('categores.edit');
    Route::post('/{id}/update', [CategoryController::class, 'update'])->name('categores.update');
    Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('categores.delete');
  });

Route::group(['prefix' => 'articles'], function(){
    Route::get('/',[ArticlesController::class, 'index'])->name('articles.index');
    Route::get('/create', [ArticlesController::class, 'create'])->name('articles.create');
    Route::post('/',  [ArticlesController::class, 'store'])->name('articles.store');
    Route::post('/show',  [ArticlesController::class, 'show'])->name('articles.show');
    Route::get('/{id}', [ArticlesController::class, 'edit'])->name('articles.edit');
    Route::post('/{id}/update', [ArticlesController::class, 'update'])->name('articles.update');
    Route::delete('/{id}', [ArticlesController::class, 'destroy'])->name('articles.delete');
});

Route::group(['prefix' => 'slider'], function(){
    Route::get('/',[SliderController::class, 'index'])->name('slider.index');
    Route::get('/create', [SliderController::class, 'create'])->name('slider.create');
    Route::post('/',  [SliderController::class, 'store'])->name('slider.store');
    Route::get('/{id}', [SliderController::class, 'edit'])->name('articles.edit');
    Route::post('/{id}/update', [SliderController::class, 'update'])->name('slider.update');
    Route::delete('/{id}', [SliderController::class, 'destroy'])->name('slider.delete');
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

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', function () {
    return view('profile');
});
