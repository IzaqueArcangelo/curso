<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstrumentoController extends Controller
{
    public function cadastrar(){
        return view('instrumento.cadastrar');
    }

    public function manterCadastros(){
        return view('instrumento.manter');
    }
}
