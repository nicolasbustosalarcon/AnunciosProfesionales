<?php

namespace AnunciosProfesionales;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table='region';

    protected $primaryKey='idregion';

    public $timestamps=false;


    protected $fillable =[
    	'nombre_region',
    	'estado',
    ];

    protected $guarded =[

    ];
}
