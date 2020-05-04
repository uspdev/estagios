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
            'nome_rep' => 'required',
            'cargo_rep' => 'required',
            'email_rep' => 'required:email',
            'rg_rep' => 'required',
            'cpf_rep' => 'required',
            'nome_rep2' => '',
            'cargo_rep2' => '',
            'email_rep2' => '',
            'rg_rep2' => '',
            'cpf_rep2' => '',
            'desc' => 'required',
            'ativ' => 'required',
            'nome_cont' => 'required',
            'tel_cont' => 'required:integer:telefone_com_ddd',
            'email_cont' => 'required:email',

        ];
    }
}
