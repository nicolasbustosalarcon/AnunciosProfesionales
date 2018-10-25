<?php

namespace AnunciosProfesionales;

use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    
    protected $table='anuncio';

    protected $primaryKey='idanuncio';

    public $timestamps=false;


    protected $fillable =[
    	'titulo',
    	'region',
    	'idcategoria',
    	'descripcion',
    	'estado',
    	'idusuario',
    	'imagen',
    	'precio',
    	'tipo_anuncio',
        'comentario_secretaria',
        'id_secretaria',
        'fecha_publicacion',
        'fecha_caducidad',
        'redsocial1',
        'redsocial2'
    ];

    protected $guarded =[

    ];


}
