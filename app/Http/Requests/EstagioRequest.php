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
            'valorbolsa' => 'required',
            'tipobolsa' => 'required',
            'justificativa' => 'required',
            'dataini' => 'required',
            'datafin' => 'required',
            'cargahoras' => 'required',
            'cargaminutos' => 'required',            
            'horario' => 'required',  
            'auxtrans' => 'required',
            'especifiquevt' => 'required',
            'atividades' => 'required',
            'seguradora' => 'required', 
            'numseguro' => 'required'                                                               
        ];
    }
}
