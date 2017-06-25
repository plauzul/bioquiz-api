<?php

namespace App\Http\Controllers;

use App\User;
use Tymon\JWTAuth\JWTAuth;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;

class UsersController extends Controller {

    public function index() {
        return User::all();
    }

    public function show(JWTAuth $jwt, $token) {
        $jwt->setToken($token);
        try {
            return $jwt->parseToken()->toUser();
        } catch(TokenExpiredException $e) {
            return response()->json(['status' => 'token_expired'], 401);
        }
    }

    public function delete($id) {
        User::find($id)->delete();

        return response()->json(['status' => 'user_deleted']);
    }
}
