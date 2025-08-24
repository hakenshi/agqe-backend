<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {

        $data = $request->validated();

        
        $user = User::where('cpf', $data['cpf'])->first();
        
        
        if (!$user || !Hash::check($data['password'], $user->password)) {
            return response()->json(['error' => 'Credenciais inválidas'], 401);
        }
        
        $token = JWTAuth::fromUser($user);
        
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => config('jwt.ttl') * 60,
            'user' => new UserResource($user),
        ]);
    }

    public function me()
    {
        return new UserResource(auth()->user());
    }

    public function logout()
    {
        JWTAuth::invalidate(JWTAuth::getToken());
        return response()->json(['message' => 'Logout realizado com sucesso']);
    }
}
