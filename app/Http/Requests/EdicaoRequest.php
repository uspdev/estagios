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
            'horariocompativel' => 'nullable',
            'valorbolsa' => 'nullable|max:255',
            'tipobolsa' => 'nullable|max:255',
            'data_inicial' => 'nullable|data',
            'data_final' => 'nullable|data',
            'cargahoras' => 'nullable|max:255',
            'cargaminutos' => 'nullable|max:255',
            'horario' => 'nullable',
            'auxiliotransporte' => 'nullable|max:255',
            'especifiquevt' => 'nullable|max:255',
            'seguradora' => 'nullable|max:255',
            'numseguro' => 'nullable|max:255',
            'controlehorario' => 'nullable',
            'supervisao' => 'nullable',
            'interacao' => 'nullable',
            'enderecoedias' => 'nullable',
            'justificativa' => 'nullable',
            'atividades' => 'nullable',
            'nome_do_representante_opcional' => 'nullable',
            'cargo_do_representante_opcional' => 'nullable',
            'email_do_representante_opcional' => 'nullable',            
            'pandemiahomeoffice' => 'nullable|max:255',
            'pandemiamedidas' => 'nullable|max:255',
            'nome_de_contato' => 'nullable|max:255',
            'email_de_contato' => 'nullable|email|max:255',
            'telefone_de_contato' => 'nullable|max:255',
            'nome_do_supervisor_estagio' => 'nullable|max:255',
            'cargo_do_supervisor_estagio' => 'nullable|max:255',
            'telefone_do_supervisor_estagio' => 'nullable|max:255',
            'email_do_supervisor_estagio' => 'nullable|email|max:255',
        ];

        return $rules;
    }

}
