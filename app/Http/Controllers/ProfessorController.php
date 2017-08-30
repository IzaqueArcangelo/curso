<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    public function cadastrar(){
        return view('professor.cadastrar');
    }

    public function manterCadastros(){
        return view('professor.manter');
    }
}
