<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\RevenueController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

Route::get('expenses', [ExpenseController::class, 'index']);
Route::post('expenses', [ExpenseController::class, 'store']);
Route::get('expenses/{id}', [ExpenseController::class, 'show']);
Route::put('expenses/{id}', [ExpenseController::class, 'update']);
Route::delete('expenses/{id}', [ExpenseController::class, 'destroy']);

Route::get('revenues', [RevenueController::class, 'index']);
Route::post('revenues', [RevenueController::class, 'store']);
Route::get('revenues/{id}', [RevenueController::class, 'show']);
Route::put('revenues/{id}', [RevenueController::class, 'update']);
Route::delete('revenues/{id}', [RevenueController::class, 'destroy']);

Route::get('/accounts', [AccountController::class, 'index']);
Route::post('/accounts', [AccountController::class, 'store']);
Route::put('/accounts/{id}', [AccountController::class, 'update']);
Route::delete('/accounts/{id}', [AccountController::class, 'destroy']);

Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout']);
Route::get('me', [AuthController::class, 'me'])->middleware('auth:api');
