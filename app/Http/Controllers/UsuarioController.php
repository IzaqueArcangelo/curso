<?php

namespace App\Http\Controllers;

use App\Model\Perfil;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function cadastrar(){
        $perfils = Perfil::all();
        return view('usuario.cadastrar', compact('perfils'));
    }

    public function manterCadastros(){
        return view('usuario.manter');
    }
}
