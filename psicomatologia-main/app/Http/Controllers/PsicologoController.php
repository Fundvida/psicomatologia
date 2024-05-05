<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Psicologo;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PsicologoController extends Controller
{
    public function index_registrar()
    {
        return view('');
    }

    // public function store(Request $request){
    //     $data = $request->all();

    //     return response()->json($data);
    // }

    public function store(Request $request) {
        
        if($request->psicologo_id == ""){
            $user = new User();
            $user->name                 = $request->nombres;
            $user->apellidos            = $request->apellidos;
            $user->email                = $request->correoElectronico;
            $user->password             = $request->contrasena;
            //$user->role                 = "psicologo";
            $user->contador_bloqueos    = 0;
            $user->fecha_nacimiento     = $request->fechaNacimiento;
            $user->ci                   = $request->ci;
            $user->codigo_pais_telefono = $request->codigo_pais;
            $user->telefono             = $request->telefono;
            $user->pregunta_seguridad_a = $request->preguntaSeguridad1;
            $user->pregunta_seguridad_b= $request->preguntaSeguridad2;
            $user->assignRole('psicologo');

            $user->save();
        // TODO FALTAN "archivos":["Screenshot_1.png"], "metodoConfirmacion":"sms" 
            $psicologo = new Psicologo();
            $psicologo->user_id                 = $user->id; // Recuperamos el ultimo id creado
            $psicologo->estado                  = "ACTIVO";
            $psicologo->fecha_funcion_titulo    = $request->fechaFuncion;
            $psicologo->universidad             = $request->universidad;
            $psicologo->ciudad_residencia       = $request->ciudadResidencia;
            $psicologo->pais_residencia         = $request->paisResidencia;
            $psicologo->descripcion_cv          = $request->descripcionCV;

            $psicologo->save();
            //return redirect()->route('mntPsicologo.index')->with('resultado', "registrado");
            return redirect()->route('listaPsicologo');
        } else{
            $psicologo = Psicologo::findOrFail($request->psicologo_id);

            $psicologo->fecha_funcion_titulo    = $request->fechaFuncion;
            $psicologo->universidad             = $request->universidad;
            $psicologo->ciudad_residencia       = $request->ciudadResidencia;
            $psicologo->pais_residencia         = $request->paisResidencia;
            $psicologo->descripcion_cv          = $request->descripcionCV;

            $psicologo->save();

            $user = User::findOrFail($psicologo->user_id);

            $user->name                 = $request->nombres;
            $user->apellidos            = $request->apellidos;
            $user->email                = $request->correoElectronico;
            $user->password             = $request->contrasena;
            $user->contador_bloqueos    = 0;
            $user->fecha_nacimiento     = $request->fechaNacimiento;
            $user->ci                   = $request->ci;
            $user->codigo_pais_telefono = $request->codigo_pais;
            $user->telefono             = $request->telefono;
            $user->pregunta_seguridad_a = $request->preguntaSeguridad1;
            $user->pregunta_seguridad_b= $request->preguntaSeguridad2;
            $user->save();

            //return redirect()->route('mntPsicologo.index')->with('resultado', "actualizado");
            return redirect()->route('listaPsicologo');
        }
    }

    public function edit ($id){
        $psicologo = Psicologo::findOrFail($id);
        $user = User::findOrFail($psicologo->user_id);
    
        return [
            'psicologo' => $psicologo,
            'user' => $user,
        ];
    }

    public function delete ($id){
        $psicologo = Psicologo::findOrFail($id);
        $psicologo->estado = "INACTIVO";
        $psicologo->save();

        return redirect()->route('listaPsicologo');
    }

    protected function convertValidationExceptionToResponse(ValidationException $exception, $request)
    {
            return response()->json([
                'message' => 'The given data was invalid.',
                'errors' => $exception->errors(),
            ], $exception->status);
    }
    public function getPsicologos(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'especialidad' => 'required|string',
            ]);
        } catch (ValidationException $exception) {
            return $this->convertValidationExceptionToResponse($exception, $request);
        }

        $especialidad = $request->input('especialidad');
        $psicologo = Psicologo::join('especialidades','especialidades.psico_id','=','psicologos.id')
        ->join('users','users.id','=','psicologos.user_id')
        ->where('especialidades.especialidad','=',$especialidad)
        ->select('psicologos.*','users.name','users.apellidos','users.profile_photo_path','especialidades.especialidad')
        ->get();

        if (!$psicologo) {
            return response()->json([
                'message' => 'There is no psicologos',
                'status' => 'error',
            ], 409);
        }
        return response()->json([
            'message' => 'Psicologos Found',
            'psicologos'=>$psicologo,
            'status' => 'success',
        ]);
    }
}
