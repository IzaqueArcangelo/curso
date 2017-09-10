<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstrumentoRequest extends FormRequest
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
