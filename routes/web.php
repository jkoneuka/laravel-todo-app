<?php

use App\Http\Controllers\TodolistController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [TodolistController::class, 'index']);
Route::post('/', [TodolistController::class, 'store']);
Route::patch('/{todoid}', [TodolistController::class, 'update']);
Route::delete('/{todoid}', [TodolistController::class, 'destroy']);
Route::post('/{todoid}', [TodolistController::class, 'edit']);
