<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SesionController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\PsicologoController;
use Illuminate\Support\Facades\Auth;

Route::get('/login',[LoginController::class,'index'])->name('login');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');

    Route::get('/psicologo/home', function () {
        return view('homePsicologo');
    })->name('homePsicologo');

    Route::get('/paciente/home', function () {
        return view('homePaciente');
    })->name('homePaciente');
});

Route::get('/check-auth', function () {
    $authenticated = Auth::check();

    return response()->json(['authenticated' => $authenticated]);
});

Route::get('/', function () {
    return view('landingPage');
});

// Route::get('/test', function () {
//     return view('test');
// });

//Route::get('/home',[LoginController::class,'home'])->name('home');

//Route::get('/homePsicologo',[LoginController::class,'homePsicologo'])->name('homePsicologo');
Route::get('/homePsicologoHorario',[PsicologoController::class,'homePsicologoHorario'])
    ->middleware('can:homePsicologoHorario')
    ->name('homePsicologoHorario');

//Route::get('/homePaciente',[LoginController::class,'homePaciente'])->name('homePaciente');
Route::get('/homePacienteSesiones',[PacienteController::class,'homePacienteSesiones'])
    ->middleware('can:homePacienteSesiones')
    ->name('homePacienteSesiones');

Route::get('/listadoAllSesiones',[SesionController::class,'listadoAllSesiones'])
    ->middleware('can:listadoAllSesiones')
    ->name('listadoAllSesiones');

Route::get('/psicologo/getSesiones',[SesionController::class,'psicologoSesionesProgramadas']);

Route::get('psicologo/sesiones',[SesionController::class,'psicologoSesiones'])
    ->middleware('can:psicologo.sesiones')
    ->name('psicologo.sesiones'); // 

//agregadas las siguientes rutas para el wizard
Route::post('/checkemail', [UserController::class, 'checkEmail'])->name('checkemail');
Route::post('/getpsicologos',[PsicologoController::class, 'getPsicologos'])->name('getpsicologos');
Route::post('/savedatasesion',[SesionController::class, 'saveSesion'])->name('savedatasesion');
//fin de rutas agregadas para el wizard
Route::get('/landing',[LoginController::class,'pagina_landing'])->name('pagina_landing');
//agregado de nueva ruta para agendarcita
Route::get('/agendarcita', [LoginController::class,'agendarCita1'])->name('agendarcita');

Route::get('/cambiarContraseña', [UserController::class,'cambiarContraseña'])
    ->middleware('can:cambiarContraseña')
    ->name('cambiarContraseña');

Route::get('psicologo/listaPaciente', [PacienteController::class,'listaPacienteXpsicologo_'])
    ->middleware('can:listaPaciente')
    ->name('psicologo.pacientes');

Route::get('/listaPaciente', [PacienteController::class,'listaPaciente'])
    ->middleware('can:listaPaciente')
    ->name('listaPaciente');

Route::get('/listaPsicologo', [PsicologoController::class,'listaPsicologo'])
    ->middleware('can:listaPsicologo')
    ->name('listaPsicologo'); // admin

Route::get('/admin/listaPsicologos', [PsicologoController::class,'getPsicologosL']);

Route::post('/storePsicologo', [PsicologoController::class,'store'])
    ->middleware('can:psicologo.store')
    ->name('psicologo.store');    // crear psicologo

Route::get('/psicologo/{id}/edit', [PsicologoController::class, 'edit'])
    ->middleware('can:psicologo.edit')
    ->name('psicologo.edit'); // get psicologo x id

Route::post('/psicologo/del', [PsicologoController::class, 'delete'])
    ->middleware('can:psicologo.del')
    ->name('psicologo.del');     // delete psicologo

Route::post('/psicologoHorario', [PsicologoController::class, 'addHorario'])
    ->middleware('can:psicologo.addHorario')
    ->name('psicologo.addHorario');

Route::post('/psicologoHorarioDia', [PsicologoController::class, 'editHorarioXdia'])
    ->middleware('can:psicologo.editHorario_x_dia')
    ->name('psicologo.editHorario_x_dia');

Route::get('/psicologo/getHorario', [PsicologoController::class, 'getHorario'])
    ->middleware('can:psicologo.disponible')
    ->name('psicologo.disponible');

Route::post('/psicologo/inhabilitarHorario', [PsicologoController::class, 'inhabilitarHorario'])
    ->middleware('can:psicologo.inhabilitarHorario')
    ->name('psicologo.inhabilitarHorario');

Route::get('/psicologo/getNotificaciones', [PsicologoController::class, 'getNotificaciones'])
    ->middleware('can:psicologo.notificaciones')
    ->name('psicologo.notificaciones');

Route::post('/storePaciente', [PacienteController::class,'store'])
    ->middleware('can:paciente.store')
    ->name('paciente.store');  // crear paciente

Route::get('/paciente/{id}/edit', [PacienteController::class, 'edit'])
    ->middleware('can:paciente.edit')
    ->name('paciente.edit'); // get paciente x id

Route::post('/paciente/del', [PacienteController::class, 'delete'])
    ->middleware('can:paciente.del')
    ->name('paciente.del');     // delete paciente

Route::get('/paciente/getSesiones', [PacienteController::class, 'listarSesiones'])
    ->middleware('can:paciente.listar')
    ->name('paciente.listar');

Route::get('/psicologo/getPacientes', [PacienteController::class, 'listaPacienteXRol']);
    //->name('psicologo.pacientes');

Route::post('/paciente/cancelarSesion', [PacienteController::class, 'cancelarSesion'])
    ->middleware('can:paciente.delSesion')
    ->name('paciente.delSesion');

Route::get('/admin/getSesiones', [PsicologoController::class, 'getAllSesiones'])
    ->middleware('can:paciente.listar')
    ->name('paciente.listar');

Route::resource('/paciente/files', 'App\Http\Controllers\Files\FileController')
    ->middleware('can:paciente.files')
    ->names('paciente.files');

Route::post('/login',[LoginController::class,'iniciar_sesion'])->name('iniciar_sesion');
Route::post('/logout',[LoginController::class,'cerrar_sesion'])->name('cerrar_sesion');

Route::post('/changePassword', [UserController::class, 'changePassword'])
    ->name('user.password');


Route::get('/test', function () {
    return view('test');
});


