<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\HallController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TicketController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Hall;

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

Route::get('/halls', [HallController::class,'index']);
Route::post('/halls', [HallController::class,'store']);
Route::get('/halls/sessions', [HallController::class,'getWithSession']);
Route::get('/halls/{id}', [HallController::class,'getById']);
Route::put('/halls/{id}', [HallController::class,'update']);
Route::delete('/halls/{id}', [HallController::class,'destroy']);

Route::get('/seats', [SeatController::class,'index']);
Route::get('/seats/hall/{id}', [SeatController::class,'getByHallId']);
Route::put('/seats/hall/{id}', [SeatController::class,'changeByHallId']);
Route::get('/seats/ticket/{id}', [SeatController::class,'getByTicketId']);
Route::post('/seats', [SeatController::class,'store']);
Route::get('/seats/{id}', [SeatController::class,'getById']);
Route::put('/seats/{id}', [SeatController::class,'update']);
Route::delete('/seats/{id}', [SeatController::class,'destroy']);

Route::get('/movies', [MovieController::class,'index']);
Route::get('/movies/halls', [MovieController::class,'getWithHalls']);
Route::post('/movies', [MovieController::class,'store']);
Route::get('/movies/{id}', [MovieController::class,'getById']);
Route::put('/movies/{id}', [MovieController::class,'update']);
Route::delete('/movies/{id}', [MovieController::class,'destroy']);

Route::get('/ticket', [TicketController::class,'index']);
Route::post('/ticket', [TicketController::class,'store']);
Route::get('/ticket/qr', [TicketController::class,'qrGenerate']);
Route::get('/ticket/{id}', [TicketController::class,'getById']);
Route::put('/ticket/{id}', [TicketController::class,'update']);
Route::delete('/ticket/{id}', [TicketController::class,'destroy']);

Route::get('/sessions', [SessionController::class,'index']);
Route::get('/sessions/movie/{id}', [SessionController::class,'getByMovieId']);
Route::post('/sessions', [SessionController::class,'store']);
Route::get('/sessions/{id}', [SessionController::class,'getById']);
Route::put('/sessions/{id}', [SessionController::class,'update']);
Route::delete('/sessions/{id}', [SessionController::class,'destroy']);

Route::post('/login', [AccountController::class,'checkUser']);
