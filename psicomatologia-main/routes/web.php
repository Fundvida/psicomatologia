<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SesionController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\PsicologoController;
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');
});
Route::get('/', function () {
    return view('landingPage');
});

Route::get('/home',[LoginController::class,'home'])->name('home');

Route::get('/homePsicologo',[LoginController::class,'homePsicologo'])->name('homePsicologo');
Route::get('/homePsicologoHorario',[LoginController::class,'homePsicologoHorario'])->name('homePsicologoHorario');


Route::get('/homePaciente',[LoginController::class,'homePaciente'])->name('homePaciente');
Route::get('/homePacienteSesiones',[LoginController::class,'homePacienteSesiones'])->name('homePacienteSesiones');

//agregadas las siguientes rutas para el wizard
Route::post('/checkemail', [UserController::class, 'checkEmail'])->name('checkemail');
Route::post('/getpsicologos',[PsicologoController::class, 'getPsicologos'])->name('getpsicologos');
Route::post('/savedatasesion',[SesionController::class, 'saveSesion'])->name('savedatasesion');
//fin de rutas agregadas para el wizard
Route::get('/landing',[LoginController::class,'pagina_landing'])->name('pagina_landing');
//agregado de nueva ruta para agendarcita
Route::get('/agendarcita', [LoginController::class,'agendarCita1'])->name('agendarcita');

Route::get('/cambiarContraseña', [LoginController::class,'cambiarContraseña'])->name('cambiarContraseña');
Route::get('/listaPaciente', [LoginController::class,'listaPaciente'])->name('listaPaciente');


Route::get('/listaPsicologo', [LoginController::class,'listaPsicologo'])->name('listaPsicologo'); // admin

Route::post('/storePsicologo', [PsicologoController::class,'store'])->name('psicologo.store');    // crear psicologo
Route::get('/psicologo/{id}/edit', [PsicologoController::class, 'edit'])->name('psicologo.edit'); // get psicologo x id
Route::get('/psicologo/{id}/del', [PsicologoController::class, 'delete'])->name('psicologo.del');     // delete psicologo

Route::post('/storePaciente', [PacienteController::class,'store'])->name('paciente.store');  // crear paciente
Route::get('/paciente/{id}/edit', [PacienteController::class, 'edit'])->name('paciente.edit'); // get paciente x id
Route::get('/paciente/{id}/del', [PacienteController::class, 'delete'])->name('paciente.del');     // delete paciente

Route::post('/login',[LoginController::class,'iniciar_sesion'])->name('iniciar_sesion');
Route::post('/logout',[LoginController::class,'cerrar_sesion'])->name('cerrar_sesion');



