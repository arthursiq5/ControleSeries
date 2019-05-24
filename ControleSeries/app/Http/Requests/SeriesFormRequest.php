<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // todo e qualquer usuario pode fazer essa requisicao
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required|min:2'
        ];
    }

    public function messages(){ // mensages que serao exibidas em caso de erro
      return [
        // sintaxe: 'chave.caso' => 'mensagem'
        // sintaxe(2): 'caso generico' => 'mensagem'
        'required' => 'O campo :attribute e obrigatorio', // ':attribute' sera substituido pela chave do erro em questao
        'nome.min' => 'O campo nome precisa ter ao menos 2 caracteres'
      ];
    }
}
