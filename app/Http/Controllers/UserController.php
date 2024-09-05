<?php

namespace App\Http\Controllers;

use App\Models\Especialidad;
use App\Models\Psicologo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    
    protected function convertValidationExceptionToResponse(ValidationException $exception, $request)
    {
            return response()->json([
                'message' => 'The given data was invalid.',
                'errors' => $exception->errors(),
            ], $exception->status);
    }
    public function checkEmail(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'email' => 'required|email',
            ]);
        } catch (ValidationException $exception) {
            return $this->convertValidationExceptionToResponse($exception, $request);
        }
        $email = $request->input('email');
        $user = User::where('email', $email)->first();

        if ($user) {
            return response()->json([
                'message' => 'Email is already registered',
                'status' => 'error',
            ], 409);
        }
        return response()->json([
            'message' => 'Email is available',
            'status' => 'success',
        ]);
    }

    public function changePassword(Request $request){
        $validator = Validator::make($request->all(), [
            'currentPassword' => 'required',
            'newPassword' => 'required|min:8',
            'confirmPassword' => 'required|same:newPassword',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 400);
        }

        // Verificar si la contraseña actual proporcionada coincide con la del usuario
        if (!Hash::check($request->currentPassword, Auth::user()->password)) {
            return response()->json(['error' => 'La contraseña actual no es válida'], 400);
        }

        // Si la contraseña actual es válida, proceder con la actualización de la contraseña
        $user = Auth::user();
        $user->password = bcrypt($request->newPassword);
        $user->save();

        return response()->json(['message' => 'Contraseña actualizada correctamente'], 200);
    }


    function cambiarPassword()
    {
    }

    function storeChangedPassword(Request $request)
    {
    }

    public function cambiarContraseña()
    {
        return view('cambiarContraseña');
    }

    public function notificaciones()
    {
        return view('notificaciones');
    }

    public function editView(){
        $user = Auth::user();
        $especialidades = null;

        if($user->hasRole('Psicologo')){
            $psicologo = Psicologo::where('user_id', $user->id)->first();
            $especialidades = Especialidad::where('psico_id', $psicologo->id)->get();
        }

        return view('userEdit', compact('user', 'especialidades'));
    }

    public function edit(Request $request){
        $user = User::where('id', Auth::user()->id)->first();
        $checkEmail = null;

        if($user->email != $request->email){
            $checkEmail = User::where('email', $request->email)->first();
        }

        if(!$checkEmail){
            $user->name = $request->nombre;
            $user->apellidos = $request->apellidos;
            $user->fecha_nacimiento = $request->fecha_nac;
            $user->email = $request->email;
            $user->telefono = $request->telefono;
            $user->save();

            if($user->hasRole('Psicologo')){
                foreach ($request->input('tarifas') as $espec_id => $tarifa) {
                    Especialidad::where('espec_id', $espec_id)->update(['tarifa' => $tarifa]);
                }
            }
            return redirect()->route('user.edit.view')->with('resultado', "actualizado");
        }

        return redirect()->route('user.edit.view')->with('resultado', "error");
    }
}
