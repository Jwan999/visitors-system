<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\DashboardController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login']);


Route::post('/participants/match', [ParticipantController::class, 'match']); //record attendance
Route::prefix('dashboard')->group(function () {
    Route::get('/sessions', [SessionController::class, 'index']);
    Route::post('/sessions', [SessionController::class, 'store']);
    Route::delete('/sessions/{id}', [SessionController::class, 'destroy']);
    Route::post('/sessions/import', [SessionController::class, 'import']);

    Route::get('/participants', [ParticipantController::class, 'index']);
    Route::post('/participants/un_match', [ParticipantController::class, 'unMatch']); //remove attendance
    Route::post('/participants', [ParticipantController::class, 'store']);
    Route::delete('/participants/{id}', [ParticipantController::class, 'destroy']);
    Route::get('participants/export', [ParticipantController::class, 'export']);
});