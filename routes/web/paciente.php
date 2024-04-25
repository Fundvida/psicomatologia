<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;

Route::group(['prefix'=>'paciente', 'namespace'=>'paciente', 'middleware'=>'auth.paciente'], function(){
    Route::get('/paciente', [PacienteController::class, 'index'])->name('paciente.index'); 
    
    Route::get('/{id}/nuevaSesion', [PacienteController::class, 'getPsicologo'])->name('psicologo.data');
    Route::post('/nuevaSesion', [PacienteController::class, 'addSesion'])->name('paciente.newSesion');
    
    Route::get('/psicologo/{id}', [PacienteController::class, 'mostrarPsicologo'])->name('psicologo.mostrar');

});

Route::get( '/', function () {return view('paciente/index');} );

// Route::get('/paciente', [PacienteController::class, 'index'])
//     ->middleware('auth.paciente')
//     ->name('paciente.index');