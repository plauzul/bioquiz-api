<?php

namespace App\Http\Controllers;

use App\User;
use Tymon\JWTAuth\JWTAuth;

class UsersController extends Controller {

    public function index() {
        return User::all();
    }

    public function show(JWTAuth $jwt, $token) {
        return $jwt->parseToken()->toUser();
    }

    public function delete($id) {
        User::find($id)->delete();

        return response()->json(['status' => 'user_deleted']);
    }
}
