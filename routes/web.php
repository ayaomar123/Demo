<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AdsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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
Auth::routes();
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
Route::get('/', function () {
    $categories = \App\Models\Category::first();
    $articles = \App\Models\Article::all();
    $categories->articles()->attach($articles);
    dd($articles);
});

Route::middleware(['auth'])->prefix('/home')->group(function () {
    Route::get('/', [AdminController::class,'index']);
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});
//Route::get('/home', [AdminController::class,'index'])->name('home');
Route::get('/home/{locale}', function ($locale) {
    App::setLocale($locale);
    return view('layouts.myAdmin');
});

Route::group(['prefix' => 'categories'], function(){
    Route::get('/',[CategoryController::class, 'index'])->name('categories.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/',  [CategoryController::class, 'store'])->name('categories.store');
    Route::post('/show',  [CategoryController::class, 'show'])->name('categories.show');
    Route::get('/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('/{id}/update', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});

Route::group(['prefix' => 'articles'], function(){
    Route::get('/',[ArticleController::class, 'index'])->name('articles.index');
    Route::get('/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/',  [ArticleController::class, 'store'])->name('articles.store');
    Route::post('/show',  [ArticleController::class, 'show'])->name('articles.show');
    Route::get('/{id}', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::post('/{id}/update', [ArticleController::class, 'update'])->name('articles.update');
    Route::delete('/{id}', [ArticleController::class, 'destroy'])->name('articles.delete');
});

Route::group(['prefix' => 'slider'], function(){
    Route::get('/',[SliderController::class, 'index'])->name('slider.index');
    Route::get('/create', [SliderController::class, 'create'])->name('slider.create');
    Route::post('/',  [SliderController::class, 'store'])->name('slider.store');
    Route::get('/{id}', [SliderController::class, 'edit'])->name('slider.edit');
    Route::post('/{id}/update', [SliderController::class, 'update'])->name('slider.update');
    Route::delete('/{id}', [SliderController::class, 'destroy'])->name('slider.delete');
});
Route::group(['prefix' => 'ads'], function(){
    Route::get('/',[AdsController::class, 'index'])->name('ads.index');
    Route::get('/create', [AdsController::class, 'create'])->name('ads.create');
    Route::post('/',  [AdsController::class, 'store'])->name('ads.store');
    Route::get('/{id}', [AdsController::class, 'edit'])->name('ads.edit');
    Route::post('/{id}/update', [AdsController::class, 'update'])->name('ads.update');
    Route::delete('/{id}', [AdsController::class, 'destroy'])->name('ads.delete');
});
Route::group(['prefix' => 'Endpage'], function(){
    Route::get('/',[pagesController::class, 'index'])->name('page.index');
    Route::get('/create', [pagesController::class, 'create'])->name('page.create');
    Route::post('/',  [pagesController::class, 'store'])->name('page.store');
    Route::get('/{id}', [pagesController::class, 'edit'])->name('page.edit');
    Route::post('/{id}/update', [pagesController::class, 'update'])->name('page.update');
    Route::delete('/{id}', [pagesController::class, 'destroy'])->name('page.delete');
});

Route::group(['prefix' => 'contact'], function(){
    Route::get('/',[ContactController::class, 'index'])->name('contact.index');
    Route::get('/create', [ContactController::class, 'create'])->name('contact.create');
    Route::post('/',  [ContactController::class, 'store'])->name('contact.store');
    Route::get('/{id}', [ContactController::class, 'edit'])->name('contact.edit');
    Route::post('/{id}/update', [ContactController::class, 'update'])->name('contact.update');
    Route::delete('/{id}', [ContactController::class, 'destroy'])->name('contact.delete');
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
Route::get('/profile', function () {
    return view('profile');
});



