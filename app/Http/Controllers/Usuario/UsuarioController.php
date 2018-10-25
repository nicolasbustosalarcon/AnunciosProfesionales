<?php

namespace AnunciosProfesionales\Http\Controllers\Usuario;

use Illuminate\Http\Request;
use AnunciosProfesionales\Http\Controllers\Controller;
use AnunciosProfesionales\Http\Requests;
use AnunciosProfesionales\Usuario;
use Illuminate\Support\Facades\Redirect;
use AnunciosProfesionales\Http\Requests\UsuarioFormRequest;
use DB;

class UsuarioController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $usuarios=DB::table('usuario')->where('nombre','LIKE','%'.$query.'%')
            ->orderBy('idusuario','asc')
            ->paginate(7);
            return view('almacen.usuario.index',["usuarios"=>$usuarios,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("almacen.usuario.create");
    }
    public function store (UsuarioFormRequest $request)
    {
        $usuario=new Usuario;
        $usuario->rut=$request->get('rut');
        $usuario->nombre=$request->get('nombre');
        $usuario->apellido=$request->get('apellido');
        $usuario->pass=$request->get('pass');
        $usuario->direccion_region=$request->get('direccion_region');
        $usuario->direccion_comuna=$request->get('direccion_comuna');
        $usuario->direccion_calle=$request->get('direccion_calle');
        $usuario->telefono=$request->get('telefono');
        $usuario->correo=$request->get('correo');
        $usuario->edad=$request->get('edad');
        $usuario->tipo_usuario='1';
        $usuario->tipo_cuenta=$request->get('tipo_cuenta');
        $usuario->save();
        return Redirect::to('almacen/anuncio');

    }
    public function show($id)
    {
        return view("almacen.usuario.show",["usuario"=>Usuario::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("almacen.usuario.edit",["usuario"=>Usuario::findOrFail($id)]);
    }
    public function update(UsuarioFormRequest $request,$id)
    {
        $usuario=Usuario::findOrFail($id);
        $usuario->rut=$request->get('rut');
        $usuario->nombre=$request->get('nombre');
        $usuario->apellido=$request->get('apellido');
        $usuario->pass=$request->get('pass');
        $usuario->direccion_region=$request->get('direccion_region');
        $usuario->direccion_comuna=$request->get('direccion_comuna');
        $usuario->direccion_calle=$request->get('direccion_calle');
        $usuario->telefono=$request->get('telefono');
        $usuario->correo=$request->get('correo');
        $usuario->edad=$request->get('edad');
        $usuario->tipo_cuenta=$request->get('tipo_cuenta');
        $usuario->save();
        $usuario->update();
        return Redirect::to('almacen/usuario');
    }
    public function destroy($id)
    {
        $usuario=Categoria::findOrFail($id);
        $usuario->tipo_usuario ='0';
        $usuario->update();
        return Redirect::to('almacen/usuario');
    }}
