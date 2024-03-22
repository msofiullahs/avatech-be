<?php

use App\Http\Controllers\PriorityController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])
->group(function() {
    Route::get('/user', [UserController::class, 'info']);
    Route::get('/token', [UserController::class, 'token'])->name('token');

    Route::resource('/task', TaskController::class)->except(['edit', 'create']);
    Route::resource('/priority', PriorityController::class)->only(['index']);
    Route::resource('/status', StatusController::class)->only(['index']);
});
