<?php

namespace AnunciosProfesionales\Http\Controllers\Usuario;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use AnunciosProfesionales\Http\Controllers\Controller;
use AnunciosProfesionales\VerMensajes;
use AnunciosProfesionales\Http\Requests;
use AnunciosProfesionales\Http\Requests\MensajeFormRequest;
use AnunciosProfesionales\Anuncio;
use DB;
use Auth;
class VerMensajesController extends Controller
{
    public function __construct(){

    }

    public function index()
    {
        $mensajes = DB::table('mensaje')->get();
        $anuncios = DB::table('anuncio')->get();
        $users = DB::table('users')->get();
        return view("almacen.vermensajes.index",["mensajes"=>$mensajes,"anuncios"=>$anuncios,"users"=>$users]);
    }

    
}
