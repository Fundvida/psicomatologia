<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionsController;


Route::get('/login', [SessionsController::class, 'create'])
    ->middleware('guest')
    ->name('login.index');

Route::post('/login', [SessionsController::class, 'store'])
    ->name('login.store');

Route::post('/loginCreate', [SessionsController::class, 'createUser'])
    ->name('login.create');

Route::get('/logout', [SessionsController::class, 'destroy'])
    ->middleware('auth')
    ->name('login.destroy');