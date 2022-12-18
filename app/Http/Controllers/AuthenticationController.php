<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller {

    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function login(Request $request): JsonResponse {

        $credentials = $request->only('email', 'password');

        $token = Auth::attempt($credentials);
        if (!$token) {
            return response()->api([], 'Unauthorized', 401);
        }

        $user = Auth::user();
        return response()->api([
            'user' => $user,
            'authorisation' => [
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth()->factory()->getTTL() * 60
            ]
        ]);
    }
}
