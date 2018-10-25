<?php

namespace AnunciosProfesionales\Http\Controllers\Administrador;

use Illuminate\Http\Request;

use AnunciosProfesionales\Http\Requests;
use AnunciosProfesionales\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use AnunciosProfesionales\Http\Requests\AnuncioFormRequest;
use AnunciosProfesionales\Anuncio;
use DB;

class AnuncioController3 extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $anuncios=DB::table('anuncio as a')
            ->join('categoria as c','a.idcategoria','=','c.idcategoria')
            ->join('region as r','a.region','=','r.idregion')
            ->select('a.idanuncio','a.titulo','r.nombre_region as region','a.estado','c.nombre as categoria','a.descripcion','a.imagen','a.precio','a.tipo_anuncio')
            ->where('a.titulo','LIKE','%'.$query.'%') /*$query la cadena que se ingresa*/
            ->orderBy('a.idanuncio','asc')
            ->paginate(7);
            return view('almacen.admin.index',["anuncios"=>$anuncios,"searchText"=>$query]);
        }
    }
    public function create()
    {
    	$categorias=DB::table('categoria')->where('condicion','=','1')->get();
        return view("almacen.admin.create",["categorias"=>$categorias]);
        
    }

    public function store (AnuncioFormRequest $request)
    {
        /*$anuncio=new Anuncio;
       
        $anuncio->titulo=$request->get('titulo');
        $anuncio->region=$request->get('region');

        $anuncio->idcategoria=$request->get('idcategoria');
        $anuncio->descripcion=$request->get('descripcion');
        $anuncio->estado='2';
        $anuncio->idusuario=$request->get('idusuario');

        if(Input::hasfile('imagen')){
        	$file=Input::file('imagen');
        	$file->move(public_path().'/imagenes/anuncios/',$file->getClientOriginalName());
        	$anuncio->imagen=$file->getClientOriginalName();
        }
        $anuncio->precio=$request->get('precio');
        $anuncio->tipo_anuncio=$request->get('tipo_anuncio');
        $anuncio->save();
        return Redirect::to('almacen/admin');
    */
    }
    public function show($id)
    {
        return view("almacen.admin.show",["anuncio"=>Anuncio::findOrFail($id)]);
    }
    public function edit($id)
    {
    	$anuncio=Anuncio::findOrFail($id);
    	$categorias=DB::table('categoria')->where('condicion','=','1')->get();
        return view("almacen.admin.edit",["anuncio"=>$anuncio,"categorias"=>$categorias]);
    }
    public function update(AnuncioFormRequest $request,$id)
    {
        $anuncio=Anuncio::findOrFail($id);
        $anuncio->estado='1';
        $anuncio->update();
        return Redirect::to('almacen/admin');
    }
    public function destroy($id)//se realiza un borrado físico del anuncio
    {
        $anuncio=Anuncio::findOrFail($id);
        $anuncio->delete();
        return Redirect::to('almacen/admin');
    }
}
