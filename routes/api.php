<?php

use App\Http\Controllers\articelController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return date(2014);
});
//->middleware('auth:sanctum');

Route::post('/createUser', UserController::class . '@createUser');

Route::post('/createArtical', ArticelController::class . '@createArtical')->middleware('auth:sanctum');

Route::get('/getArticlas', ArticelController::class . '@getArticlas');

Route::get('/getArticlas/{id}', ArticelController::class . '@getArticle');

Route::delete('/deleteArticlas/{id}', ArticelController::class . '@deleteArticlas');

Route::put('/updateArticlas/{id}', ArticelController::class . '@updateArticlas');

Route::post('/register', UserController::class . '@register');

Route::post('/login', UserController::class . '@login');
