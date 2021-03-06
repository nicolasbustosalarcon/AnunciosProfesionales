<?php

namespace AnunciosProfesionales\Http\Controllers\Usuario;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use AnunciosProfesionales\Http\Controllers\Controller;
use AnunciosProfesionales\VerMensajes;
use AnunciosProfesionales\Http\Requests;
use AnunciosProfesionales\Http\Requests\MensajeFormRequest;
use AnunciosProfesionales\Anuncio;
use AnunciosProfesionales\Mensaje;
use DB;
use Auth;

class VerMensajesController extends Controller
{
    public function __construct(){

    }

    public function index()//manda todos los anuncios, mensajes y usuarios al index de vermensajes
    {
        $mensajes = DB::table('mensaje')->get();
        $anuncios = DB::table('anuncio')->get();
        $users = DB::table('users')->get();
        return view("almacen.vermensajes.index",["mensajes"=>$mensajes,"anuncios"=>$anuncios,"users"=>$users]);
    }
    public function edit($id)   //funcion que sirve para editar el mensaje, donde cambiara a estado 2 para dejarlo en leído.
	{
		$mensaje=Mensaje::findOrFail($id);
		$mensaje->estado = '2';
		$mensaje->update();
        return Redirect::to('almacen/vermensajes');

    }   
    public function show($id)       //funcion que nos servirá para mostrar el mensaje.
    {
    	$mensaje=Mensaje::findOrFail($id);
    	$mensaje->estado = '2';
    	$mensaje->update();
    	$anuncios=DB::table('anuncio')->get();
    	$usuarios=DB::table('users')->get();
    	return view("almacen.vermensajes.respuesta",["mensaje"=>$mensaje,"anuncios"=>$anuncios,"usuarios"=>$usuarios]);
    }
    public function store(MensajeFormRequest $request)      //esta funcion almacenará el mensaje
    {
    	$mensaje=new Mensaje;
    	$mensaje->id_anuncio=$request->get('id_anuncio');
    	$mensaje->id_usuario_envia=$request->get('id_usuario_envia');;
    	$mensaje->id_usuario_recibe=$request->get('id_usuario_recibe');
    	$mensaje->mensaje=$request->get('mensaje');
    	$mensaje->estado='1';
    	$mensaje->save();
    	return Redirect::to('almacen/anuncio');

    }
    public function destroy($id)            //para un borrado lógico del mensaje.
    {   
        $mensaje=Mensaje::findOrFail($id);
        $mensaje->estado = '0';
        $mensaje->update();
        return Redirect::to('almacen/vermensajes');

    }
        
}
