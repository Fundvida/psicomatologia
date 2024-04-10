<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TutorController;

Route::group(['prefix'=>'tutor', 'namespace'=>'tutor', 'middleware'=>'auth.tutor'], function(){
    Route::get('/HomeTutor', [TutorController::class, 'index'])->name('tutor.index');

    Route::get('/registrarPaciente', [TutorController::class, 'registrarPaciente'])->name('registrarpaciente.index');
});

Route::get( '/', function () {return view('tutor/index');} );

// Route::get('/tutor', [TutorController::class, 'index'])
//     ->middleware('auth.tutor')
//     ->name('tutor.index');

// Route::get('/registrarpaciente', [TutorController::class, 'registrarPaciente'])
//     ->middleware('auth.tutor')
//     ->name('registrarpaciente.index');
