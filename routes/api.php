<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AccountController;
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

Route::get('/accounts',[AccountController::class,'index']);

Route::get('/accounts/{id}',[AccountController::class,'show']);

Route::get('/user/accounts/{user_id}',[AccountController::class,'showUserAccount']);

Route::post('/accounts',[AccountController::class,'store']);

Route::post('/accounts/{id}',[AccountController::class,'update']);

Route::delete('/accounts/{id}',[AccountController::class,'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
