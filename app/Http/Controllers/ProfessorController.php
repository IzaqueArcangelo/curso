<?php

namespace App\Http\Controllers;

use App\Model\Curso;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    public function cadastrar(){
        $cursos = Curso::all();
        return view('professor.cadastrar', compact('cursos'));
    }

    public function manterCadastros(){
        return view('professor.manter');
    }
}
