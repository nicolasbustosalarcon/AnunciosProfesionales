<?php

namespace AnunciosProfesionales\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use AnunciosProfesionales\Http\Controllers\Controller;
use AnunciosProfesionales\Http\Requests;
use AnunciosProfesionales\Categoria;
use Illuminate\Support\Facades\Redirect;
use AnunciosProfesionales\Http\Requests\CategoriaFormRequest;
use DB;


class CategoriaController extends Controller//Controller que le permite al administrador crear, editar, ver y borrar categorias desde la página
{
    public function __construct()
    {

    }
    public function index(Request $request)//Vista de las categorias
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));//Se obtiene la busqueda por parte del usuario
            $categorias=DB::table('categoria')->where('nombre','LIKE','%'.$query.'%')
            ->where ('condicion','=','1')//Categorias activas
            ->orderBy('idcategoria','asc')
            ->paginate(7);
            return view('almacen.categoria.index',["categorias"=>$categorias,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("almacen.categoria.create");
    }
    public function store (CategoriaFormRequest $request)
    {
        $categoria=new Categoria;//Se crea una categoria y se registran los datos ingresados por el administrador
        $categoria->nombre=$request->get('nombre');
        $categoria->condicion='1';
        $categoria->save();
        return Redirect::to('almacen/categoria');

    }
    public function show($id)
    {
        return view("almacen.categoria.show",["categoria"=>Categoria::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("almacen.categoria.edit",["categoria"=>Categoria::findOrFail($id)]);
    }
    public function update(CategoriaFormRequest $request,$id)
    {
        $categoria=Categoria::findOrFail($id);//Se actualiza la categoria que selecciono el administrador por medio del id
        $categoria->nombre=$request->get('nombre');
        $categoria->update();
        return Redirect::to('almacen/categoria');
    }
    public function destroy($id)
    {
        $categoria=Categoria::findOrFail($id);//Se realiza un borrado lógico de las categorias cambiando el estado a 0
        $categoria->condicion='0';
        $categoria->update();
        return Redirect::to('almacen/categoria');
    }





}
