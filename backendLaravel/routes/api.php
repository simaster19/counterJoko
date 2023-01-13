<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\AksesorisController;
use App\Http\Controllers\AuthenticationController;

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

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/logout', [AuthenticationController::class, 'logout']);

    Route::get('/user', [UserController::class, 'index']);
    Route::post('/user', [UserController::class, 'store']);
    Route::patch('/user/{id}', [UserController::class, 'update']);
    Route::delete('/user/{id}', [UserController::class, 'destroy']);

    Route::get('/voucher', [VoucherController::class, 'index']);
    Route::post('/voucher', [VoucherController::class, 'store']);
    Route::patch('/voucher/{id}', [VoucherController::class, 'update']);
    Route::delete('/voucher/{id}', [VoucherController::class, 'destroy']);

    Route::get('/aksesoris', [AksesorisController::class, 'index']);
    Route::post('/aksesoris', [AksesorisController::class, 'store']);
    Route::patch('/aksesoris/{id}', [AksesorisController::class, 'update']);
    Route::delete('/aksesoris/{id}', [AksesorisController::class, 'destroy']);

    Route::get('/pulsa', [PulsaController::class, 'index']);
    Route::post('/pulsa', [PulsaController::class, 'store']);
    Route::patch('/pulsa/{id}', [PulsaController::class, 'update']);
    Route::delete('/pulsa/{id}', [PulsaController::class, 'destroy']);
});


Route::post('/login', [AuthenticationController::class, 'login']);
