<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FoodController;
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

 Route::get('/',[HomeController::class, 'index'])->name('home')->middleware('auth');
 Route::controller(FoodController::class)->group(function () {
     Route::get('/food', 'index')->name('food');
     Route::get('/food/new', 'new')->name('food.new');
     Route::post('/food', 'create')->name('food.create');
     Route::delete('/food/{food}', 'destroy')->name('food.destroy');
 });


Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'show')->name('register.show');
    Route::post('/register', 'store')->name('register.store');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'show')->name('login.show');
    Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'destroy')->name('logout');
});

