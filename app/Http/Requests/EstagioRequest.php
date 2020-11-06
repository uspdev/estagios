<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstagioRequest extends FormRequest
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
            'numero_usp' => 'required|numeric|codpes|graduacao',
            'valorbolsa' => 'required',
            'tipobolsa' => 'required',
            'duracao' => 'required',
            'data_inicial' => 'required|data',
            'data_final' => 'required|data',
            'cargahoras' => 'required',
            'cargaminutos' => 'required',
            'horario' => 'required',
            'auxiliotransporte' => 'required',
            'especifiquevt' => 'required',
            'seguradora' => 'required',
            'numseguro' => 'required',

            //campos opcionais
            'controlehorario' => 'nullable',
            'supervisao' => 'nullable',
            'interacao' => 'nullable',
            'enderecoedias' => 'nullable',
            'justificativa' => 'nullable',
            'atividades' => 'nullable',

            //pandemia
            'pandemiahomeoffice' => 'required',
            'pandemiamedidas' => 'required_if:pandemiahomeoffice,==,Não',

            //empresa
            'cnpj' => 'required|exists:empresas,cnpj',
            'nome_de_contato' => 'required',
            'email_de_contato' => 'required|email',
            'telefone_de_contato' => 'required|numeric|min:10',
            'nome_do_supervisor_estagio' => 'required',
            'cargo_do_supervisor_estagio' => 'required',
            'telefone_do_supervisor_estagio' => 'required|numeric|min:10',
            'email_do_supervisor_estagio' => 'required|email',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'cnpj' => auth()->user()->cnpj
        ]);
    }

    public function messages()
    {
        return [
            'cnpj.exists' => 'Atualize o cadastro da empresa antes de executar essa ação',
        ];
    }
}
