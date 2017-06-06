<?php

namespace App\Http\Controllers;

use App\Rank;
use App\User;
use DB;

class RankController extends Controller {

    public function total() {
        return DB::table('users')
                    ->join('ranks', 'users.id', '=', 'ranks.id_user')
                    ->select('ranks.id', 'ranks.id_user', 'users.name', 'users.img', 'ranks.points')
                    ->orderBy('ranks.points', 'desc')
                    ->limit(10)
                    ->get();
    }

    public function me($idUser) {
        return Rank::where('id_user', $idUser)->first();
    }
}
