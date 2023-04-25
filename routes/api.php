<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => 'auth:sanctum'], function(){

    // Admin section
    Route::prefix('admin')->group(function()
    {
        // Users manager
        Route::prefix('users')->group(function()
        {
            Route::get('/', [UserController::class, 'index']);
            Route::post('store', [UserController::class, 'store']);
            Route::get('show/{id}', [UserController::class, 'show']);
            Route::put('update/{id}', [UserController::class, 'adminUpdate']);
        });
    });
});

