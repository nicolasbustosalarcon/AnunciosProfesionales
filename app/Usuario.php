<?php

namespace AnunciosProfesionales;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table='usuario';

    protected $primaryKey='idusuario';

    public $timestamps=false;


    protected $fillable =[
    	'rut',
    	'nombre',
    	'apellido',
    	'pass',
    	'direccion_region',
    	'direccion_comuna',
    	'direccion_calle',
    	'telefono',
    	'correo',
    	'edad',
    	'tipo_usuario'
    ];

    protected $guarded =[

    ];

}
