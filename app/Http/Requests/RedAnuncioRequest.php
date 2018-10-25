<?php

namespace AnunciosProfesionales\Http\Requests;

use AnunciosProfesionales\Http\Requests\Request;

class RedAnuncioRequest extends Request
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
            'id_anuncio,id_redsocial'=>'unique:anuncio_redsocial,id_anuncio,id_redsocial'
        ];
    }
}
