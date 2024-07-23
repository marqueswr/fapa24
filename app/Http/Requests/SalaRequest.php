<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalaRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'celula'=> 'required',
            'serie'=> 'required',
            'turma'=> 'required',
            'turno' => 'required',
            'ano' => 'required'
        ];
    }

    public function messages(): array
    {
        return[
            'celula.required' => '<b>CÉLULA</b> é obrigatoria',
            'serie.required' => '<b>SÉRIE</b> é obrigatoria',
            'turma.required' => '<b>TURMA</b> é obrigatoria',
            'turno.required' => '<b>TURNO</b> é obritorio',
            'ano.required' => '<b>ANO</b> é obrigatório'
        ];
    }
}
