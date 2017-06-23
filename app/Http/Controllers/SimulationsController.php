<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Simulation;
use App\Result;
use App\Proof;
use App\Rank;
use Carbon\Carbon;

class SimulationsController extends Controller {

    public function proofs() {
        return Proof::all();
    }

    public function questions($idProof) {
        $simulations = Simulation::where('proof_id', $idProof)->get();

        if(!empty($simulations[0])) {
            return $simulations->shuffle();
        } else {
            return response()->json(['status' => 'without_simulation']);
        }
    }

    public function setResult(Request $request, $idUser, $idProof) {
        $wrongs = [];
        $markeds = 0;
        $questions = Simulation::where('proof_id', $idProof)->get();

        foreach ($questions as $key => $value) {
            if($value->id == $request->idq1) {
                if($value->correct == $request->q1) {
                    $markeds += 1;
                } else {
                    array_push($wrongs, $value);
                }
            } elseif($value->id == $request->idq2) {
                if($value->correct == $request->q2) {
                    $markeds += 1;
                } else {
                    array_push($wrongs, $value);
                }
            } elseif($value->id == $request->idq3) {
                if($value->correct == $request->q3) {
                    $markeds += 1;
                } else {
                    array_push($wrongs, $value);
                }
            } elseif($value->id == $request->idq4) {
                if($value->correct == $request->q4) {
                    $markeds += 1;
                } else {
                    array_push($wrongs, $value);
                }
            } elseif($value->id == $request->idq5) {
                if($value->correct == $request->q5) {
                    $markeds += 1;
                } else {
                    array_push($wrongs, $value);
                }
            } elseif($value->id == $request->idq6) {
                if($value->correct == $request->q6) {
                    $markeds += 1;
                } else {
                    array_push($wrongs, $value);
                }
            } elseif($value->id == $request->idq7) {
                if($value->correct == $request->q7) {
                    $markeds += 1;
                } else {
                    array_push($wrongs, $value);
                }
            } elseif($value->id == $request->idq8) {
                if($value->correct == $request->q8) {
                    $markeds += 1;
                } else {
                    array_push($wrongs, $value);
                }
            } elseif($value->id == $request->idq9) {
                if($value->correct == $request->q9) {
                    $markeds += 1;
                } else {
                    array_push($wrongs, $value);
                }
            } elseif($value->id == $request->idq10) {
                if($value->correct == $request->q10) {
                    $markeds += 1;
                } else {
                    array_push($wrongs, $value);
                }
            }
        }

        $results = Result::whereDate('created_at', '=', Carbon::today()->toDateString())->first();
        // Salvo os dados da porcentagem de acertos do dia na tabela Simulations
        if($results) {
            $percentage = (((intval($results->percentage) / 100) + (($markeds * 10) / 100)) / 2) * 100;
            $results->percentage = $percentage >= 100 ? "100%" : $percentage."%";
            $results->save();
        } else {
            $result = new Result();
            $result->percentage = ($markeds * 10)."%";
            $result->id_user = $idUser;
            $result->save();
        }

        // Agora apenas acrecento mais pontos na tabela points
        $rank = Rank::where('id_user', $idUser)->first();
        Rank::updateOrCreate(
            ['id_user' => $idUser],
            ['points' => !!$rank ? $rank->points + ($markeds * 2) : 2]
        );

        // Pego as questões marcadas erradas
        
        return response()->json([
            'percentage' => ($markeds * 10)."%",
            'points' => !!$rank ? $rank->points + ($markeds * 2) : 2,
            'wrongs' => $wrongs
        ]);
    }

    public function getResult($idUser) {
        return Result::where("id_user", $idUser)->get();
    }
}
