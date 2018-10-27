<?php

namespace AnunciosProfesionales\Http\Controllers\Secretaria;

use Illuminate\Http\Request;

use AnunciosProfesionales\Http\Requests;
use AnunciosProfesionales\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use AnunciosProfesionales\Http\Requests\AnuncioFormRequest;
use AnunciosProfesionales\Anuncio;
use DB;
use DateTime;
use Auth;

use Carbon\Carbon;

class AnuncioController2 extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        if ($request)
        {
            $regiones=DB::table('region')->where('estado','=','1')->get();
            $query=trim($request->get('searchText'));//Se obtienen la cadena para la consulta.
            $categorias=DB::table('categoria')->where('condicion','=','1')->get();//Esta variable es necesaria cuando la secretaria seleccionara una categoría para generar el informe.
            $anuncios=DB::table('anuncio as a')//Se seleccionan los anuncios que estarán en la vista de la secretaria, su estado debe ser 2, que corresponde al estado de espera.
            ->join('users as u','a.idusuario','=','u.id')
            ->join('tipo_anuncios as ta','a.tipo_anuncio','=','ta.idtipo_anuncios')
            ->join('categoria as c','a.idcategoria','=','c.idcategoria')
            ->join('region as r','a.region','=','r.idregion')
            ->select('a.idanuncio','a.titulo','r.nombre_region as region','a.estado','c.nombre as categoria','u.name as usuario','a.descripcion','a.imagen','a.precio','ta.nombre_tipo as tipo_anuncio')
            ->where('a.estado','=','2')
            ->where('a.titulo','LIKE','%'.$query.'%') /*$query la cadena que se ingresa*/
            ->orwhere('a.estado','=','2')
            ->where('a.region','LIKE','%'.$query.'%')
            ->orwhere('a.estado','=','2')
            ->where('c.nombre','LIKE','%'.$query.'%')
            ->orwhere('a.estado','=','2')
            ->where('a.descripcion','LIKE','%'.$query.'%')
            ->orderBy('a.idanuncio','asc')
            ->paginate(1);
            
            return view('almacen.secretaria.index',["anuncios"=>$anuncios,"searchText"=>$query,"categorias"=>$categorias,"regiones"=>$regiones]);
        }
    }
    public function create()
    {
    	$categorias=DB::table('categoria')->where('condicion','=','1')->get();
        return view("almacen.secretaria.create",["categorias"=>$categorias]);
        
    }


    public function store (AnuncioFormRequest $request)
    {
        $anuncio=new Anuncio;
        $anuncio->titulo=$request->get('titulo');
        $anuncio->region=$request->get('region');
        $anuncio->idcategoria=$request->get('idcategoria');
        $anuncio->descripcion=$request->get('descripcion');
        $anuncio->estado='2';
        $anuncio->idusuario=$request->get('idusuario');
        //si la imagen es de las extensiones jpeg,bmp,png, la imagen se almacena.
        if(Input::hasfile('imagen')){
        	$file=Input::file('imagen');
        	$file->move(public_path().'/imagenes/anuncios/',$file->getClientOriginalName());
        	$anuncio->imagen=$file->getClientOriginalName();
        }
        $anuncio->precio=$request->get('precio');
        $anuncio->tipo_anuncio=$request->get('tipo_anuncio');
        $anuncio->save();
        return Redirect::to('almacen/secretaria_anuncio');

    }
    public function show($id)
    {
        return view("almacen.secretaria.show",["anuncio"=>Anuncio::findOrFail($id)]);
    }
    public function edit($id)
    {
    	$anuncio=Anuncio::findOrFail($id);
    	$categorias=DB::table('categoria')->where('condicion','=','1')->get();
        return view("almacen.secretaria.edit",["anuncio"=>$anuncio,"categorias"=>$categorias]);
    }
    public function update(AnuncioFormRequest $request,$id)
    {
        $anuncio=Anuncio::findOrFail($id);
        $anuncio->titulo=$request->get('titulo');
        $anuncio->region=$request->get('region');
        $anuncio->idcategoria=$request->get('idcategoria');
        $anuncio->descripcion=$request->get('descripcion');
        $anuncio->idusuario=$request->get('idusuario');

        if(Input::hasfile('imagen')){
            $file=Input::file('imagen');
            $file->move(public_path().'/imagenes/anuncios',$file->getClientOriginalName());
            $anuncio->imagen=$file->getClientOriginalName();

        }
        $anuncio->precio=$request->get('precio');
        $anuncio->tipo_anuncio=$request->get('tipo_anuncio');
        $anuncio->estado='0';//El anuncio pasa a un estado de eliminación
        $anuncio->comentario_secretaria=$request->get('comentario');
        $anuncio->id_secretaria=Auth::user()->id;
        $anuncio->update();
        return Redirect::to('almacen/secretaria_anuncio');
    }
    public function destroy($id)
    {
        $fecha= Carbon::now('America/Santiago');//Se registra la fecha que la secretaria publicó el anuncio.
        $anuncio=Anuncio::findOrFail($id);
        $dias=DB::table('tipo_anuncios as ta')
        ->where('ta.idtipo_anuncios','=',$anuncio->tipo_anuncio)
        ->value('cantidad_dias');//Se obtiene la cantidad de días que el anuncio estará publicado en la BD.
        if ($anuncio->fecha_publicacion == '') {//Se comprueba que el anuncio no haya sido publicado antes.
             $anuncio->fecha_publicacion = $fecha->toDateTimeString();//Se asigna la fecha actual al anuncio.
             $fecha_caducacion=$fecha->addDay($dias);//Función que suma la cantidad de días a la fecha actual, asi se obtiene la fecha en que el anuncio será retirado de la página
             $anuncio->fecha_caducidad =$fecha_caducacion->toDateTimeString();
        }
        $anuncio->id_secretaria=Auth::user()->id;
        $anuncio->estado='1';//Si la secretaria acepta el anuncio, éste cambia de estado y se publica.
        $anuncio->update();
        return Redirect::to('almacen/secretaria_anuncio');
    }
}
