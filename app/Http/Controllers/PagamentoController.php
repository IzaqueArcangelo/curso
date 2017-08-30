<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagamentoController extends Controller
{
    public function index(){
        return view('aluno.pagamento');
    }

    public function informacao(){
        return view('pagamento.informacao');
    }
}
