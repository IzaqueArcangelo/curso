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

    public function editar($id){
        $instrumento = Instrumento::find($id);
        return view('instrumento.cadastrar', compact('instrumento'));
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

    public function atualizar(Request $request, $id){
        //Abre uma transação
        DB::beginTransaction();
        $instrumento = Instrumento::find($id);
        //dados do formulário
        $form = $request->except('_token');

        $instrumento->nome = $request->input('nome');
        $instrumento->descricao = $request->input('descricao');

        $instrumento->imagem = ($request->file('imagem') == null)? $instrumento->imagem : $this->alterarImagem($request, $instrumento->imagem);

        $imgObigatoria = $instrumento->imagem == null ? true : false;

        $validacao = validator($form,$this->rules(), $this->messages());

        // Se houver erro na validação do formulário
        if ($validacao->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validacao);
        }

        try{
            $status = $instrumento->update();
            if($status){
                DB::commit();
                return redirect()
                    ->back()
                    ->with('alerta-sucesso', 'O Instrumento foi atualizado com sucesso!');
            }else{
                throw new Exception('Erro ao atualizar dados.');
            }
        }
        catch (\Exception $e){
            DB::rollback();
            return redirect()
                ->back()
                ->withInput()
                ->with('alerta-perigo', 'Erro ao atualizar dados do instrumento ! Código '. $e. ' por favor, entre em contato com o Administrador do Sistema.');
        }


    }

    public function alterarImagem(Request $request, $imagem){
        if(Storage::exists($imagem)){
            $status = Storage::delete($imagem);
            if($status){
                return $request->file('imagem')->store('img');
            }
        }elseif($imagem == null){
            return $request->file('imagem')->store('img');
        }
    }

    public function deletar($id){
        DB::beginTransaction();
        try{
            $instrumento =  Instrumento::find($id);
            $imagem = $instrumento->imagem;
            $status = $instrumento->delete();
            if($status){
                DB::commit();
                Storage::exists($imagem)? Storage::delete($imagem) : null;
                return redirect()
                    ->back()
                    ->with('alerta-sucesso', 'O instrumento excluído com sucesso!');
            }else{
                throw new Exception('Erro ao atualizar dados.');
            }
        }catch (\Exception $e){
            DB::rollback();
            return redirect()
                ->back()
                ->withInput()
                ->with('alerta-perigo', 'Erro ao excluir o aluno ! Código '. $e. ' por favor, entre em contato com o Administrador do Sistema.');
        }
    }

    public function info($id){
        $instrumento = Instrumento::find($id);
        $readonly = true;
        return view('instrumento.cadastrar', compact('instrumento', 'readonly'));
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required',
            'imagem' => 'required',
            'descricao' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O nome do intrumento é obrigatório',
            'imagem.required' => 'Insira uma imagem para o instrumento',
            'descricao.required' => 'Insira a descrição detalhada do instrumento',
        ];
    }


}
