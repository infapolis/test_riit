<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\RefController;

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

Route::get('/get/', [UserController::class, 'getAll']);
Route::get('/get-edu/', [RefController::class, 'getEdu']);
Route::get('/get-cities/', [RefController::class, 'getCities']);
Route::get('/update-edu/', [RefController::class, 'updateUserEdu']);
