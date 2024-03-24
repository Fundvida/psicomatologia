<?php
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');
});

Route::get('/landing',[LoginController::class,'pagina_landing'])->name('pagina_landing');
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
