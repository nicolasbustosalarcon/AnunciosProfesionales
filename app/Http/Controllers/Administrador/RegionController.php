<?php

namespace AnunciosProfesionales\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use AnunciosProfesionales\Http\Controllers\Controller;
use AnunciosProfesionales\Http\Requests;
use AnunciosProfesionales\Region;
use Illuminate\Support\Facades\Redirect;
use AnunciosProfesionales\Http\Requests\RegionFormRequest;
use DB;

class RegionController extends Controller//Controller que le permite al administrador crear, editar, ver y borrar regiones desde la página
{
    public function __construct()
    {

    }
    public function index(Request $request)//Función que muestra al administrador las regiones que se encuentran activas
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $regiones=DB::table('region')->where('nombre_region','LIKE','%'.$query.'%')
            ->where ('estado','=','1')
            ->orderBy('idregion','asc')
            ->paginate(7);
            return view('almacen.regiones.index',["regiones"=>$regiones,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("almacen.regiones.create");
    }
    public function store (RegionFormRequest $request)//Se obtienen los datos de una nueva región ingresada por el administrador
    {
        $regiones=new Region;
        $regiones->nombre_region=$request->get('nombre');
        $regiones->estado='1';
        $regiones->save();
        return Redirect::to('almacen/regiones');

    }
    public function show($id)
    {
        return view("almacen.regiones.show",["regiones"=>Region::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("almacen.regiones.edit",["regiones"=>Region::findOrFail($id)]);
    }
    public function update(RegionFormRequest $request,$id)//Función que obtiene los datos ingresados por el administrador para actualizar el nombre de una región
    {
        $regiones=Region::findOrFail($id);
        $regiones->nombre_region=$request->get('nombre');
        $regiones->update();
        return Redirect::to('almacen/regiones');
    }
    public function destroy($id)//Elimina de manera lógica una región
    {
        $regiones=Region::findOrFail($id);
        $regiones->estado='0';
        $regiones->update();
        return Redirect::to('almacen/regiones');
    }





}
