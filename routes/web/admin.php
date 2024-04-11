<?php

use App\Http\Controllers\Admin\PsicologoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::group(['prefix'=>'admin', 'namespace'=>'admin', 'middleware'=>'auth.admin'], function(){
    Route::get('/HomeAdmin', [AdminController::class, 'index'])->name('admin.index');

    Route::get('/registrarPsicologo', [AdminController::class, 'registrarPsicologo'])->name('registrarpsicologo.index');

    Route::post('/registrarPsicologo', [AdminController::class, 'store'])->name('psicologo.store');
});

Route::get( '/', function () {return view('admin/index');} );

// Route::get('/admin', [AdminController::class, 'index'])
//     ->middleware('auth.admin')
//     ->name('admin.index');

// Route::get('/registrarpsicologo', [AdminController::class, 'registrarPsicologo'])
//     ->middleware('auth.admin')
//     ->name('registrarpsicologo.index');