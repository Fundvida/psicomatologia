<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TutorController extends Controller
{
    public function index() {

        return view('tutor.index');
    }

    public function registrarPaciente() {

        return view('tutor.registrarpaciente');
    }
}
