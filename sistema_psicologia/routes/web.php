<?php
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');
});

Route::get('/homePsicologo',[LoginController::class,'homePsicologo'])->name('homePsicologo');
Route::get('/homePsicologoHorario',[LoginController::class,'homePsicologoHorario'])->name('homePsicologoHorario');


Route::get('/homePaciente',[LoginController::class,'homePaciente'])->name('homePaciente');
Route::get('/homePacienteSesiones',[LoginController::class,'homePacienteSesiones'])->name('homePacienteSesiones');




Route::get('/landing',[LoginController::class,'pagina_landing'])->name('pagina_landing');
Route::get('/agendarCita1', [LoginController::class,'agendarCita1'])->name('agendarCita1');
Route::get('/agendarCita2', [LoginController::class,'agendarCita2'])->name('agendarCita2');
Route::get('/agendarCita3', [LoginController::class,'agendarCita3'])->name('agendarCita3');
Route::get('/agendarCita4', [LoginController::class,'agendarCita4'])->name('agendarCita4');
Route::get('/agendarCita5', [LoginController::class,'agendarCita5'])->name('agendarCita5');
Route::get('/cambiarContraseña', [LoginController::class,'cambiarContraseña'])->name('cambiarContraseña');

Route::get('/listaPaciente', [LoginController::class,'listaPaciente'])->name('listaPaciente');
Route::get('/listaPsicologo', [LoginController::class,'listaPsicologo'])->name('listaPsicologo');


Route::post('/login',[LoginController::class,'iniciar_sesion'])->name('iniciar_sesion');
Route::post('/logout',[LoginController::class,'cerrar_sesion'])->name('cerrar_sesion');



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
