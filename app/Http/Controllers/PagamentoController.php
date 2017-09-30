<?php

namespace App\Http\Controllers;

use App\Model\Aluno;
use App\Model\Ano;
use App\Model\Mes;
use Illuminate\Http\Request;

class PagamentoController extends Controller
{
    public function index(){
        return view('aluno.pagamento');
    }

    public function informacao($id){
        $aluno = Aluno::find($id);
        return view('pagamento.informacao', compact('aluno'));
    }
}
