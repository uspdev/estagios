<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnaliseAcademicaRequest extends FormRequest
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
            'area_estagio' => 'required',
            'atividadespertinentes' => 'required',
            'desempenhoacademico' => 'required',
            'horariocompativel' => 'required|max:255',
            'atividadesjustificativa'=> 'required',
            'analise_academica'=> 'required',
            'tipodeferimento'=> 'required',
            'condicaodeferimento'=> 'required_if:tipodeferimento,==,Deferido com Restrição'
        ];

        if ($this->get('area_estagio')) {
            if (in_array('Outra', $this->get('area_estagio'))){
                $rules += ['outra_area' => 'required'];
            }
        }

        return $rules;
    }
}
