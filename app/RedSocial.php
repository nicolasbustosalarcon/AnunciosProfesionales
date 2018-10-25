<?php

namespace AnunciosProfesionales;

use Illuminate\Database\Eloquent\Model;

class RedSocial extends Model
{
    protected $table='red_social';

    protected $primaryKey='idred_social';

    public $timestamps=false;


    protected $fillable =[
    	'nombre_red',
    	'estado',
    ];

    protected $guarded =[

    ];
}
