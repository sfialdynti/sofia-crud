<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class ApiAuthController extends Controller
{
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => ['email', 'required'],
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'invalid',
                'errors' => $validator->errors()
            ], 422);
        }

        $credentials = $request->only('email', 'password');
        if (!$token = Auth::guard('api')->attempt($credentials)) {
            return response()->json([
                'status' => 'Gagal',
                'errors' => 'Email or password salah'
            ], 401);
        }

        $user = Auth::guard('api')->user();

        return response()->json([
            'status' => 'Berhasil',
            'token' => $token,
            'user' => $user
        ], 200);
    }

    public function logout(){
        $removeToken = JWTAuth::invalidate(JWTAuth::getToken());

        if ($removeToken) {
            return response()->json([
                'status' => 'Berhasil',
                'message' => 'Logout'
            ], 200);
        }
    }
}
