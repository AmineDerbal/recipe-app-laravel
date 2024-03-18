<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\RecipeFoodController;
use App\Http\Controllers\PublicRecipesController;
use App\Http\Controllers\GenrealShoppingListController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'verify_email'], function () {
    Route::controller(FoodController::class)->group(function () {
        Route::get('/food', 'index')->name('food');
        Route::get('/food/new', 'new')->name('food.new');
        Route::post('/food', 'create')->name('food.create');
        Route::get('/food/{food}', 'show')->name('food.show');
        Route::get('/food/{food}/edit', 'edit')->name('food.edit');
        Route::put('/food/{food}', 'update')->name('food.update');
        Route::delete('/food/{food}', 'destroy')->name('food.destroy');
    });

    Route::controller(RecipeController::class)->group(function () {
        Route::get('/recipe', 'index')->name('recipe.index');
        Route::get('/recipe/new', 'new')->name('recipe.new');
        Route::post('/recipe', 'create')->name('recipe.create');
        Route::get('/recipe/{recipe}', 'show')->name('recipe.show');
        Route::put('/recipe/{recipe}', 'toggle_public')->name('recipe.toggle_public');
        Route::delete('/recipe/{recipe}', 'destroy')->name('recipe.destroy');
    });

    Route::controller(RecipeFoodController::class)->group(function () {
        Route::get('/recipe/{recipe}/ingredient/new', 'new')->name('recipe_food.new');
        Route::post('/recipe/{recipe}/ingredient', 'create')->name('recipe_food.create');
        Route::delete('/recipe/ingredient/{recipeFood}', 'destroy')->name('recipe_food.destroy');
    });

    Route::get('/public_recipes', [PublicRecipesController::class, 'index'])->name('public_recipes');
    Route::get('general_shopping_list', [GenrealShoppingListController::class, 'index'])->name('general_shopping_list');
});

Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'show')->name('register.show');
    Route::post('/register', 'store')->name('register.store');
    Route::get('account/verify/{token}', 'verifyAccount')->name('user.verify');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'show')->name('login.show');
    Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'destroy')->name('logout');
    Route::get('/resend-verification-email', 'resendVerificationEmail')->name('resend.verification.email');
});
