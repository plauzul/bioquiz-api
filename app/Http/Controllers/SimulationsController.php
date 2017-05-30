<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Simulation;
use App\Result;
use App\Proof;
use Carbon\Carbon;

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

    public function setResult(Request $request, $idUser, $idProof) {
        $markeds = 0;
        $values = [];
        $questions = Simulation::where('proof_id', $idProof)->get();

        foreach ($questions as $key => $value) {
            if($value->id == $request->idq1) {
                if($value->correct == $request->q1) {
                    $markeds += 1;
                }
            } elseif($value->id == $request->idq2) {
                if($value->correct == $request->q2) {
                    $markeds += 1;
                }
            } elseif($value->id == $request->idq3) {
                if($value->correct == $request->q3) {
                    $markeds += 1;
                }
            } elseif($value->id == $request->idq4) {
                if($value->correct == $request->q4) {
                    $markeds += 1;
                }
            } elseif($value->id == $request->idq5) {
                if($value->correct == $request->q5) {
                    $markeds += 1;
                }
            } elseif($value->id == $request->idq6) {
                if($value->correct == $request->q6) {
                    $markeds += 1;
                }
            } elseif($value->id == $request->idq7) {
                if($value->correct == $request->q7) {
                    $markeds += 1;
                }
            } elseif($value->id == $request->idq8) {
                if($value->correct == $request->q8) {
                    $markeds += 1;
                }
            } elseif($value->id == $request->idq9) {
                if($value->correct == $request->q9) {
                    $markeds += 1;
                }
            } elseif($value->id == $request->idq10) {
                if($value->correct == $request->q10) {
                    $markeds += 1;
                }
            }
        }

        $results = Result::whereDate('created_at', '=', Carbon::today()->toDateString())->first();

        if($results) {
            $percentage = (((intval($results->percentage) / 100) + (($markeds * 10) / 100)) / 2) * 100;
            $results->percentage = $percentage."%";
            $results->save();
        } else {
            $result = new Result();
            $result->percentage = ($markeds * 10)."%";
            $result->id_user = $idUser;
            $result->save();
        }

        return response()->json(['percentage' => ($markeds * 10)."%"]);
    }

    public function getResult($idUser) {
        return Result::where("id_user", $idUser)->get();
    }
}
