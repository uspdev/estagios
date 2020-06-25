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
            'justificativa' => 'required',
            'duracao' => 'required', 
            //
            'atividadespertinentes' => 'required',
            'mediaponderada' => 'required',
            'horariocompativel' => 'required', 
            'desempenhoacademico' => 'required',
            //          
            'data_inicial' => 'required|data',
            'data_final' => 'required|data',
            'cargahoras' => 'required',
            'cargaminutos' => 'required',            
            'horario' => 'required',  
            'auxiliotransporte' => 'required',
            'especifiquevt' => 'required',
            'cnpj' => '',            
            'atividades' => 'required',
            'seguradora' => 'required', 
            'numseguro' => 'required',
            'controlehorario' => 'nullable',  
            'supervisao' => 'nullable',  
            'interacao' => 'nullable',  
            'enderecoedias' => 'nullable'                                                                                                   
        ];
    }
}
