<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::group(['prefix'=>'admin', 'namespace'=>'admin', 'middleware'=>'auth.admin'], function(){
    Route::get('/HomeAdmin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/registrarPsicologo', [AdminController::class, 'registrarPsicologo'])->name('registrarpsicologo.index');
});

Route::get( '/', function () {return view('admin/index');} );

// Route::get('/admin', [AdminController::class, 'index'])
//     ->middleware('auth.admin')
//     ->name('admin.index');

// Route::get('/registrarpsicologo', [AdminController::class, 'registrarPsicologo'])
//     ->middleware('auth.admin')
//     ->name('registrarpsicologo.index');