<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\PsicologoController;
use App\Http\Controllers\TutorController;

Route::get('/', function () {
    return view('home');
})->middleware('auth');

Route::get('/register', [RegisterController::class, 'create'])
    ->middleware('guest')
    ->name('register.index');

Route::post('/register', [RegisterController::class, 'store'])
    ->name('register.store');

Route::get('/login', [SessionsController::class, 'create'])
    ->middleware('guest')
    ->name('login.index');

Route::post('/login', [SessionsController::class, 'store'])
    ->name('login.store');

Route::get('/logout', [SessionsController::class, 'destroy'])
    ->middleware('auth')
    ->name('login.destroy');



Route::get('/admin', [AdminController::class, 'index'])
    ->middleware('auth.admin')
    ->name('admin.index');

Route::get('/paciente', [PacienteController::class, 'index'])
    ->middleware('auth.paciente')
    ->name('paciente.index');

Route::get('/tutor', [TutorController::class, 'index'])
    ->middleware('auth.tutor')
    ->name('tutor.index');

Route::get('/psicologo', [PsicologoController::class, 'index'])
    ->middleware('auth.psicologo')
    ->name('psicologo.index');

Route::get('/registrarpsicologo', [AdminController::class, 'registrarPsicologo'])
    ->middleware('auth.admin')
    ->name('registrarpsicologo.index');

Route::get('/registrarpaciente', [TutorController::class, 'registrarPaciente'])
    ->middleware('auth.tutor')
    ->name('registrarpaciente.index');
