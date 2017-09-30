<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CursoRequest extends FormRequest
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

    public function rules()
    {
        return [
            'nome' => 'required',
            'valor' => 'required',
            'instrumento' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O nome do curso é obrigatório.',
            'valor.required' => 'O valor do curso é obrigatório.',
            'instrumento.required' => 'Escola o instrumento utilizado para o curso.',
        ];
    }
}
