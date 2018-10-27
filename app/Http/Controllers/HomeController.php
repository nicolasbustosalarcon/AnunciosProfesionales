<?php

namespace AnunciosProfesionales\Http\Controllers;

use AnunciosProfesionales\Http\Requests;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use AnunciosProfesionales\Http\Requests\AnuncioFormRequest;
use AnunciosProfesionales\Anuncio;
use AnunciosProfesionales\Palabras;
use DB;
use DateTime;


use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)//En esta función se controla el ingreso, enviando a cada usuario a su vista
    {
        $user = Auth::User();
        if ($user->tipo_usuario == '1')//Vista de secretaria
        {
            $regiones=DB::table('region')->where('estado','=','1')->get();
            $query=trim($request->get('searchText'));
            $categorias=DB::table('categoria')->where('condicion','=','1')->get();//Se seleccionan las categorias que están activas
            $anuncios=DB::table('anuncio as a')
            ->join('users as u','a.idusuario','=','u.id')//Se sincroniza cada anuncio con su clave foranea
            ->join('tipo_anuncios as ta','a.tipo_anuncio','=','ta.idtipo_anuncios')
            ->join('region as r','a.region','=','r.idregion')
            ->join('categoria as c','a.idcategoria','=','c.idcategoria')
            ->select('a.idanuncio','a.titulo','r.nombre_region as region','a.estado','c.nombre as categoria','u.name as usuario','a.descripcion','a.imagen','a.precio','ta.nombre_tipo as tipo_anuncio')->where('a.estado','=','2')
            ->where('a.titulo','LIKE','%'.$query.'%') //$query la cadena que se ingresa
            ->orwhere('a.estado','=','2')//Se mostrarán los anuncios que están en estado de espera
            ->where('a.region','LIKE','%'.$query.'%')
            ->orwhere('a.estado','=','2')
            ->where('c.nombre','LIKE','%'.$query.'%')
            ->orwhere('a.estado','=','2')
            ->where('a.descripcion','LIKE','%'.$query.'%')
            ->orderBy('a.idanuncio','asc')//Se ordenan por el id del anuncio
            ->paginate(1);


            return view('almacen.secretaria.index',["anuncios"=>$anuncios,"searchText"=>$query,"categorias"=>$categorias,"regiones"=>$regiones]);//se retorna la vista de la secretaria y se envian los parametros necesarios para mostrar la vista
        }
        if ($user->tipo_usuario == '0')//Vista de usuario normal
        {
            $query=trim($request->get('searchText'));
            $nombre_red=DB::table('red_social')->get();
            $redes_sociales=DB::table('anuncio_redsocial')->get();
            $anuncios=DB::table('anuncio as a')
            ->join('users as u','a.idusuario','=','u.id')
            ->join('tipo_anuncios as ta','a.tipo_anuncio','=','ta.idtipo_anuncios')
            ->join('categoria as c','a.idcategoria','=','c.idcategoria')
            ->join('region as r','a.region','=','r.idregion')
            ->select('a.idanuncio','a.titulo','r.nombre_region as region','a.estado','c.nombre as categoria','u.name as usuario','a.descripcion','a.imagen','a.precio','ta.nombre_tipo as tipo_anuncio')
            ->where('a.estado','=','1')
            ->where('a.titulo','LIKE','%'.$query.'%')
            ->orwhere('a.estado','=','1')//Se muestran los anuncios que están publicados
            ->where('a.region','LIKE','%'.$query.'%')
            ->orwhere('a.estado','=','1')
            ->where('c.nombre','LIKE','%'.$query.'%')
            ->orwhere('a.estado','=','1')
            ->where('a.descripcion','LIKE','%'.$query.'%')
            ->orderBy('a.idanuncio','asc')
            ->paginate(6);
            return view('almacen.anuncio.index',["anuncios"=>$anuncios,"nombre_red"=>$nombre_red,"searchText"=>$query,"redes_sociales"=>$redes_sociales]);
        }

    if ($user->tipo_usuario == '2'){//Vista de Administrador
        $query=trim($request->get('searchText'));
            $anuncios=DB::table('anuncio as a')
            ->join('categoria as c','a.idcategoria','=','c.idcategoria')
            ->join('users as u','a.idusuario','=','u.id')
            ->join('tipo_anuncios as ta','a.tipo_anuncio','=','ta.idtipo_anuncios')
            ->join('region as r','a.region','=','r.idregion')
            ->select('a.idanuncio','a.titulo','r.nombre_region as region','a.estado','c.nombre as categoria','a.descripcion','a.imagen','a.precio','ta.nombre_tipo as tipo_anuncio')
            ->where('a.titulo','LIKE','%'.$query.'%') /*$query la cadena que se ingresa*/
            ->orderBy('a.idanuncio','asc')
            ->paginate(7);
            return view('almacen.admin.index',["anuncios"=>$anuncios,"searchText"=>$query]);
    }
    if ($user->tipo_usuario == '4'){
            return view('almacen.cuentaeliminada.index');
    }
    }
}
