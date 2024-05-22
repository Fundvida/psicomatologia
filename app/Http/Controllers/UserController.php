<?php

namespace App\Http\Controllers;

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
}
