<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\StatusController;
use App\Http\Controllers\Api\V1\TaskController;
use App\Http\Controllers\Api\V1\User_TasksController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\AuthController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix'=>'v1'],function(){
    Route::apiResource('tasks',TaskController::class);
});
Route::group(['prefix'=>'v1'],function(){
    Route::apiResource('status',StatusController::class);
});

Route::group(['prefix'=>'v1'],function(){
    Route::apiResource('users',UserController::class);
});
Route::group(['prefix'=>'v1'],function(){
    Route::apiResource('user_tasks',User_TasksController::class);
});

Route::controller(AuthController::class)->group(function(){
    Route::post('login','login');
    Route::post('register','register');
});


