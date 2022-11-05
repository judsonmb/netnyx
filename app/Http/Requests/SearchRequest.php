<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
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
            'movie' => 'required|max:255'
        ];
    }

    public function messages()
    {
        return [
            'movie.required' => 'Este campo é obrigatório',
            'movie.max' => 'O campo de busca de filme ou série não pode ser superior a 255 caracteres.'
        ];
    }
}
