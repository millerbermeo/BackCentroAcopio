<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        try {
            if (!Auth::attempt($request->only("email", "password"))) {
                return response()->json(["mensaje"=> "inicio de session invalido"]);
            }

            $user = Auth::user();
            $token = $user ->createToken('token')->plainTextToken;


            $response = [
                "id" => $user->id,
                "nombre" => $user->nombre,
                "email" => $user->email,
                "api_token" => $token,
                "rol" => $user->rol
            ];
            
            return response()->json($response, 200);

        } catch (Exception $e) {
            return response()->json($e, 422);
        }
    }

    public function logout(Request $request) {
        try {
            $user = $request->user();
            $user->currentAccessToken()->delete();
            return response()->json(["mensaje" => "cierre de sesión correcto"], 200);
        } catch (\Exception $e) {
            return response()->json(["mensaje" => "información no procesada"], 422);
        }
    }
    
}
