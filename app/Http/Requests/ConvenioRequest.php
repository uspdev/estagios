<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConvenioRequest extends FormRequest
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
            'nome_representante' => 'required',
            'cargo_representante' => 'required',
            'email_representante' => 'required|email',
            'rg_representante' => 'required',
            'cpf_representante' => 'required',
            'nome_representante2' => '',
            'cargo_representante2' => '',
            'email_representante2' => '',
            'rg_representante2' => '',
            'cpf_representante2' => '',
            'descricao' => 'required',
            'atividade' => 'required',
            'nome_contato' => 'required',
            'tel_contato' => 'required|numeric|min:10',
            'email_contato' => 'required|email',
            'cnpj' => 'required|exists:empresas,cnpj',
        ];       
    }

    public function messages()
    {
        return [
            'cnpj.exists' => 'Atualize os dados da empresa',
        ];
    }
}
