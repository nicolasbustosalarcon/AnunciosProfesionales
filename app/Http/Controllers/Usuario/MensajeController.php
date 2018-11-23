<?php

namespace AnunciosProfesionales\Http\Controllers\Usuario;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use AnunciosProfesionales\Http\Controllers\Controller;
use AnunciosProfesionales\Mensaje;
use AnunciosProfesionales\Http\Requests;
use AnunciosProfesionales\Http\Requests\MensajeFormRequest;
use AnunciosProfesionales\Anuncio;

use DB;
use Auth;

class MensajeController extends Controller
{
    public function __construct(){

    }

    public function index()
    {
 			return view("almacen.mensaje.index");

    }
    public function show($id)
    {
        $anuncio=Anuncio::findOrFail($id);
    	$usuarios=DB::table('users')->get();
    	return view("almacen.mensaje.index",["anuncio"=>$anuncio,"usuarios"=>$usuarios]);
    }
    public function store(MensajeFormRequest $request)
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
}
