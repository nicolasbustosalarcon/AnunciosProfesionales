<?php

namespace AnunciosProfesionales\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use AnunciosProfesionales\Http\Controllers\Controller;
use AnunciosProfesionales\Http\Requests;

use AnunciosProfesionales\RedSocial;
use Illuminate\Support\Facades\Redirect;
use AnunciosProfesionales\Http\Requests\RedsocialFormRequest;
use DB;


class RedsocialController extends Controller//Controller que le permite al administrador crear, editar, ver y borrar redes sociales desde la página
{
    public function __construct()
    {

    }
    public function index(Request $request)//Funcion que muestra las redes sociales activas
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $red_social=DB::table('red_social')->where('nombre_red','LIKE','%'.$query.'%')
            ->where ('estado','=','1')
            ->orderBy('idred_social','asc')
            ->paginate(7);
            return view('almacen.redsocial.index',["red_social"=>$red_social,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("almacen.redsocial.create");
    }
    public function store (RedSocialFormRequest $request)//Se obtienen los datos ingresados por el administrador para crear una nueva red social
    {
        $red_social=new RedSocial;
        $red_social->nombre_red=$request->get('nombre');
        $red_social->estado='1';
        $red_social->save();
        return Redirect::to('almacen/redsocial');

    }
    public function show($id)
    {
        return view("almacen.redsocial.show",["red_social"=>RedSocial::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("almacen.redsocial.edit",["red_social"=>RedSocial::findOrFail($id)]);
    }
    public function update(RedSocialFormRequest $request,$id)//Funcion que obtiene los nuevos datos para editar una red social
    {
        $red_social=RedSocial::findOrFail($id);
        $red_social->nombre_red=$request->get('nombre');
        $red_social->update();
        return Redirect::to('almacen/redsocial');
    }
    public function destroy($id)//Funcion que elimina logicamente una red social
    {
        $red_social=RedSocial::findOrFail($id);
        $red_social->estado='0';
        $red_social->update();
        return Redirect::to('almacen/redsocial');
    }
}
