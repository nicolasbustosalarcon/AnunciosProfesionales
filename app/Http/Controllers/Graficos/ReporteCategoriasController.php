<?php

namespace AnunciosProfesionales\Http\Controllers\Graficos;

use Illuminate\Http\Request;
use AnunciosProfesionales\Http\Controllers\Controller;
use AnunciosProfesionales\Http\Requests;
use AnunciosProfesionales\Http\Requests\AnuncioFormRequest;
use AnunciosProfesionales\Anuncio;
use DB;

use PDF;

class ReporteCategoriasController extends Controller
{
    public function store (Request $request)//Funcion que genera un reporte de los anuncios de cierta cetegoría dentro de cierta fecha, además de mostrar por región la cantidad de anuncios de la categoría especificada.
    {
        $categoria=$request->get('categoria');
        $categoria_consulta=DB::table('categoria as c')
        ->select('c.nombre as nombre')
        ->where('c.idcategoria','=',$categoria)
        ->get();

        $anuncio=DB::table('anuncio as a')//Consulta que obtiene los anuncios que cumple con las condiciones (región y fecha) dadas por la secretaria
        ->join('categoria as c','a.idcategoria','=','c.idcategoria')
        ->join('tipo_anuncios as ta','a.tipo_anuncio','=','ta.idtipo_anuncios')
        ->join('users as u','a.idusuario','=','u.id')
        ->select('a.idanuncio','a.titulo','a.region','a.estado','c.nombre as categoria','u.name as usuario','a.descripcion','a.imagen','a.precio','ta.nombre_tipo as tipo_anuncio')
        ->where('a.idcategoria','=',$categoria)
        ->get();


        $contador_eliminados=DB::table('anuncio as a')//Variable que contendra la cantidad de anuncios eliminados entre las fechas y las región concebidas. Lo mismo para las dos variables de mas abajo, que contienen la cantidad de anuncios eliminados y la cantidad de anuncios publicados respectivamente.
        ->where('a.estado','=','0')
        ->where('a.idcategoria','=',$categoria)        
        ->select(DB::raw('count(*) as eliminado_count'))
        ->get();

        $contador_publicados=DB::table('anuncio as a')
        ->where('a.estado','=','1')
        ->where('a.idcategoria','=',$categoria)
        ->select(DB::raw('count(*) as publicado_count'))
        ->get();

        $ingreso=DB::table('anuncio as a')//Esta variable contiene el ingreso total por región en el intervalo de fechas dado.
        ->join('tipo_anuncios as ta','a.tipo_anuncio','=','ta.idtipo_anuncios')
        ->where('a.idcategoria','=',$categoria)
        ->select(DB::raw('sum(ta.precio_anuncio) as publicado_count'))
        ->get();

        $contador_espera=DB::table('anuncio as a')
        ->where('a.estado','=','2')
        ->where('a.idcategoria','=',$categoria)
        ->select(DB::raw('count(*) as espera_count'))
        ->get();


        return view("almacen.graficos.categorias",compact('anuncio','categoria_consulta','contador_espera','contador_eliminados','contador_publicados','ingreso'));
    }
}
