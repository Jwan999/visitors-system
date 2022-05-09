<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', [ParticipantController::class, 'getForm']);
Route::post('/participants', [ParticipantController::class, 'match']);


Route::prefix('dashboard')->group(function () {
    Route::get('/sessions', [SessionController::class, 'index']);
    Route::get('/sessions/create', [SessionController::class, 'createForm']);
    Route::post('/sessions', [SessionController::class, 'store']);

    Route::get('/participants', [ParticipantController::class, 'index']);
//    Route::get('/participants', [ParticipantController::class, 'store']);

    Route::get('/', [DashboardController::class, 'index']);
});
