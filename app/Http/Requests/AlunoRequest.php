<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlunoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
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
            'email' => 'required|email',
            'telefone' => 'required',
            'dtNascimento' => 'required',
            'cpf' => 'required|cpf|unique:aluno,cpf',
            //'cpf' => 'required|cpf|unique:aluno,cpf',
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
