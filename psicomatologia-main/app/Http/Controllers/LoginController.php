<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Psicologo;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function iniciar_sesion(Request $request)
{
    // Validación de credenciales utilizando el método validate
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    // Se intenta autenticar al usuario
    if (Auth::attempt($credentials)) {
        // La autenticación fue exitosa, redirige al usuario a la página de inicio
        return redirect()->route('home');
    }

    // La autenticación falló, redirige de vuelta con un mensaje de error
    return back()->withErrors([
        'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
    ]);
}

    public function cerrar_sesion(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
    public function homePsicologo()
    {
        return view('homePsicologo');
    }
    public function homePsicologoHorario()
    {
        return view('homePsicologoHorario');
    }

    public function homePaciente()
    {
        return view('homePaciente');
    }
    public function homePacienteSesiones()
    {
        return view('homePacienteSesiones');
    }

    public function pagina_landing()
    {
        return view('landingPage');
    }
    public function agendarCita1()
    {
        return view('agendarcita');
    }
    public function agendarCita2()
    {
        return view('agendarCita2');
    }
    public function agendarCita3()
    {
        return view('agendarCita3');
    }
    public function agendarCita4()
    {
        return view('agendarCita4');
    }
    public function agendarCita5()
    {
        return view('agendarCita5');
    }
    public function cambiarContraseña()
    {
        return view('cambiarContraseña');
    }
    public function listaPaciente()
    {
        $pacientes = Paciente::all();
        return view('listaPaciente', compact('pacientes'));
    }

    public function listaPsicologo()
    {
        $psicologos = Psicologo::all();

        return view('listaPsicologo', compact('psicologos'));
    }

}
