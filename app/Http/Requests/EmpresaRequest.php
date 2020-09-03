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
                        'cnpj'
                    ],
                    'email' => 'required|email',
                    'area_de_atuacao' => 'required',
                    'endereco' => 'required',
                    'cep' => 'required|formato_cep',
                    'nome_de_contato' => 'required',
                    'telefone_de_contato' => 'required|numeric|min:10',
                    'nome_do_representante' => 'required',
                    'cargo_do_representante' => 'required',
                    'nome_do_supervisor_estagio' => 'required',
                    'cargo_do_supervisor_estagio' => 'required',
                    'telefone_do_supervisor_estagio' => 'required|numeric|min:10',
                    'email_do_supervisor_estagio' => 'required|email',
                    'email_de_contato' => 'required|email'
                ];

        /* Email e Cnpj devem ser únicos, porém isso não está ocorrendo */
        /*
        dd($this->empresa->email);
        if ($this->method() == 'PATCH' || $this->method() == 'PUT'){
            #array_push($rules['cnpj'], 'unique:empresas,cnpj,'.$this->empresa->id);
            $rules['email'] =  'required|email|unique:empresas,email,'.$this->empresa->email;
        }
        else{
            array_push($rules['cnpj'], 'unique:empresas');
        }
        */
        return $rules;
    }
}
