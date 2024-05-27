<?php

use App\Http\Controllers\AppAuthController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// login
Route::post('login', [AppAuthController::class, 'login']);

// Register
Route::post('register', [AppAuthController::class, 'register']);

// Forget Password
Route::post('forget-password', [AppAuthController::class, 'forgetPassword']);

// Logout
Route::post('logout', [AppAuthController::class, 'logout']);

Route::group(['middleware' => 'AppData'], function () {
    Route::get('welcome', [AppController::class, 'welcome']);

    Route::get('search', [AppController::class, 'search']);
    Route::post('search', [AppController::class, 'searchQuery']);

    Route::group(['prefix' => 'cart'], function () {
        Route::get('', [AppController::class, 'cart']);
        Route::post('add', [AppController::class, 'cartAdd']);
        Route::post('delete', [AppController::class, 'cartDelete']);
    });


    Route::get('order', [AppController::class, 'order']);
    Route::get('wishlist', [AppController::class, 'wishlist']);

    Route::get('profile', [AppController::class, 'profile']);
    Route::post('profile/update', [AppController::class, 'updateProfile']);
    Route::post('reset-password', [AppAuthController::class, 'resetPassword']);

    Route::get('notification', [AppController::class, 'notification']);
    Route::post('notification/clear', [AppController::class, 'clearNotification']);
});
