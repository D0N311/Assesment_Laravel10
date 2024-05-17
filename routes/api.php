<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\IpController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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



Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);


Route::get('/ip', [IpController::class, 'showIP']);
Route::get('/location', [IpController::class, 'showLocation']);
Route::post('/delete', [IpController::class, 'deleteLogs']);
