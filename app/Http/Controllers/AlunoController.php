<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlunoRequest;
use App\Model\Aluno;
use App\Model\Endereco;
use App\Model\Mensalidade;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class AlunoController extends Controller
{
    public function cadastrar()
    {
        return view('aluno.cadastrar');
    }

    public function salvarAluno(AlunoRequest $request)
    {
        //Abre uma transação
        DB::beginTransaction();

        $aluno = new Aluno();
        $endereco = new Endereco();
        $mensalidade = new Mensalidade();
        $form = $request->except('_token');

        $aluno->nome = $form['nome'];
        $aluno->email = $form['email'];
        $aluno->telefone = $form['telefone'];
        // TODO utilizado por conta do problema de formatação da data pt-BR
        $aluno->dataNascimento = Carbon::createFromFormat('d/m/Y', $form['dtNascimento']);

        $aluno->cpf = $form['cpf'];

        $endereco->rua = $form['rua'];
        $endereco->numero = $form['numero'];
        $endereco->complemento = $form['complemento'];
        $endereco->cep = $form['cep'];
        $endereco->bairro = $form['bairro'];
        $endereco->municipio = $form['municipio'];
        $endereco->UF = $form['UF'];

        $mensalidade->diaVencimento = $form['diaVencimento'];

        try{
            $endereco->save();
            $mensalidade->save();

            $aluno->endereco()->associate($endereco);
            $aluno->mensalidade()->associate($mensalidade);

            $status = $aluno->save();

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

    public function manterCadastros()
    {
        $alunos = Aluno::all();
        return view('aluno.manter', compact('alunos'));
    }

    public function editarAluno($id){
        $aluno = Aluno::find($id);
        $aluno->dataNascimento = \Carbon\Carbon::parse($aluno->dataNascimento)->format('d/m/Y');
        return view('aluno.cadastrar', compact('aluno'));
    }

    public function atualizar(Request $request, $id){
        //Abre uma transação
        DB::beginTransaction();

        $aluno =  Aluno::find($id);
        $endereco = $aluno->endereco;
        $mensalidade = $aluno->mensalidade;

        $form = $request->except('_token');

        $aluno->nome = $form['nome'];
        $aluno->email = $form['email'];
        $aluno->telefone = $form['telefone'];
        // TODO utilizado por conta do problema de formatação da data pt-BR
        $aluno->dataNascimento = Carbon::createFromFormat('d/m/Y', $form['dtNascimento']);

        $aluno->cpf = $form['cpf'];

        $endereco->rua = $form['rua'];
        $endereco->numero = $form['numero'];
        $endereco->complemento = $form['complemento'];
        $endereco->cep = $form['cep'];
        $endereco->bairro = $form['bairro'];
        $endereco->municipio = $form['municipio'];
        $endereco->UF = $form['UF'];

        $mensalidade->diaVencimento = $form['diaVencimento'];

        $validacao = validator($form,$this->rules($id), $this->messages());

        // Se houver erro na validação do formulário
        if ($validacao->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validacao);
        }

        try{
            $mensalidade->update();
            $endereco->update();
            $status = $aluno->update();
            if($status){
                DB::commit();
                return redirect()
                    ->back()
                    ->with('alerta-sucesso', 'O Cadastro do aluno foi atualizado com sucesso!');
            }else{
                throw new Exception('Erro ao atualizar dados.');
            }
        }
        catch (\Exception $e){
            DB::rollback();
            return redirect()
                ->back()
                ->withInput()
                ->with('alerta-perigo', 'Erro ao atualizar dados do aluno ! Código '. $e. ' por favor, entre em contato com o Administrador do Sistema.');
        }

    }

    public function info($id){
        $aluno =  Aluno::find($id);
        $aluno->dataNascimento = \Carbon\Carbon::parse($aluno->dataNascimento)->format('d/m/Y');
        $readonly = true;
        return view('aluno.cadastrar', compact('aluno', 'readonly'));
    }

    public function deletar($id){
        try{
            $aluno =  Aluno::find($id);
            $status = $aluno->delete();
            if($status){
                DB::commit();
                return redirect()
                    ->back()
                    ->with('alerta-sucesso', 'O Cadastro do aluno foi excluído com sucesso!');
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules($id)
    {
        return [
            'nome' => 'required',
            'email' => 'required|email',
            'telefone' => 'required',
            'dtNascimento' => 'required',
            'cpf' => 'required|cpf|unique:aluno,cpf,'.$id,
            'rua' => 'required',
            'numero' => 'required',
            'complemento' => 'required',
            'cep' => 'required',
            'bairro' => 'required',
            'municipio' => 'required',
            'UF' => 'required',
            'diaVencimento' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O nome do aluno é obrigatório.',
            'email.required' => 'O email é obrigatório.',
            'email.email' => 'Formato do email inválido.',
            'telefone.required' => 'O telefone é obrigatório.',
            'dtNascimento.required' => 'Data de nascimento é obrigatória.',
            'cpf.required' => 'O campo é cpf obrigatório.',
            'cpf.cpf' => 'O cpf digitado não é um cpf válido.',
            'cpf.unique' => 'O cpf já cadastrado.',
            'rua.required' => 'Informe o nome da rua.',
            'numero.required' => 'Informe o número do seu endereço.',
            'complemento.required' => 'complemento obrigatório.',
            'cep.required' => 'Informe o cep da rua.',
            'bairro.required' => 'Nome do bairro obrigatório.',
            'municipio.required' => 'Municipio obrigatório.',
            'UF.required' => 'Informe a sigla do Estado corretamente.',
            'diaVencimento.required' => 'Escola um  dia para o vencimento das mensalidade.'
        ];
    }


}
