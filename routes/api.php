<?

use app\Http\Controllers\Api\V1\StatusController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use app\Http\Controllers\Api\V1\TaskController;
use app\Http\Controllers\Api\V1\User_TasksController;
use app\Http\Controllers\Api\V1\UserController;

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
