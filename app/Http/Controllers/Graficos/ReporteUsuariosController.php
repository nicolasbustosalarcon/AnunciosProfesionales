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

        $region_tabla=DB::table('region')
        ->select('region.idregion','region.nombre_region')
        ->where('region.estado','=','1')
        ->get();

        $anuncio=DB::table('anuncio as a')
        ->join('categoria as c','a.idcategoria','=','c.idcategoria')
        ->join('tipo_anuncios as ta','a.tipo_anuncio','=','ta.idtipo_anuncios')
        ->join('users as u','a.idusuario','=','u.id')
        ->select('a.idanuncio','a.titulo','a.region','a.estado','c.nombre as categoria','a.idusuario','a.descripcion','a.imagen','a.precio','ta.nombre_tipo as tipo_anuncio')
        ->where('a.fecha_publicacion', '>', $fechainicio)
        ->where('a.fecha_publicacion','<',$fechafin)
        ->orwhere('a.fecha_publicacion','=',$fechainicio)
        ->orwhere('a.fecha_publicacion','=',$fechafin)
        ->get();

        $regiones = array(array('region','cantidad'));//Se inicia el arreglo que contendra las regiones y su cantidad respectiva ded anuncios

        for ($i=0; $i < 100; $i++) { //se inicia el arreglo con datos nulos
            $regiones[$i]['region']= 'region no definida';
        }

        for ($i=0; $i < 100; $i++) { 
            $regiones[$i]['cantidad']= '0';//La cantidad se inicia el 0 para todas las regiones
            foreach($region_tabla as $reg){
                if ($reg->idregion==$i) {//Se ingresa el nombre de la region en relación a su ID
                    $regiones[$i]['region'] = $reg->nombre_region;
                }
            }
        }
        $contador = '0';

        for ($i=0; $i < 100; $i++) {//Recorre el arreglo y va sumando cada vez que encuentra un anuncio de cierta región
            $contador = '0';
            foreach ($anuncio as $anun) {
                if ($anun->idusuario == $i) {
                    if ($contador == '0') {
                        $regiones[$anun->region]['cantidad'] = $regiones[$anun->region]['cantidad'] + 1;
                        $contador = '1';
                    }                    
                }
            }
        }
        return view("almacen.graficos.informeusuarios",['regiones' => $regiones]);
        
    }
}
