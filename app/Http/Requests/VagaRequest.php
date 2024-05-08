<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VagaRequest extends FormRequest
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
        $rules = [
            'titulo' => 'required',
            'contato' => 'required',
            'descricao' => 'required',
            'expediente' => 'required',
            'salario' => 'required',
            'horario' => 'required',
            'beneficios' => 'required',
            'divulgar_ate' => 'required|date_format:d/m/Y',
            'status' => '',
            'justificativa' => 'nullable',
            'email' => 'required|email|max:255'
        ];
        return $rules;
    }
}
