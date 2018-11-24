<?php

namespace AnunciosProfesionales;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    protected $table='mensaje';

    protected $primaryKey='idmensaje';

    public $timestamps=false;


    protected $fillable =[
    	'id_anuncio',
    	'id_usuario_envia',
    	'id_usuario_recibe',
    	'mensaje'
    ];

    protected $guarded =[

    ];
}
