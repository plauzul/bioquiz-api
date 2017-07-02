<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\PasswordReset;

class PasswordController extends Controller {

    public function email(Request $request) {
        $email = $request->email;
        $token = substr(md5(microtime()), 0, 5);
        
        if(User::where('email', $email)->first()) {
            $passwordReset = new PasswordReset();
            $passwordReset->email = $email;
            $passwordReset->token = $token;
            $passwordReset->save();

            // Mail::queue("Este é o seu token para a redefinição de sua senha: $token", function($message) {
            //     $message->from('henriq10@outlook.com', 'Paulo Henrique');
            //     $message->to($email);
            // });

            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'user_not_found'], 404);
        }
    }

    public function verifyToken($token) {
        if(PasswordReset::where('token', $token)->first()) {
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'token_not_found'], 404);
        }
    }

    public function reset(Request $request, $token) {
        $email = $request->email;
        $password = $request->password;

        if(PasswordReset::where('email', $email)->first() && PasswordReset::where('token', $token)->first()) {
            $user = User::where('email', $email)->first();
            $user->password = app('hash')->make($password);
            $user->save();

            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'token_not_found'], 404);
        }
    }

}
