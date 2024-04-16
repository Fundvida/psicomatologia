<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::group(['prefix'=>'admin', 'namespace'=>'admin', 'middleware'=>'auth.admin'], function(){
    Route::get('/HomeAdmin', [AdminController::class, 'index'])->name('admin.index');

    Route::get('/mntPsicologo', [AdminController::class, 'mntPsicologo'])->name('mntPsicologo.index');
    Route::post('/mntPsicologo', [AdminController::class, 'store'])->name('psicologo.store');
    Route::get('/psicologo/{id}/edit', [AdminController::class, 'edit'])->name('psicologo.edit');
    Route::get('/psicologo/{id}/del', [AdminController::class, 'delete'])->name('psicologo.del');
});

Route::get( '/', function () {return view('admin/index');} );

// Route::get('/admin', [AdminController::class, 'index'])
//     ->middleware('auth.admin')
//     ->name('admin.index');

// Route::get('/registrarpsicologo', [AdminController::class, 'registrarPsicologo'])
//     ->middleware('auth.admin')
//     ->name('registrarpsicologo.index');