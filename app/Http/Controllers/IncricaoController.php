<?php

namespace App\Http\Controllers;

use App\Http\Requests\InscricaoRequest;
use App\Model\Agenda;
use App\Model\Aluno;
use App\Model\Curso;
use App\Model\Dia;
use App\Model\Inscricao;
use App\Model\Professor;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IncricaoController extends Controller
{
    public function agenda(){
        $dias = Dia::all();
        $inscricoes = Inscricao::all();
         return view('agenda.agenda', compact('dias', 'inscricoes'));
    }

    public function agendar($id){
        $dia = Dia::find($id);
        $cursos = Curso::all();
        $alunos = Aluno::all();
        return view('agenda.agendar', compact('cursos', 'alunos', 'dia'));
    }

    public function editarAgendamento($id){
        $cursos = Curso::all();
        $alunos = Aluno::all();
        $dias = Dia::all();
        $inscricao = Inscricao::find($id);

        return view('agenda.agendar', compact('cursos', 'alunos', 'dias', 'inscricao'));
    }


    public function atualizar(InscricaoRequest $request, $id){
        $form =  $request->except('_token');
        //Abre uma transação
        DB::beginTransaction();
        try{
            //pega a inscrição
            $inscricao = Inscricao::find($id);

            $curso = Curso::find($form['curso']);
            $aluno = Aluno::find($form['aluno']);
            $professor = Professor::find($form['professor']);
            $diaSemana = Dia::find($form['diaSemana']);
            $inscricao->horaInicio = $form['horaInicio'];
            $inscricao->horaTermino = $form['horaTermino'];

            //faz as associações
            $inscricao->curso()->associate($curso);
            $inscricao->aluno()->associate($aluno);
            $inscricao->dia()->associate($diaSemana);
            $inscricao->professor()->associate($professor);

            //atualiza a inscricao
            $status = $inscricao->update();

            $inscricoes = Inscricao::where([
                ['id_aluno','=',$aluno->id]
            ])->get();

            //seta o valor da mensalidade como zero.
            $aluno->mensalidade->valor = 0;
            $aluno->mensalidade->update();

            foreach ($inscricoes as $insc){
                $aluno->mensalidade->valor = $aluno->mensalidade->valor + $insc->curso->valor;
            }

            $aluno->mensalidade->update();

            //TODO: calcular a mensalidade do aluno e atualizar seu valor.

            if($status){
                DB::commit();
                return redirect()
                    ->back()
                    ->with('alerta-sucesso', 'O agendamento do aluno foi atualizado com sucesso!');
            }else{
                throw new \Exception('Erro ao inserir dados.');
            }

        }catch (\Exception $e){
            DB::rollback();
            return redirect()
                ->back()
                ->withInput()
                ->with('alerta-perigo', 'Erro ao atualizar agendamento! Código '. $e. ' por favor, entre em contato com o Administrador do Sistema.');
        }

    }

    public function deletar($id){
        DB::beginTransaction();
        try{

            $inscricao =  Inscricao::find($id);

            $inscricao->aluno->mensalidade->valor = $inscricao->aluno->mensalidade->valor - $inscricao->curso->valor;

            //TODO: atualizar mensalidade do aluno.
            $inscricao->aluno->mensalidade->update();

            $status = $inscricao->delete();

            if($status){
                DB::commit();
                return redirect()
                    ->back()
                    ->with('alerta-sucesso', 'O agendamento foi excluído com sucesso!');
            }else{
                throw new Exception('Erro ao atualizar dados.');
            }
        }catch (\Exception $e){
            DB::rollback();
            return redirect()
                ->back()
                ->withInput()
                ->with('alerta-perigo', 'Erro ao excluir o agendamento do aluno ! Código '. $e. ' por favor, entre em contato com o Administrador do Sistema.');
        }
    }

    public function salvarAgendamento(InscricaoRequest $request){
        //Abre uma transação
        DB::beginTransaction();

        $inscricao = new Inscricao();

        $form = $request->except('_token');

        $hInicio = $form['horaInicio'];
        $hTermino = $form['horaTermino'];

        $curso = Curso::find($form['curso']);
        $aluno = Aluno::find($form['aluno']);
        $professor = Professor::find($form['professor']);
        $diaSemana = Dia::find($form['diaSemana']);

        try{
            //salva na tabela inscrição (tabela associativa)
            $aluno->cursos()->attach(
                $curso,
                ['dataInscricao'=>new \DateTime(),
                    'horaInicio'=> $hInicio,
                    'horaTermino' => $hTermino,
                    'id_dia' => $diaSemana->id,
                    'id_professor' => $professor->id
                ]
            );

            // add o valor da mensalidade.
            $aluno->mensalidade->valor = $aluno->mensalidade->valor + $curso->valor;

            $aluno->mensalidade->update();

            //TODO: calcular a mensalidade do aluno e atualizar seu valor.
            DB::commit();
                return redirect()
                    ->back()
                    ->with('alerta-sucesso', 'O agendamento do aluno foi efetuado com sucesso!');

        }catch (\Exception $e){
            DB::rollback();
            return redirect()
                ->back()
                ->withInput()
                ->with('alerta-perigo', 'Erro ao efeturar agendamento! Código '. $e. ' por favor, entre em contato com o Administrador do Sistema.');
        }
    }
}
