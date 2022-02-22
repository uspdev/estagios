<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EdicaoRequest extends FormRequest
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
            'nomcur' => 'nullable',
            'horariocompativel' => 'required|max:255',
            'valorbolsa' => 'required|max:255',
            'tipobolsa' => 'required|max:255',
            'data_inicial' => 'required|date_format:"d/m/Y"',
            'data_final' => 'required|date_format:"d/m/Y"|after:data_inicial',
            'cargahoras' => 'required|max:255',
            'cargaminutos' => 'required|max:255',
            'horario' => 'required',
            'auxiliotransporte' => 'required|max:255',
            'especifiquevt' => 'required|max:255',
            'seguradora' => 'required|max:255',
            'numseguro' => 'required|max:255',

            'controlehorario' => 'nullable',
            'supervisao' => 'nullable',
            'interacao' => 'nullable',
            'enderecoedias' => 'nullable',
            'justificativa' => 'nullable',
            'atividades' => 'nullable',
            'nome_do_representante_opcional' => 'nullable',
            'cargo_do_representante_opcional' => 'nullable',
            'email_do_representante_opcional' => 'nullable',    

            'pandemiahomeoffice' => 'required|max:255',
            'pandemiamedidas' => 'required_if:pandemiahomeoffice,==,Não',
            'nome_de_contato' => 'required|max:255',
            'email_de_contato' => 'required|email|max:255',
            'telefone_de_contato' => 'required|max:255',
            'nome_do_supervisor_estagio' => 'required|max:255',
            'cargo_do_supervisor_estagio' => 'required|max:255',
            'telefone_do_supervisor_estagio' => 'required|max:255',
            'email_do_supervisor_estagio' => 'required|email|max:255',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'data_final.after' => 'A data final não pode ser anterior à data incial',
        ];
    }

}


