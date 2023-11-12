<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class PassportAuthController extends Controller
{
    //
    public function register(Request $request) {
        try{
        $user = User::create([
            'name' => $request -> name,
            'email' => $request -> email,
            'password' => bcrypt($request -> password)
        ]);
        $token = $user -> createToken('thisiismypassword') -> accessToken;
        return response() -> json(['token' => $token], 200);
        }
        catch(\Exception $e) {
            return response() -> json(['error' => 'registration fail'.$e], 500);
        }
    }

    public function login(Request $request) {
        $credentials = $request->only('email', 'password');
        if(!$token = JWTAuth::attempt($credentials)) {
            return response() -> json(['error' => 'unauthorized'], 401);
        }
        else {
            return response() -> json(['token' => $token], 200);
        }
    }
}
