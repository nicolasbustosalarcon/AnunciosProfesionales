<?php

namespace AnunciosProfesionales\Http\Requests;

use AnunciosProfesionales\Http\Requests\Request;

class CensuraFormRequest extends Request
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
            'palabra_censurada'=>'required|max:100'
        ];
    }
}
