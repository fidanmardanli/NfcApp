<?php

use App\Http\Controllers\CardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//users start
Route::get('getAllUsers', [UserController::class, 'getAllUsers']);
Route::get('getUserById/{id}', [UserController::class, 'getUserDatasById']);
Route::get('getUserDatasByUid/{uid}', [UserController::class, 'getUserDatasByUid']);
Route::post('createUser', [UserController::class, 'store']);
Route::post('updateUserById/{id}', [UserController::class, 'updateById']);
Route::post('deleteById/{id}', [UserController::class, 'deleteById']);
//users end

//card start
Route::apiResource('cards', CardController::class);
Route::patch('cards/{id}/deactivate', [CardController::class, 'deactivate'])->name('cards.deactivate');
Route::get('cards/{id}/check-validity', [CardController::class, 'checkValidity'])->name('cards.checkValidity');
//card end
