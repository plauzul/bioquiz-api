<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Simulation;
use App\Result;
use App\Proof;

class SimulationsController extends Controller {

    public function proofs() {
        return Proof::all();
    }

    public function questions($idProof) {
        $simulations = Simulation::where('proof_id', $idProof)->get();

        if(!empty($simulations[0])) {
            return $simulations;
        } else {
            return response()->json(['status' => 'without_simulation']);
        }
    }

    public function result(Request $request, $idUser, $idProof) {
        // [
        //     {
        //         "id": $request->id,
        //         "marked": $request->marked
        //     }
        // ]

        return "deixa para a proxima semana porque sa porra é foda";
    }
}
