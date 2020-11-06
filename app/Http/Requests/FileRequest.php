<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FileRequest extends FormRequest
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
            'file' => 'required|file|max:12000|mimes:pdf',
            'original_name' => 'required',
            'estagio_id' => 'required|integer|exists:estagios,id'
        ];
    }

    public function messages()
    {
        return [
            'file.required' => 'Não há nenhum arquivo anexado',
            'file.file' => 'O envio deve ser de arquivos apenas',
            'file.mimes' => 'O sistema apenas aceita arquivos no formato PDF',
            'file.max' => 'O peso máximo aceito por arquivo é de 12 MB',
            'original_name.required' => 'O arquvo enviado deve possuir um nome para ser armazenado no sistema',
        ];
    }
}
