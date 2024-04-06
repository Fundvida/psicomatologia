<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SessionsController extends Controller {
    
    public function create() {
        
        return view('auth.login');
    }

    public function store() {
        
        if(auth()->attempt(request(['email', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'Credenciales incorrectas intente de nuevo.',
            ]);

        } else {

            if(auth()->user()->role == 'admin') {
                return redirect()->route('admin.index');
            } 
            if(auth()->user()->role == 'paciente') {
                return redirect()->route('paciente.index');
            } 
            if(auth()->user()->role == 'tutor') {
                return redirect()->route('tutor.index');
            } 
            if(auth()->user()->role == 'psicologo') {
                return redirect()->route('psicologo.index');
            } 
            else {
                return redirect()->to('/');
            }
        }
    }

    public function destroy() {

        auth()->logout();

        return redirect()->to('/');
    }
}
