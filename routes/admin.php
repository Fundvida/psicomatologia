<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\PsicologoController;

Route::resource('psicologo', [PsicologoController::class, 'index'])->names('admin.psicologo');