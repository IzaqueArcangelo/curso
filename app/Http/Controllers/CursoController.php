<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function cadastrar(){
        return view('curso.cadastrar');
    }

    public function manterCadastros(){
        return view('curso.manter');
    }
}
