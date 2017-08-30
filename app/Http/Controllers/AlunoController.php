<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function cadastrar(){
        return view('aluno.cadastrar');
    }

    public function manterCadastros(){
        return view('aluno.manter');
    }
}
