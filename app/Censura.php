<?php

namespace AnunciosProfesionales;

use Illuminate\Database\Eloquent\Model;

class Censura extends Model
{
    protected $table='censura';

    protected $primaryKey='idpalabra';

    public $timestamps=false;

    protected $fillable =[
    	'palabra_censurada',
    	'estado'
    ];

    protected $guarded =[

    ];
}
