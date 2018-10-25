<?php

namespace AnunciosProfesionales;

use Illuminate\Database\Eloquent\Model;

class Palabras extends Model
{
    protected $table='palabras_buscadas';

    protected $primaryKey='idpalabra';

    public $timestamps=false;

    protected $fillable =[
    	'palabra',
    	'cantidad'
    ];

    protected $guarded =[

    ];
}
