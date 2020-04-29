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
            'numero_usp' => 'required|integer',            
            'valorbolsa' => 'required|integer',
            'tipobolsa' => 'required',
            'justificativa' => 'required',
            'data_inicial' => 'required|data',
            'data_final' => 'required|data',
            'cargahoras' => 'required|integer',
            'cargaminutos' => 'required|integer',            
            'horario' => 'required',  
            'auxiliotransporte' => 'required',
            'especifiquevt' => 'required',
            'cnpj' => 'required|cnpj',            
            'atividades' => 'required',
            'seguradora' => 'required', 
            'numseguro' => 'required|integer'                                                               
        ];
    }
}
