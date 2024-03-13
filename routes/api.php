<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\http\Controllers\API\RegisterController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:passport')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register',[RegisterController::class,'register'])->name('apiRegister');
Route::post('login',[RegisterController::class,'login'])->name('apiLogin');
