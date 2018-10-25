<?php

namespace AnunciosProfesionales;

use Illuminate\Database\Eloquent\Model;

class TablaLike extends Model
{
    protected $table='tabla_like';

    protected $primaryKey='idlike';

    public $timestamps=false;


    protected $fillable =[
    	'id_anuncio',
    	'id_usuario',
    	'estado',
    ];

    protected $guarded =[

    ];
}
