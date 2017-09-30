<?php

namespace App\Http\Controllers;

use App\Http\Requests\CursoRequest;
use App\Model\Curso;
use App\Model\Instrumento;
use App\Model\Professor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CursoController extends Controller
{
    public function cadastrar(){
        $instrumentos = Instrumento::all();
        return view('curso.cadastrar', compact('instrumentos'));
    }

    public function salvar(CursoRequest $request){
        //Abre uma transação
        DB::beginTransaction();

        $curso = new Curso();
        $instrumento =  new Instrumento();

        $form =  $request->except('_token');

        $curso->nome = $form['nome'];
        $curso->valor = $form['valor'];

        // primeira maneira
        //$idInstrumento = $form['instrumento'];

        //segunda maneira
        $curso->id_instrumento = $form['instrumento'];

        try{
            //primeira maneira
            //$instrumento = Instrumento::find($idInstrumento);
            //$curso->instrumento()->associate($instrumento);

            $status = $curso->save();
            if($status){
                DB::commit();
                return redirect()
                    ->back()
                    ->with('alerta-sucesso', 'O Cadastro do curso foi efetuado com sucesso!');
            }else{
                throw new Exception('Erro ao inserir dados.');
            }
        }catch (\Exception $e){
            DB::rollback();
            return redirect()
                ->back()
                ->withInput()
                ->with('alerta-perigo', 'Erro ao efeturar cadastro! Código '. $e. ' por favor, entre em contato com o Administrador do Sistema.');
        }


    }

    public function atualizar(CursoRequest $request, $id){

        //Abre uma transação
        DB::beginTransaction();

        $curso = Curso::find($id);
        $instrumento =  new Instrumento();

        $form =  $request->except('_token');

        $curso->nome = $form['nome'];
        $curso->valor = $form['valor'];

        // primeira maneira
        //$idInstrumento = $form['instrumento'];

        //segunda maneira
        $curso->id_instrumento = $form['instrumento'];

        try{

            //primeira maneira
            //$instrumento = Instrumento::find($idInstrumento);
            //$curso->instrumento()->associate($instrumento);

            $status = $curso->update();

            if($status){
                DB::commit();
                return redirect()
                    ->back()
                    ->with('alerta-sucesso', 'O Curso foi atualizado com sucesso!');
            }else{
                throw new Exception('Erro ao atualizar dados.');
            }
        }

        catch (\Exception $e){
            DB::rollback();
            return redirect()
                ->back()
                ->withInput()
                ->with('alerta-perigo', 'Erro ao atualizar dados do curso ! Código '. $e. ' por favor, entre em contato com o Administrador do Sistema.');
        }

    }

    public function deletar($id){
        DB::beginTransaction();
        try{
            $curso =  Curso::find($id);
            $status = $curso->delete();
            if($status){
                DB::commit();
                return redirect()
                    ->back()
                    ->with('alerta-sucesso', 'O Curso excluído com sucesso!');
            }else{
                throw new Exception('Erro ao atualizar dados.');
            }
        }catch (\Exception $e){
            DB::rollback();
            return redirect()
                ->back()
                ->withInput()
                ->with('alerta-perigo', 'Erro ao excluir o curso ! Código '. $e. ' por favor, entre em contato com o Administrador do Sistema.');
        }
    }


    public function editar($id){
        $instrumentos = Instrumento::all();
        $curso = Curso::find($id);
        return view('curso.cadastrar', compact('curso', 'instrumentos'));
    }


    public function info($id){
        $instrumentos = Instrumento::all();
        $curso = Curso::find($id);
        $readonly = true;
        return view('curso.cadastrar', compact('curso', 'instrumentos', 'readonly'));
    }

    public function manterCadastros(){
        $cursos =  Curso::all();
        return view('curso.manter', compact('cursos'));
    }

    public function listarProfessores(Request $request, $idCurso){
        if($request->ajax()){


             $professores = DB::table('professor')
                 // Pega a tabela desejada do join
                ->select('professor.*')
                ->join('professor_curso', 'professor_curso.id_professor', '=', 'professor.id')
                ->join('curso', 'professor_curso.id_curso', '=', 'curso.id')
                ->where('curso.id', '=', $idCurso)
                ->get();

            return response()->json($professores);
        }

    }
}
