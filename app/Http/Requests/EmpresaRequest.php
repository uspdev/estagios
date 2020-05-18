<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaRequest extends FormRequest
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
                    'nome' => 'required',
                    'razao_social' => 'required',
                    'cnpj' => [
                        'required',
                        'cnpj',
                    ],
                    'area_de_atuacao' => 'required',
                    'endereco' => 'required',
                    'cep' => 'required|formato_cep',
                    'nome_de_contato' => 'required',
                    'email' => 'required|email',
                    'telefone_de_contato' => 'required|telefone_com_ddd',
                    'nome_do_representante' => 'required',
                    'cargo_do_representante' => 'required',
                    'nome_do_supervisor_estagio' => 'required',
                    'cargo_do_supervisor_estagio' => 'required',
                    'telefone_do_supervisor_estagio' => 'required|telefone_com_ddd',
                    'email_do_supervisor_estagio' => 'required|email'
                ];
        if ($this->method() == 'PATCH' || $this->method() == 'PUT'){
            array_push($rules['cnpj'], 'unique:empresas,cnpj,'.$this->empresa->id);
        }
        else{
            array_push($rules['cnpj'], 'unique:empresas');
        }
        return $rules;
    }

    public function validationData()
    {
        $data = $this->all();
        $data['cnpj'] = preg_replace('/[^0-9]/', '', $data['cnpj']);
        return $data;
    }
}
