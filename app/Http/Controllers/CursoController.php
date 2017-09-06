<?php

namespace App\Http\Controllers;

use App\Model\Instrumento;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function cadastrar(){
        $instrumentos = Instrumento::all();
        return view('curso.cadastrar', compact('instrumentos'));
    }

    public function manterCadastros(){
        return view('curso.manter');
    }
}
