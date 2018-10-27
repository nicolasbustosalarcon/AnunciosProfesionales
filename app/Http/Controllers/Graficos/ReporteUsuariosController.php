<?php

namespace AnunciosProfesionales\Http\Controllers\Graficos;

use Illuminate\Http\Request;
use AnunciosProfesionales\Http\Controllers\Controller;
use AnunciosProfesionales\Http\Requests;
use AnunciosProfesionales\Http\Requests\AnuncioFormRequest;
use AnunciosProfesionales\Anuncio;
use DB;

use PDF;

class ReporteUsuariosController extends Controller
{
    public function store (Request $request)
    {
        $fechainicio=$request->get('fecha_inicio');
        $fechafin=$request->get('fecha_fin');

        $usuarios=DB::table('users')
        ->where('users.tipo_usuario','=','0')
        ->get();
        $regiones = array(array('region','cantidad'));//Se inicia el arreglo que contendra las regiones y su cantidad respectiva ded anuncios


        for ($i=0; $i < 100; $i++) { //se inicia el arreglo con datos nulos
            $regiones[$i]['region']= 'region no definida';
        }

        for ($i=0; $i < 100; $i++) {
            $regiones[$i]['cantidad']= 0;
        }

        $contador = 0;
        foreach ($usuarios as $us) {//Se recorren todos los usuarios
            $encontrado = 0;//Variable para definir si se encuentra la region
            for ($i=0; $i < 100; $i++) {
                if (strcmp($us->direccion_region,$regiones[$i]['region']) == 0) {
                    $regiones[$i]['cantidad'] = $regiones[$i]['cantidad'] + 1;//Si se encuentra sismilitud entre la region del usuario y una región que ya existe en el arreglo, se suma al arreglo correspondiente
                    $encontrado = 1;
                }
            }
            if ($encontrado == 0) {
                $regiones[$contador]['region']=$us->direccion_region;//Si ni se ha encontrado la region, se inserta en en areglo
                $regiones[$contador]['cantidad'] = 1;
                $contador = $contador + 1;
            }        
    }
        return view("almacen.graficos.informeusuarios",['regiones' => $regiones]);
        
    }
}