<?php

namespace AnunciosProfesionales\Http\Controllers\Graficos;

use Illuminate\Http\Request;
use AnunciosProfesionales\Http\Controllers\Controller;
use AnunciosProfesionales\Http\Requests;
use AnunciosProfesionales\Http\Requests\AnuncioFormRequest;
use AnunciosProfesionales\Anuncio;
use DB;

use PDF;

class CategoriaGeneralController extends Controller
{
	public function store (Request $request)
	{
        $fechainicio=$request->get('fecha_inicio');
        $fechafin=$request->get('fecha_fin');

        $categoria_tabla=DB::table('categoria')
        ->select('categoria.idcategoria','categoria.nombre')
        ->where('categoria.condicion','=','1')
        ->get();

        $anuncio=DB::table('anuncio as a')
        ->join('categoria as c','a.idcategoria','=','c.idcategoria')
        ->join('tipo_anuncios as ta','a.tipo_anuncio','=','ta.idtipo_anuncios')
        ->join('users as u','a.idusuario','=','u.id')
        ->select('a.idanuncio','a.titulo','a.region','a.estado','a.idcategoria','u.name as usuario','a.descripcion','a.imagen','a.precio','ta.nombre_tipo as tipo_anuncio')
        ->where('a.fecha_publicacion', '>', $fechainicio)
        ->where('a.fecha_publicacion','<',$fechafin)
        ->orwhere('a.fecha_publicacion','=',$fechainicio)
        ->orwhere('a.fecha_publicacion','=',$fechafin)
        ->get();

        $categorias = array(array('categoria','cantidad'));//Se inicia el arreglo que contendra las categorias y su cantidad respectiva ded anuncios

        for ($i=0; $i < 100; $i++) { //se inicia el arreglo con datos nulos
            $categorias[$i]['categoria']= 'categoria no definida';
        }

        for ($i=0; $i < 100; $i++) { 
            $categorias[$i]['cantidad']= '0';//La cantidad se inicia el 0 para todas las categorias
            foreach($categoria_tabla as $reg){
                if ($reg->idcategoria==$i) {//Se ingresa el nombre de la region en relación a su ID
                    $categorias[$i]['categoria'] = $reg->nombre;
                }
            }
        }



        for ($i=0; $i < 100; $i++) {//Recorre el arreglo y va sumando cada vez que encuentra un anuncio de cierta categoria
            foreach ($anuncio as $anun) {
                if ($anun->idcategoria == $i) {
                    $categorias[$i]['cantidad'] = $categorias[$i]['cantidad'] + 1;
                }
            }
        }
        return view("almacen.graficos.categoriasgeneral",['categorias' => $categorias]);
        
    }
}
