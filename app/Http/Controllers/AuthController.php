<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // return $request;
        // validar
        $request->validate([
            "email" => "required|string",
            "password" => "required|string"
        ]);

        // Verificar el correo
        // [{},{},{}] get
        // {}
        $user = User::where('email', $request->email)->first();

        // verificar el password 
        $pass = $request->password;
        if(!$user || !Hash::check($pass, $user->password)){
            return response()->json([
                "mensaje" => "Credenciales Incorrectas"
            ], 401);
        }

        // generar el token
        $token = $user->createToken('mitoken')->plainTextToken;        

        // responder el token
        return response()->json([
            "usuario" => $user,
            "token" => $token             
        ], 200);
    }

    public function logout(Request $request)
    {
        //auth()->user()->tokens()->delete();
        // $request->user()->currentAccessToken()->delete();

        return [ 'mensaje' => "Token eliminado" ];
    }
}
