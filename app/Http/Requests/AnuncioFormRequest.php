<?php

namespace AnunciosProfesionales\Http\Requests;

use AnunciosProfesionales\Http\Requests\Request;

class AnuncioFormRequest extends Request
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
            'titulo'=>'required|max:45',
            'idcategoria'=>'required',
            'descripcion'=>'required|max:100',
            'precio'=>'required|numeric',
            'redsocial1'=>'max:100',
            'redsocial2'=>'max:100',
            'imagen'=>'mimes:jpeg,bmp,png',
            'imagen2'=>'mimes:jpeg,bmp,png',
            'imagen3'=>'mimes:jpeg,bmp,png'

        ];
    }
}
