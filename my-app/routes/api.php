<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AuthUserController;


Route::prefix('user')->group(function(){
    Route::post('/register', [AuthUserController::class,'store']);
    Route::post('/login', [AuthUserController::class,'login']);
    Route::post('/logout', [AuthUserController::class,'logout'])->middleware(['auth:sanctum']);    
});


Route::resource('/tasks', TaskController::class)->middleware(['auth:sanctum']);

