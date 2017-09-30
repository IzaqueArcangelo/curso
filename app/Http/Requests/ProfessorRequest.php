<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfessorRequest extends FormRequest
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
            'matricula' => 'required',
            'cursos' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O nome do aluno é obrigatório.',
            'email.required' => 'O email é obrigatório.',
            'telefone.required' => 'O telefone é obrigatório.',
            'matricula.required' => 'A matricula é obrigatória.',
            'cursos.required' => 'Selecione ao menos um curso.',

        ];
    }
}
