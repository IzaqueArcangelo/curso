<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InscricaoRequest extends FormRequest
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
            'diaSemana' => 'required',
            'curso' => 'required',
            'professor' => 'required',
            'aluno' => 'required',
            'horaInicio' => 'required',
            'horaTermino' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'diaSemana.required' => 'É necessário escolher um dia da semana para concluir o agendamento.',
            'curso.required' => 'Escolha um curso disponível.',
            'professor.required' => 'Escolha um professor disponível.',
            'aluno.required' => 'O aluno é obrigatório.',
            'horaInicio.required' => 'Escolha um horário para iniciar o curso.',
            'horaTermino.required' => 'Escolha o horário de termino do curso.',

        ];
    }
}
