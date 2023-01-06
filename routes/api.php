<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Basiir
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BlogController;
use App\Http\Controllers\API\AchievementController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
//Route::middleware('auth:sanctum')->group( function () {
//    Route::resource('blogs', BlogController::class);
//
//});

*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::post('register', [AuthController::class, 'signup']);
Route::post('login', [AuthController::class, 'signin']);
Route::get('getachievement', [\App\Http\Controllers\API\GetAchievementController::class, 'index']);
Route::get('getachievement/{user_id}', [\App\Http\Controllers\API\GetAchievementController::class, 'show']);
Route::get('getleaderboard', [\App\Http\Controllers\API\BestScoreController::class, 'index']);
Route::middleware('auth:sanctum')->group(function () {
    //    Route::resource('blogs', BlogController::class);
    Route::resource('propobject', \App\Http\Controllers\API\PropObjectController::class);
    Route::resource('achievements', AchievementController::class);
});
