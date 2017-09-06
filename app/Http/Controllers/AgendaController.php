<?php

namespace App\Http\Controllers;

use App\Model\Aluno;
use App\Model\Curso;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function agenda(){
        return view('agenda.agenda');
    }

    public function agendar(){
        $cursos = Curso::all();
        $alunos = Aluno::all();
        return view('agenda.agendar', compact('cursos', 'alunos'));
    }
}
