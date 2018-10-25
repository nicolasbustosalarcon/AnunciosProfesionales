<?php

namespace AnunciosProfesionales\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use AnunciosProfesionales\Http\Controllers\Controller;
use AnunciosProfesionales\Http\Requests;
use AnunciosProfesionales\TipoAnuncio;
use Illuminate\Support\Facades\Redirect;
use AnunciosProfesionales\Http\Requests\TipoanuncioRequest;
use DB;

class TipoanuncioController extends Controller//Controller del tipo de anuncio que permite al administrador crearlos y borrarlos desde la página.
{
    public function __construct()
    {

    }
    public function index(Request $request)//Función que muestra los tipos de anuncio que se encuentran activos
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $tipo_anuncios=DB::table('tipo_anuncios')
            ->where('nombre_tipo','LIKE','%'.$query.'%')
            ->where ('estado','=','1')
            ->orderBy('idtipo_anuncios','asc')
            ->paginate(7);
            return view('almacen.tipoanuncio.index',["tipo_anuncios"=>$tipo_anuncios,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("almacen.tipoanuncio.create");
    }
    public function store (TipoanuncioRequest $request)//Función que captura los datos ingresados por el administrador a la hora de crear un tipo de anuncio
    {
        $tipo_anuncios=new TipoAnuncio;
        $tipo_anuncios->nombre_tipo=$request->get('nombre');
        $tipo_anuncios->precio_anuncio=$request->get('precio');
        $tipo_anuncios->cantidad_dias=$request->get('cantidad_dias');
        $tipo_anuncios->estado='1';
        $tipo_anuncios->save();
        return Redirect::to('almacen/tipoanuncio');

    }
    public function show($id)
    {
        return view("almacen.tipoanuncio.show",["tipoanuncio"=>TipoAnuncio::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("almacen.tipoanuncio.edit",["tipoanuncio"=>TipoAnuncio::findOrFail($id)]);
    }
    public function update(TipoanuncioRequest $request,$id)//Funcion que captura los datos de un tipo de anuncio que será modificado por un administrador
    {
        $tipoanuncio=TipoAnuncio::findOrFail($id);
        $tipoanuncio->nombre_tipo=$request->get('nombre');
        $tipoanuncio->precio_anuncio=$request->get('precio');
        $tipoanuncio->cantidad_dias=$request->get('cantidad_dias');
        $tipoanuncio->estado='1';
        $tipoanuncio->update();
        return Redirect::to('almacen/tipoanuncio');
    }
    public function destroy($id)//Función que elimina logicamente un anuncio
    {
        $tipoanuncio=TipoAnuncio::findOrFail($id);
        $tipoanuncio->estado='0';
        $tipoanuncio->update();
        return Redirect::to('almacen/tipoanuncio');
    }

}
