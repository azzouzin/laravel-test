<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingsController;
use App\Http\Middleware\IsADHUser;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/myBookings', BookingsController::class . '@myBookings');
Route::get('/sayHello/{name}', BookingsController::class . '@sayHello')->middleware(IsADHUser::class);
