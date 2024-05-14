<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
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
