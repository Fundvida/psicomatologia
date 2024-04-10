<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PsicologoController;

Route::group(['prefix'=>'psicologo', 'namespace'=>'psicologo', 'middleware'=>'auth.psicologo'], function(){
    Route::get('/psicologo', [PsicologoController::class, 'index'])->name('psicologo.index');
});

Route::get( '/', function () {return view('psicologo/index');} );
// Route::get('/psicologo', [PsicologoController::class, 'index'])
//     ->middleware('auth.psicologo')
//     ->name('psicologo.index');