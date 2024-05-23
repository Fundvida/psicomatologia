<?php

namespace App\Http\Controllers\Files;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\File;
use App\Models\Notificacion;
use App\Models\Psicologo;
use App\Models\Sesion;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return response()->json([
        //     'psicologo_id' => $psicologo_id,
        //     'user_id' => $user_id,
        // ]); 
        $request->validate([
            'file' => 'required|image|max:2048'
        ]);

        $imagen = $request->file('file')->store('public/comprobantes');
        $url = Storage::url($imagen);
        File::create([
            'url' => $url,
            'paciente_id' => $request->id_paciente,
            'sesion_id' => $request->id_sesion,
            'tipo_doc' => $request->tipo_doc
        ]);
        // Almacenar la URL anterior en la sesión
        session()->flash('previous_url', url()->previous());

        $psicologo_id = Sesion::where('id', $request->id_sesion)->pluck('psicologo_id')->first();
        $user_id = Psicologo::where('id', $psicologo_id)->pluck('user_id')->first();

        Notificacion::create([
            'descripcion' => 'Un usuario a realizado el pago de una sesión programada',
            'user_id' => $user_id,
            'sesion_id' => $request->id_sesion,
        ]);

        return redirect()->route('homePacienteSesiones');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
