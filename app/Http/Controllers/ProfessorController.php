<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfessorRequest;
use App\Model\Curso;
use App\Model\Professor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfessorController extends Controller
{
    public function cadastrar(){
        $cursos = Curso::all();
        return view('professor.cadastrar', compact('cursos'));
    }

    public function manterCadastros(){
        $professores = Professor::all();
        return view('professor.manter', compact('professores'));
    }

    public function editarProfessor($id){
        $professor = Professor::find($id);
        $cursos = Curso::all();
        return view('professor.cadastrar', compact('professor','cursos'));
    }

    public function salvarProfessor(ProfessorRequest $request){
        //Abre uma transação
        DB::beginTransaction();

        $professor = new Professor();
        $curso = new Curso();
        $form = $request->except('_token');

        $professor->nome = $form['nome'];
        $professor->email = $form['email'];
        $professor->telefone = $form['telefone'];
        $professor->matricula = $form['matricula'];

        $cursos = $form['cursos'];

        //dd($cursos);


        try{
            $status = $professor->save();

            if($cursos!=null){
                $professor->cursos()->sync($cursos);
            }


            if($status){
                DB::commit();
                return redirect()
                    ->back()
                    ->with('alerta-sucesso', 'O Cadastro do usuário foi efetuado com sucesso!');
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

    public function atualizar(ProfessorRequest $request, $id){
        //Abre uma transação
        DB::beginTransaction();

        $professor = Professor::find($id);
        $curso = new Curso();
        $form = $request->except('_token');

        $professor->nome = $form['nome'];
        $professor->email = $form['email'];
        $professor->telefone = $form['telefone'];
        $professor->matricula = $form['matricula'];

        $cursos = $form['cursos'];


        try{
            $status = $professor->update();

            if($cursos!=null){
                $professor->cursos()->sync($cursos);
            }


            if($status){
                DB::commit();
                return redirect()
                    ->back()
                    ->with('alerta-sucesso', 'O Cadastro do professor foi atualizado com sucesso!');
            }else{
                throw new Exception('Erro ao inserir dados.');
            }

        }catch (\Exception $e){
            DB::rollback();
            return redirect()
                ->back()
                ->withInput()
                ->with('alerta-perigo', 'Erro ao atualizar cadastro! Código '. $e. ' por favor, entre em contato com o Administrador do Sistema.');
        }
    }
}
