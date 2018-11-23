<?php

namespace AnunciosProfesionales\Http\Requests;

use AnunciosProfesionales\Http\Requests\Request;

class MensajeFormRequest extends Request
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
            'id_anuncio'=>'required',
            'id_usuario_envia'=>'required',
            'id_usuario_recibe'=>'required',
            'mensaje'=>'required|max:1000'
        ];
    }
}
