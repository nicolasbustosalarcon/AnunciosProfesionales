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
        ->where('a.region','=',$categoria)
        //->where('a.fecha_publicacion', '>', $fechainicio)
        //->where('a.fecha_publicacion','<',$fechafin)
        //->orwhere('a.fecha_publicacion','=',$fechainicio)
        //->where('a.region','=',$region)
        //->orwhere('a.fecha_publicacion','=',$fechafin)
        //->where('a.region','=',$region)
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
        /*$fechainicio=$request->get('fecha_inicio');
        $fechafin=$request->get('fecha_fin');


        $anuncio=DB::table('anuncio as a')
        ->join('categoria as c','a.idcategoria','=','c.idcategoria')
        ->join('tipo_anuncios as ta','a.tipo_anuncio','=','ta.idtipo_anuncios')
        ->join('users as u','a.idusuario','=','u.id')
        ->select('a.idanuncio','a.titulo','a.region','a.estado','c.nombre as categoria','u.name as usuario','a.descripcion','a.imagen','a.precio','ta.nombre_tipo as tipo_anuncio')
        ->where('a.fecha_publicacion', '>', $fechainicio)
        ->where('a.fecha_publicacion','<',$fechafin)
        ->where('a.idcategoria','=',$categoria)
        ->orwhere('a.fecha_publicacion','=',$fechainicio)
        ->where('a.idcategoria','=',$categoria)
        ->orwhere('a.fecha_publicacion','=',$fechafin)
        ->where('a.idcategoria','=',$categoria)
        ->get();

        $contador_espera=DB::table('anuncio as a')
        ->where('a.estado','=','2')
        ->where('a.idcategoria','=',$categoria)
        ->where('a.fecha_publicacion', '>', $fechainicio)
        ->where('a.fecha_publicacion','<',$fechafin)
        ->orwhere('a.fecha_publicacion','=',$fechainicio)
        ->orwhere('a.fecha_publicacion','=',$fechafin)
        ->select(DB::raw('count(*) as espera_count'))
        ->get();

        $contador_eliminados=DB::table('anuncio as a')
        ->where('a.estado','=','0')
        ->where('a.idcategoria','=',$categoria)
        ->where('a.fecha_publicacion', '>', $fechainicio)
        ->where('a.fecha_publicacion','<',$fechafin)
        ->orwhere('a.fecha_publicacion','=',$fechainicio)
        ->where('a.estado','=','0')
        ->where('a.idcategoria','=',$categoria)
        ->orwhere('a.fecha_publicacion','=',$fechafin)
        ->where('a.estado','=','0')
        ->where('a.idcategoria','=',$categoria)
        ->select(DB::raw('count(*) as eliminado_count'))
        ->get();

        $contador_publicados=DB::table('anuncio as a')
        ->where('a.estado','=','1')
        ->where('a.idcategoria','=',$categoria)
        ->where('a.fecha_publicacion', '>', $fechainicio)
        ->where('a.fecha_publicacion','<',$fechafin)
        ->orwhere('a.fecha_publicacion','=',$fechainicio)
        ->where('a.estado','=','1')
        ->where('a.idcategoria','=',$categoria)
        ->orwhere('a.fecha_publicacion','=',$fechafin)
        ->where('a.estado','=','1')
        ->where('a.idcategoria','=',$categoria)
        ->select(DB::raw('count(*) as publicado_count'))
        ->get();

        $ingreso=DB::table('anuncio as a')
        ->join('tipo_anuncios as ta','a.tipo_anuncio','=','ta.idtipo_anuncios')
        ->where('a.idcategoria','=',$categoria)
        ->where('a.fecha_publicacion', '>', $fechainicio)
        ->where('a.fecha_publicacion','<',$fechafin)
        ->orwhere('a.fecha_publicacion','=',$fechainicio)
        ->orwhere('a.fecha_publicacion','=',$fechafin)
        ->select(DB::raw('sum(ta.precio_anuncio) as publicado_count'))
        ->get();

        $anuncios_maule=DB::table('anuncio as a')//Se obtienen los anuncios que pertenecen a la categoría especificada y está dentro de la fecha en cada región.
        ->where('a.idcategoria','=',$categoria)
        ->where('a.fecha_publicacion', '>', $fechainicio)
        ->where('a.fecha_publicacion','<',$fechafin)
        ->where('a.region','=','VII Maule')
        ->orwhere('a.fecha_publicacion','=',$fechainicio)
        ->where('a.region','=','VII Maule')
        ->where('a.idcategoria','=',$categoria)
        ->orwhere('a.fecha_publicacion','=',$fechafin)
        ->where('a.region','=','VII Maule')
        ->where('a.idcategoria','=',$categoria)
        ->select(DB::raw('count(*) as maule_count'))
        ->get();

        $anuncios_santiago=DB::table('anuncio as a')
        ->where('a.fecha_publicacion', '>', $fechainicio)
        ->where('a.fecha_publicacion','<',$fechafin)
        ->where('a.idcategoria','=',$categoria)
        ->where('a.region','=','Region Metropolitana')
        ->orwhere('a.fecha_publicacion','=',$fechainicio)
        ->where('a.idcategoria','=',$categoria)
        ->where('a.region','=','Region Metropolitana')
        ->orwhere('a.fecha_publicacion','=',$fechafin)
        ->where('a.idcategoria','=',$categoria)
        ->where('a.region','=','Region Metropolitana')
        ->select(DB::raw('count(*) as maule_count'))
        ->get();

        $anuncios_arica=DB::table('anuncio as a')
        ->where('a.idcategoria','=',$categoria)
        ->where('a.fecha_publicacion', '>', $fechainicio)
        ->where('a.fecha_publicacion','<',$fechafin)
        ->where('a.region','=','XV Arica y Parinacota')
        ->orwhere('a.fecha_publicacion','=',$fechainicio)
        ->where('a.idcategoria','=',$categoria) 
        ->where('a.region','=','XV Arica y Parinacota')
        ->orwhere('a.fecha_publicacion','=',$fechafin)
        ->where('a.idcategoria','=',$categoria)
        ->where('a.region','=','XV Arica y Parinacota')
        ->select(DB::raw('count(*) as maule_count'))
        ->get();

        $anuncios_tarapaca=DB::table('anuncio as a')
        ->where('a.idcategoria','=',$categoria)
        ->where('a.region','=','I Tarapaca')
        ->where('a.fecha_publicacion', '>', $fechainicio)
        ->where('a.fecha_publicacion','<',$fechafin)
        ->orwhere('a.fecha_publicacion','=',$fechainicio)
        ->where('a.idcategoria','=',$categoria)
        ->where('a.region','=','I Tarapaca')
        ->orwhere('a.fecha_publicacion','=',$fechafin)
        ->where('a.idcategoria','=',$categoria)
        ->where('a.region','=','I Tarapaca')
        ->select(DB::raw('count(*) as maule_count'))
        ->get();

        $anuncios_antofagasta=DB::table('anuncio as a')
        ->where('a.idcategoria','=',$categoria)
        ->where('a.region','=','II Antofagasta')
        ->where('a.fecha_publicacion', '>', $fechainicio)
        ->where('a.fecha_publicacion','<',$fechafin)
        ->orwhere('a.fecha_publicacion','=',$fechainicio)
        ->where('a.idcategoria','=',$categoria)
        ->where('a.region','=','II Antofagasta')
        ->orwhere('a.fecha_publicacion','=',$fechafin)
        ->where('a.idcategoria','=',$categoria)
        ->where('a.region','=','II Antofagasta')
        ->select(DB::raw('count(*) as maule_count'))
        ->get();

        $anuncios_atacama=DB::table('anuncio as a')
        ->where('a.idcategoria','=',$categoria)
        ->where('a.region','=','III Atacama')
        ->where('a.fecha_publicacion', '>', $fechainicio)
        ->where('a.fecha_publicacion','<',$fechafin)
        ->orwhere('a.fecha_publicacion','=',$fechainicio)
        ->where('a.idcategoria','=',$categoria)
        ->where('a.region','=','III Atacama')
        ->orwhere('a.fecha_publicacion','=',$fechafin)
        ->where('a.idcategoria','=',$categoria)
        ->where('a.region','=','III Atacama')
        ->select(DB::raw('count(*) as maule_count'))
        ->get();

        $anuncios_coquimbo=DB::table('anuncio as a')
        ->where('a.idcategoria','=',$categoria)
        ->where('a.region','=','IV Coquimbo')
        ->where('a.fecha_publicacion', '>', $fechainicio)
        ->where('a.fecha_publicacion','<',$fechafin)
        ->orwhere('a.fecha_publicacion','=',$fechainicio)
        ->where('a.idcategoria','=',$categoria)
        ->where('a.region','=','IV Coquimbo')
        ->orwhere('a.fecha_publicacion','=',$fechafin)
        ->where('a.idcategoria','=',$categoria)
        ->where('a.region','=','IV Coquimbo')
        ->select(DB::raw('count(*) as maule_count'))
        ->get();

        $anuncios_valparaiso=DB::table('anuncio as a')
        ->where('a.idcategoria','=',$categoria)
        ->where('a.region','=','V Valparaiso')
        ->where('a.fecha_publicacion', '>', $fechainicio)
        ->where('a.fecha_publicacion','<',$fechafin)
        ->orwhere('a.fecha_publicacion','=',$fechainicio)
        ->where('a.idcategoria','=',$categoria)
        ->where('a.region','=','V Valparaiso')
        ->orwhere('a.fecha_publicacion','=',$fechafin)
        ->where('a.idcategoria','=',$categoria)
        ->where('a.region','=','V Valparaiso')
        ->select(DB::raw('count(*) as maule_count'))
        ->get();

        $anuncios_biobio=DB::table('anuncio as a')
        ->where('a.idcategoria','=',$categoria)
        ->where('a.region','=','VIII BioBio')
        ->where('a.fecha_publicacion', '>', $fechainicio)
        ->where('a.fecha_publicacion','<',$fechafin)
        ->orwhere('a.fecha_publicacion','=',$fechainicio)
        ->where('a.idcategoria','=',$categoria)
        ->where('a.region','=','VIII BioBio')
        ->orwhere('a.fecha_publicacion','=',$fechafin)
        ->where('a.idcategoria','=',$categoria)
        ->where('a.region','=','VIII BioBio')
        ->select(DB::raw('count(*) as maule_count'))
        ->get();

        $anuncios_laaraucania=DB::table('anuncio as a')
        ->where('a.idcategoria','=',$categoria)
        ->where('a.region','=','IX La Araucania')
        ->where('a.fecha_publicacion', '>', $fechainicio)
        ->where('a.fecha_publicacion','<',$fechafin)
        ->orwhere('a.fecha_publicacion','=',$fechainicio)
        ->where('a.idcategoria','=',$categoria)
        ->where('a.region','=','IX La Araucania')
        ->orwhere('a.fecha_publicacion','=',$fechafin)
        ->where('a.idcategoria','=',$categoria)
        ->where('a.region','=','IX La Araucania')
        ->select(DB::raw('count(*) as maule_count'))
        ->get();

        $anuncios_losrios=DB::table('anuncio as a')
        ->where('a.idcategoria','=',$categoria)
        ->where('a.region','=','XIV Los Rios')
        ->where('a.fecha_publicacion', '>', $fechainicio)
        ->where('a.fecha_publicacion','<',$fechafin)
        ->orwhere('a.fecha_publicacion','=',$fechainicio)
        ->where('a.idcategoria','=',$categoria)
        ->where('a.region','=','XIV Los Rios')
        ->orwhere('a.fecha_publicacion','=',$fechafin)
        ->where('a.idcategoria','=',$categoria)
        ->where('a.region','=','XIV Los Rios')
        ->select(DB::raw('count(*) as maule_count'))
        ->get();

        $anuncios_loslagos=DB::table('anuncio as a')
        ->where('a.idcategoria','=',$categoria)
        ->where('a.region','=','X Los Lagos')
        ->where('a.fecha_publicacion', '>', $fechainicio)
        ->where('a.fecha_publicacion','<',$fechafin)
        ->orwhere('a.fecha_publicacion','=',$fechainicio)
        ->where('a.idcategoria','=',$categoria)
        ->where('a.region','=','X Los Lagos')
        ->orwhere('a.fecha_publicacion','=',$fechafin)
        ->where('a.idcategoria','=',$categoria)
        ->where('a.region','=','X Los Lagos')
        ->select(DB::raw('count(*) as maule_count'))
        ->get();

        $anuncios_aysen=DB::table('anuncio as a')
        ->where('a.idcategoria','=',$categoria)
        ->where('a.region','=','Aysén')
        ->where('a.fecha_publicacion', '>', $fechainicio)
        ->where('a.fecha_publicacion','<',$fechafin)
        ->orwhere('a.fecha_publicacion','=',$fechainicio)
        ->where('a.idcategoria','=',$categoria)
        ->where('a.region','=','Aysén')
        ->orwhere('a.fecha_publicacion','=',$fechafin)
        ->where('a.idcategoria','=',$categoria)
        ->where('a.region','=','Aysén')
        ->select(DB::raw('count(*) as maule_count'))
        ->get();

        $anuncios_magallanes=DB::table('anuncio as a')
        ->where('a.idcategoria','=',$categoria)
        ->where('a.fecha_publicacion', '>', $fechainicio)
        ->where('a.fecha_publicacion','<',$fechafin)
        ->where('a.region','=','XII Magallanes y Antártica')
        ->orwhere('a.fecha_publicacion','=',$fechainicio)
        ->where('a.idcategoria','=',$categoria)
        ->where('a.region','=','XII Magallanes y Antártica')
        ->orwhere('a.fecha_publicacion','=',$fechafin)
        ->where('a.idcategoria','=',$categoria)
        ->where('a.region','=','XII Magallanes y Antártica')
        ->select(DB::raw('count(*) as maule_count'))
        ->get();

        //Se crea el pdf con los parametros obtenidos, enviandolas a la vista "categoría" que está en la carpeta "almacen".
        $pdf = PDF::loadView('almacen.categorias', compact('anuncio','contador_espera','contador_eliminados','contador_publicados','ingreso','anuncios_maule','anuncios_santiago','anuncios_arica','anuncios_tarapaca','anuncios_antofagasta','anuncios_atacama','anuncios_coquimbo','anuncios_valparaiso','anuncios_biobio','anuncios_laaraucania','anuncios_losrios','anuncios_loslagos','anuncios_aysen','anuncios_magallanes'));
        //Se descarga el PDF creado
        return $pdf->download('reporte_por_categoria.pdf');
        */
    }
}
