<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlunoRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'codigo'=> 'required',
            'primeiroNome'=> 'required',
            'sobrenome'=> 'required',
            'nascimento' => 'date'
        ];
    }

    public function messages(): array
    {
        return[
            'codigo.required' => '<b>CÓDIGO</b> é obrigatorio',
            'primeiroNome.required' => '<b>NOME</b> é obrigatorio',
            'sobrenome.required' => '<b>SOBRENOME</b> é obrigatorio',
            'nascimento.date' => '<b>DATA</b> inválida'
        ];
    }
}
