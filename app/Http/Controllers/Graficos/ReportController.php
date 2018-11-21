<?php

namespace AnunciosProfesionales\Http\Controllers\Graficos;

use Illuminate\Http\Request;
use AnunciosProfesionales\Http\Controllers\Controller;
use AnunciosProfesionales\Http\Requests;
use AnunciosProfesionales\Http\Requests\AnuncioFormRequest;
use AnunciosProfesionales\Anuncio;
use DB;

use PDF;

class ReportController extends Controller//Controller para generar el PDF
{

    public function informe_palabras_buscadas ()
    {
        $palabras = DB::table('palabras_buscadas')->get();
        return view("almacen.graficos.informe_palabras",["palabras" => $palabras]);

    }

    public function store (Request $request)//Funcion que obtiene los parámetros para generar los informes.
    {
        $region=$request->get('region');//Se obtiene la región.
        $region_consulta=DB::table('region as r')
        ->select('r.nombre_region as nombre')
        ->where('r.idregion','=',$region)
        ->get();//Se obtiene la región.
        //$fechainicio=$request->get('fecha_inicio');//Se obtiene la fecha inicial
        //$fechafin=$request->get('fecha_fin');//se obtitne la fecha final

        $anuncio=DB::table('anuncio as a')//Consulta que obtiene los anuncios que cumple con las condiciones (región y fecha) dadas por la secretaria
        ->join('categoria as c','a.idcategoria','=','c.idcategoria')
        ->join('tipo_anuncios as ta','a.tipo_anuncio','=','ta.idtipo_anuncios')
        ->join('users as u','a.idusuario','=','u.id')
        ->select('a.idanuncio','a.titulo','a.region','a.estado','c.nombre as categoria','u.name as usuario','a.descripcion','a.imagen','a.precio','ta.nombre_tipo as tipo_anuncio')
        ->where('a.region','=',$region)
        //->where('a.fecha_publicacion', '>', $fechainicio)
        //->where('a.fecha_publicacion','<',$fechafin)
        //->orwhere('a.fecha_publicacion','=',$fechainicio)
        //->where('a.region','=',$region)
        //->orwhere('a.fecha_publicacion','=',$fechafin)
        //->where('a.region','=',$region)
        ->get();


        $contador_eliminados=DB::table('anuncio as a')//Variable que contendra la cantidad de anuncios eliminados entre las fechas y las región concebidas. Lo mismo para las dos variables de mas abajo, que contienen la cantidad de anuncios eliminados y la cantidad de anuncios publicados respectivamente.
        ->where('a.estado','=','0')
        ->where('a.region','=',$region)        
        ->select(DB::raw('count(*) as eliminado_count'))
        ->get();

        $contador_publicados=DB::table('anuncio as a')
        ->where('a.estado','=','1')
        ->where('a.region','=',$region)
        ->select(DB::raw('count(*) as publicado_count'))
        ->get();

        $ingreso=DB::table('anuncio as a')//Esta variable contiene el ingreso total por región en el intervalo de fechas dado.
        ->join('tipo_anuncios as ta','a.tipo_anuncio','=','ta.idtipo_anuncios')
        ->where('a.region','=',$region)
        ->select(DB::raw('sum(ta.precio_anuncio) as publicado_count'))
        ->get();

        $contador_espera=DB::table('anuncio as a')
        ->where('a.estado','=','2')
        ->where('a.region','=',$region)
        ->select(DB::raw('count(*) as espera_count'))
        ->get();


        return view("almacen.graficos.maule",compact('anuncio','region_consulta','contador_espera','contador_eliminados','contador_publicados','ingreso'));
        //$pdf = PDF::loadView('almacen.maule', compact('anuncio','contador_espera','contador_eliminados','contador_publicados','ingreso'));//Aquí se crea el PDF en base a una vista llamada "maule" que se encuentra en la carpeta "almacen" y se le entregan las variables obtenidas anteriormente.
        //return $pdf->download('reporte_detallado.pdf');//La función descarga el PDF que se creo con nuestras variables
    }
}