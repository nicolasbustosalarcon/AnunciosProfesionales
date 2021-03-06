<?php

namespace AnunciosProfesionales\Http\Controllers\Usuario;

use Illuminate\Http\Request;
use AnunciosProfesionales\Http\Controllers\Controller;
use AnunciosProfesionales\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use AnunciosProfesionales\Http\Requests\AnuncioFormRequest;
use AnunciosProfesionales\Http\Requests\RedAnuncioRequest;
use AnunciosProfesionales\Anuncio;
use AnunciosProfesionales\Palabras;
use AnunciosProfesionales\RedAnuncio;
use AnunciosProfesionales\TablaLike;
use DB;
use Auth;
use DateTime;
use Carbon\Carbon;

class AnuncioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        if ($request)//Vista Usuario
        {
            $fechaHoy = date('Y-m-d');
            $fechaHoy2 = strtotime("$fechaHoy");
            $nombre_red=DB::table('red_social')->get();
            $query=trim($request->get('searchText'));//Se obtiene la palabra que se buscará
            $redes_sociales=DB::table('anuncio_redsocial')->get();
            $anuncios_publicar = DB::table('anuncio')->get();
            foreach ($anuncios_publicar as $anun) {//Recorre los anuncios y saca del sistema a los que hayan caducado
                if($anun->estado == 1){
                    $fecha_fin = strtotime("$anun->fecha_caducidad");
                    if ($fecha_fin < $fechaHoy2) {
                        $anuncio_actualizar = Anuncio::findOrFail($anun->idanuncio);
                        $anuncio_actualizar->estado = '4';
                        $anuncio_actualizar->update();
                    }
                }
            }
            $anuncios=DB::table('anuncio as a')//Se obtienen los anuncios para la vista
            ->join('users as u','a.idusuario','=','u.id')//Se sincroniza cada anuncio con su clave foranea
            ->join('tipo_anuncios as ta','a.tipo_anuncio','=','ta.idtipo_anuncios')
            ->join('categoria as c','a.idcategoria','=','c.idcategoria')
            ->join('region as r','a.region','=','r.idregion')
            ->select('a.idanuncio','a.titulo','r.nombre_region as region','a.estado','c.nombre as categoria','u.name as usuario','a.descripcion','a.imagen','a.precio','ta.nombre_tipo as tipo_anuncio', 'a.fecha_caducidad', 'ta.precio_anuncio')
            ->where('a.estado','=','1')//anuncios publicados
            ->where('a.titulo','LIKE','%'.$query.'%') /*$query la cadena que se ingresa*/
            ->orwhere('a.estado','=','1')
            ->where('c.nombre','LIKE','%'.$query.'%')
            ->orwhere('a.estado','=','1')
            ->where('a.descripcion','LIKE','%'.$query.'%')
            ->orderBy('ta.precio_anuncio','desc')
            ->orderBy('a.fecha_caducidad','desc')
            ->paginate(6);


            $agregar_palabra=DB::table('palabras_buscadas')->get();//Se registrarán las palabras que busquen los usuarios
            $ciclo = '1';
            if ($query != '') {
                $nueva_palabra=new Palabras;
                foreach ($agregar_palabra as $agr) {
                    if($ciclo == '1'){
                        if (strcasecmp($query, $agr->palabra) == '0') {//Se busca una coincidencia con la base de datos
                            $palabra_actualizar=Palabras::findOrFail($agr->idpalabra);
                            $palabra_actualizar->cantidad = $palabra_actualizar->cantidad + 1;//En caso de encontrar la palabra se aumenta el contador, se actualiza en la BD y posteriormente se cierra el ciclo
                            $palabra_actualizar->update();
                            $ciclo = '0';
                        }
                    }
                }

                if($ciclo == '1'){//Si el ciclo no se cerró, no se encontro coincidencia por lo que se agrega a la BD
                    $nueva_palabra->palabra = $query;
                    $nueva_palabra->cantidad = 1;
                    $nueva_palabra->save();
                }
            }

            return view('almacen.anuncio.index',["anuncios"=>$anuncios,"nombre_red"=>$nombre_red,"searchText"=>$query,"redes_sociales"=>$redes_sociales]);
        }
    }
      
    public function create()//Se obtienen los datos de la base de datos necesarios para crear un anuncio
    {
    	$categorias=DB::table('categoria')->where('condicion','=','1')->get();//Se carga la tabla necesaria para publicar un anuncio
        $tipo_anuncios=DB::table('tipo_anuncios')->where('estado','=','1')->get();
        $regiones=DB::table('region')->where('estado','=','1')->get();
        $redes_sociales=DB::table('red_social')->where('estado','=','1')->get();
        return view("almacen.anuncio.create",["redes_sociales"=>$redes_sociales,"categorias"=>$categorias,'tipo_anuncios'=>$tipo_anuncios,'regiones'=>$regiones]);//Se envian los parametros para poder crear el enuncio a la vista
        
    }

    public function store (AnuncioFormRequest $request,RedAnuncioRequest $request2)//Se capturan los datos ingresados por el usuario
    {//Con AnuncioFormRequest se asegura que el usuario ingrese datos validos
        $anuncio=new Anuncio;//Se crea un anuncio "vacio"
        $tipo_anuncios=DB::table('tipo_anuncios as ta');
        $usuario=DB::table('usuario as u')
        ->where('u.idusuario','=','$anuncio->idusuario');
        $anuncio->titulo=$request->get('titulo');//Se obtienen los datos que escribio el usuario
        $anuncio->region=$request->get('idregion');

        $anuncio->idcategoria=$request->get('idcategoria');
        $anuncio->descripcion=$request->get('descripcion');
        $anuncio->estado='2';
        $anuncio->idusuario= Auth::user()->id;
        if(Input::hasfile('imagen')){
        	$file=Input::file('imagen');
        	$file->move(public_path().'/imagenes/anuncios/',$file->getClientOriginalName());
        	$anuncio->imagen=$file->getClientOriginalName();
        }
        if(Input::hasfile('imagen2')){
            $file=Input::file('imagen2');
            $file->move(public_path().'/imagenes/anuncios/',$file->getClientOriginalName());
            $anuncio->imagen2=$file->getClientOriginalName();
        }
        if(Input::hasfile('imagen3')){
            $file=Input::file('imagen3');
            $file->move(public_path().'/imagenes/anuncios/',$file->getClientOriginalName());
            $anuncio->imagen3=$file->getClientOriginalName();
        }
        $anuncio->tipo_anuncio=$request->get('tipo_anuncio');
        $anuncio->precio=$request->get('precio');
        $anuncio->save();

        $red_anuncio = new RedAnuncio;//Se guardan los datos en una tabla que tiene como clave foranea el id del anuncio
        $red_anuncio->id_anuncio=$anuncio->idanuncio;
        $red_anuncio->id_redsocial=$request2->get('redsocial');//Se capturan otros datos que ingresó el usuario
        $red_anuncio->red_social=$request2->get('redsocial1');
        $red_anuncio->save();

        $red_anuncio2 = new RedAnuncio;
        $red_anuncio2->id_anuncio=$anuncio->idanuncio;
        $red_anuncio2->id_redsocial=$request2->get('redsocialdos');
        $red_anuncio2->red_social=$request2->get('redsocial2');
        $red_anuncio2->save();

        return Redirect::to('almacen/anuncio');

    }
    public function show($id,$parametro)
    {//En esta función se muestran con más detalle los anuncios y permiten dar like o deslike
        $anuncio=Anuncio::findOrFail($id);
        $usuarios=DB::table('users')->get();
        $nombre_region=DB::table("region")->get();
        $nombre_red=DB::table('red_social')->get();

        $nuevatablalike=new TablaLike;
        $datos_tabla=DB::table('tabla_like')->get();
        $ciclo='0';
        if ($parametro == '1') {//Si el parametro es 1 se comprueba si el usuario ya habia dado like o deslike con anterioridad, para reemplazar lo que habia hecho anteriormente. Lo mismo sucede cuando el parametro es 2.
            foreach ($datos_tabla as $dat) {
                if ($dat->id_anuncio == $id) {
                    if ($dat->id_usuario == Auth::user()->id) {
                        if ($dat->estado == '1') {
                            $dato_actualizar=TablaLike::findOrFail($dat->idlike);
                            $dato_actualizar->estado = '0';
                            $dato_actualizar->update();
                            $ciclo = '1';
                        }
                        if ($dat->estado == '0') {
                            $dato_actualizar=TablaLike::findOrFail($dat->idlike);
                            $dato_actualizar->estado = '1';
                            $dato_actualizar->update();
                            $ciclo = '1';
                        }
                        if ($dat->estado == '2') {
                            $dato_actualizar=TablaLike::findOrFail($dat->idlike);
                            $dato_actualizar->estado = '1';
                            $dato_actualizar->update();
                            $ciclo = '1';
                        }
                    }
                }
            }
        }

        if ($parametro == '2') {
            foreach ($datos_tabla as $dat) {
                if ($dat->id_anuncio == $id) {
                    if ($dat->id_usuario == Auth::user()->id) {
                        if ($dat->estado == '1') {
                            $dato_actualizar=TablaLike::findOrFail($dat->idlike);
                            $dato_actualizar->estado = '2';
                            $dato_actualizar->update();
                            $ciclo = '1';
                        }
                        if ($dat->estado == '2') {
                            $dato_actualizar=TablaLike::findOrFail($dat->idlike);
                            $dato_actualizar->estado = '0';
                            $dato_actualizar->update();
                            $ciclo = '1';
                        }
                        if ($dat->estado == '0') {
                            $dato_actualizar=TablaLike::findOrFail($dat->idlike);
                            $dato_actualizar->estado = '2';
                            $dato_actualizar->update();
                            $ciclo = '1';
                        }
                    }
                }
            }
        }
        if ($parametro == '1'){
            if ($ciclo == '0') {//Si el usuario no habia interactuado con anterioridad con el anuncio, se registra en la BD
                $nuevatablalike->id_anuncio = $id;
                $nuevatablalike->id_usuario = Auth::user()->id;
                $nuevatablalike->estado = '1';
                $nuevatablalike->save();
            }
        }
        
        if ($parametro == '2'){
            if ($ciclo == '0') {
                $nuevatablalike->id_anuncio = $id;
                $nuevatablalike->id_usuario = Auth::user()->id;
                $nuevatablalike->estado = '2';
                $nuevatablalike->save();
            }
        }
        $cantidad_mg = DB::table('tabla_like as t')//Se cuentan los like del anuncio para mostrarlo en la vista
        ->where('t.estado','=','1')
        ->where('t.id_anuncio','=',$id)
        ->select(DB::raw('count(*) as mg'))
        ->get();

        $cantidad_no_mg = DB::table('tabla_like as t')
        ->where('t.estado','=','2')
        ->where('t.id_anuncio','=',$id)
        ->select(DB::raw('count(*) as no_mg'))
        ->get();
        
        $redes_sociales=DB::table('anuncio_redsocial')->get();
        return view("almacen.anuncio.veranuncio",["anuncio"=>$anuncio,"usuarios"=>$usuarios,"nombre_region"=>$nombre_region,"nombre_red"=>$nombre_red,"redes_sociales"=>$redes_sociales,"cantidad_mg"=>$cantidad_mg,"cantidad_no_mg"=>$cantidad_no_mg]);   
   }

    public function edit($id)//Se recibe el id del anuncio que se quiere editar y se obtienen las variables necesarias
    {
    	$anuncio=Anuncio::findOrFail($id);
        $tipo_anuncio=DB::table('tipo_anuncios')->where('estado','=','1')->get();
    	$categorias=DB::table('categoria')->where('condicion','=','1')->get();
        $regiones=DB::table('region')->where('estado','=','1')->get();
        return view("almacen.anuncio.edit",["anuncio"=>$anuncio,"regiones"=>$regiones,"categorias"=>$categorias,"tipo_anuncio"=>$tipo_anuncio]);
    }

    public function update(AnuncioFormRequest $request,$id)//se obtienen los datos que el usuario quiere editar
    {
        $anuncio=Anuncio::findOrFail($id);
        $anuncio->titulo=$request->get('titulo');
        $anuncio->region=$request->get('idregion');
        $anuncio->idcategoria=$request->get('idcategoria');
        $anuncio->descripcion=$request->get('descripcion');
        $anuncio->idusuario=Auth::user()->id;

        if(Input::hasfile('imagen')){
        	$file=Input::file('imagen');
        	$file->move(public_path().'/imagenes/anuncios',$file->getClientOriginalName());
        	$anuncio->imagen=$file->getClientOriginalName();

        }
        if(Input::hasfile('imagen2')){
            $file=Input::file('imagen2');
            $file->move(public_path().'/imagenes/anuncios',$file->getClientOriginalName());
            $anuncio->imagen2=$file->getClientOriginalName();

        }
        if(Input::hasfile('imagen3')){
            $file=Input::file('imagen3');
            $file->move(public_path().'/imagenes/anuncios',$file->getClientOriginalName());
            $anuncio->imagen3=$file->getClientOriginalName();

        }
        $anuncio->precio=$request->get('precio');
        $anuncio->tipo_anuncio=$request->get('tipo_anuncio');
        $anuncio->estado='2';
        $anuncio->update();
        return Redirect::to('almacen/anuncio');
    }
    public function destroy($id)//Se hace un borrado lógico del anuncio
    {
        $anuncio=Anuncio::findOrFail($id);
        $anuncio->estado='3';
        $anuncio->update();
        return Redirect::to('almacen/anuncio');
    }

    public function like($id,$parametro)
    {
        $anuncio=Anuncio::findOrFail($id);
        $usuarios=DB::table('users')->get();
        $nombre_region=DB::table("region")->get();
        $nombre_red=DB::table('red_social')->get();
        $redes_sociales=DB::table('anuncio_redsocial')->get();
        return view("almacen.anuncio.veranuncio",["anuncio"=>$anuncio,"usuarios"=>$usuarios,"nombre_region"=>$nombre_region,"nombre_red"=>$nombre_red,"redes_sociales"=>$redes_sociales]);
    }



}
