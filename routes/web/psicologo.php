<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PsicologoController;

Route::group(['prefix'=>'psicologo', 'namespace'=>'psicologo', 'middleware'=>'auth.psicologo'], function(){
    Route::get('/psicologo', [PsicologoController::class, 'index'])->name('psicologo.index');
    
    Route::post('/psicologoHorario', [PsicologoController::class, 'addHorario'])->name('psicologo.addHorario');
});

Route::get( '/', function () {return view('psicologo/index');} );