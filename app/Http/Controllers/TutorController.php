<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TutorController extends Controller
{
    public function getViewSesionList(){
        return view('homeTutorSesiones');
    }
}
