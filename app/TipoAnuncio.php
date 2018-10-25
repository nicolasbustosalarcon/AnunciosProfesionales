<?php

namespace AnunciosProfesionales;

use Illuminate\Database\Eloquent\Model;

class TipoAnuncio extends Model
{
    protected $table='tipo_anuncios';

    protected $primaryKey='idtipo_anuncios';

    public $timestamps=false;


    protected $fillable =[
    	'nombre_tipo',
    	'precio_anuncio',
    	'cantidad_dias',
    	'estado',
    ];

    protected $guarded =[

    ];
}
