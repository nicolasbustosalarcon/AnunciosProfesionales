<?php

namespace AnunciosProfesionales\Http\Controllers\Usuario;

use Illuminate\Http\Request;

use AnunciosProfesionales\Http\Requests;
use AnunciosProfesionales\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use AnunciosProfesionales\Http\Requests\AnuncioFormRequest;
use AnunciosProfesionales\Anuncio;
use DB;
use Auth;

class AnuciousuarioController extends Controller
{
        public function anunciospersonales()//Esta función obtiene los anuncios publicados del usuario que se enuentra logeado en la página.
    {
            $anuncios1=DB::table('anuncio as a')
            ->join('users as u','a.idusuario','=','u.id')
            ->join('tipo_anuncios as ta','a.tipo_anuncio','=','ta.idtipo_anuncios')
            ->join('categoria as c','a.idcategoria','=','c.idcategoria')
            ->select('a.idanuncio','a.titulo','a.region','a.estado','c.nombre as categoria','u.name as usuario','a.descripcion','a.imagen','a.id_secretaria','a.precio','ta.nombre_tipo as tipo_anuncio','a.comentario_secretaria')
            ->where('a.idusuario','=',Auth::user()->id)
            ->where('a.estado','=','0')
            ->orderBy('a.idanuncio','asc')
            ->paginate(3);

            $anuncios2=DB::table('anuncio as a')
            ->join('users as u','a.idusuario','=','u.id')
            ->join('tipo_anuncios as ta','a.tipo_anuncio','=','ta.idtipo_anuncios')
            ->join('categoria as c','a.idcategoria','=','c.idcategoria')
            ->select('a.idanuncio','a.titulo','a.region','a.estado','c.nombre as categoria','u.name as usuario','a.descripcion','a.imagen','a.id_secretaria','a.precio','ta.nombre_tipo as tipo_anuncio','a.comentario_secretaria')
            ->where('a.idusuario','=',Auth::user()->id)
            ->where('a.estado','=','1')
            ->orderBy('a.idanuncio','asc')
            ->paginate(3);


            $anuncios3=DB::table('anuncio as a')
            ->join('users as u','a.idusuario','=','u.id')
            ->join('tipo_anuncios as ta','a.tipo_anuncio','=','ta.idtipo_anuncios')
            ->join('categoria as c','a.idcategoria','=','c.idcategoria')
            ->select('a.idanuncio','a.titulo','a.region','a.estado','c.nombre as categoria','u.name as usuario','a.descripcion','a.imagen','a.id_secretaria','a.precio','ta.nombre_tipo as tipo_anuncio','a.comentario_secretaria')
            ->where('a.idusuario','=',Auth::user()->id)
            ->where('a.estado','=','2')
            ->orderBy('a.idanuncio','asc')
            ->paginate(3);

            return view('almacen.anuncio.anunciospersonales',["anuncios1"=>$anuncios1,"anuncios2"=>$anuncios2,"anuncios3"=>$anuncios3]);
    }
}
