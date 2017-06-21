<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;
use App\User;

class AuthController extends Controller {

    public function login(JWTAuth $jwt, Request $request) {
        $this->validate($request, [
            'email'    => 'required|email|max:255',
            'password' => 'required',
        ]);

        try {
            if (!$token = $jwt->attempt($request->only('email', 'password'))) {
                return response()->json(['status' => 'user_not_found'], 404);
            }
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['status' => 'token_expired'], 500);
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['status' => 'token_invalid'], 500);
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['token_absent' => $e->getMessage()], 500);
        }

        return response()->json(compact('token'));
    }

    public function register(JWTAuth $jwt, Request $request) {
        $this->validate($request, [
            'email'    => 'required|email|max:255|unique:users',
            'password' => 'required',
            'name' => 'required'
        ]);

        $user = new User();
        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = app('hash')->make($request->password);
        $user->img = isset($request['img']) ? $request->img : 'https://d30y9cdsu7xlg0.cloudfront.net/png/15724-200.png';
        $user->save();

        $token = $jwt->attempt($request->only('email', 'password'));

        return response()->json(compact('token'));
    }
}