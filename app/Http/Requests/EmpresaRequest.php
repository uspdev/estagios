<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'cnpj' => [
                'required',
                'cnpj'
            ],
            'email' => 'required|email',
            'area_de_atuacao' => 'required',
            'endereco' => 'required',
            'cep' => 'required|formato_cep',
            'nome_do_representante' => 'required',
            'cargo_do_representante' => 'required',
            'conceder_acesso_cnpj' => '',
            'password' => 'nullable|confirmed|min:10',
            'password_confirmation' => 'nullable',
        ];

        if ($this->method() == 'PATCH' || $this->method() == 'PUT'){
            array_push($rules['cnpj'], 'unique:empresas,cnpj,' .$this->empresa->id);
        }
        else{
            array_push($rules['cnpj'], 'unique:empresas');
        }
        return $rules;
    }

    /* Remover caracters antes da validação do CNPJ */
    protected function prepareForValidation()
    {
        $this->merge([
            'cnpj' => preg_replace('/[^0-9]/', '', $this->cnpj),
        ]);
    }

    public function messages()
    {
        return [
            'cnpj.unique' => 'Este CNPJ já está cadastrado',
        ];
    }
}
