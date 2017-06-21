<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proof;
use App\Simulation;

class IndexController extends Controller {

    public function index() {
        return view('index');
    }

    public function formRegisterQuestions() {
        $proofs = Proof::all();
        return view('form-register-questions', ['proofs' => $proofs]);
    }

    public function formRegisterProofs() {
        return view('form-register-proofs');
    }

    public function formRegisterQuestionsSave(Request $request) {
        $proofs = Proof::all();
        $simulation = new Simulation();
        $simulation->fill($request->all());
        $simulation->save();

        return view('form-register-questions', ['success' => 'Prova cadastrada com sucesso!', 'proofs' => $proofs]);
    }

    public function formRegisterProofsSave(Request $request) {
        $proof = new Proof();
        $proof->name = $request->name;        
        $proof->save();

        return view('form-register-proofs', ['success' => 'Prova cadastrada com sucesso!']);
    }

    public function formEditProofs() {
        return "Ainda sera implementado :)";
    }

    public function formEditQuestions() {
        return "Ainda será implementado :)";
    }
}
