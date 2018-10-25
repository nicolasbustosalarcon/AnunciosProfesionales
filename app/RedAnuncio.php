<?php

namespace AnunciosProfesionales;

use Illuminate\Database\Eloquent\Model;

class RedAnuncio extends Model
{
    protected $table='anuncio_redsocial';

    protected $primaryKey='id_anuncio_red';

    public $timestamps=false;

    protected $fillable =[
    	'id_anuncio',
    	'id_redsocial',
    	'red_social'
    ];

    protected $guarded =[

    ];
}
