<?php

namespace App\Http\Controllers;

use App\Http\Requests\InstrumentoRequest;
use App\Model\Instrumento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class InstrumentoController extends Controller
{
    public function cadastrar(){
        return view('instrumento.cadastrar');
    }

    public function manterCadastros(){
        $instrumentos = Instrumento::all();
        return view('instrumento.manter', compact('instrumentos'));
    }

    public function salvar(InstrumentoRequest $request){
        try{
            DB::beginTransaction();
            $instrumento = new Instrumento();
            $status = false;
            $instrumento->nome = $request->input('nome');
            $instrumento->descricao = $request->input('descricao');
            $instrumento->imagem = ($request->file('imagem') != null) ? $request->file('imagem')->store('img') : null;
            $status = $instrumento->save();
            if($status){
                DB::commit();
                return redirect()
                    ->back()
                    ->with('alerta-sucesso', 'O Instrumento foi cadastrado com sucesso!');
            }else{
                throw new Exception('Erro ao cadastrar.');
            }
        }catch (\Exception $e){
            DB::rollback();
            Storage::exists($instrumento->imagem)? Storage::delete($instrumento->imagem) : null;
            return redirect()
                ->back()
                ->withInput()
                ->with('alerta-perigo', 'Erro ao cadastrar o instrumento ! Código '. $e. ' por favor, entre em contato com o Administrador do Sistema.');
        }

    }
}
