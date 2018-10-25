<?php

namespace AnunciosProfesionales\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use AnunciosProfesionales\User;
use AnunciosProfesionales\Http\Controllers\Controller;
use AnunciosProfesionales\Http\Requests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class ListausuarioController extends Controller//Controller que le permite al administrador crear, editar, ver y borrar usuarios desde la página
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
    public function index()//Función que mostrara todos los usuarios que están activos en el sistema
    {
        $users = DB::table('users')
        ->where('estado','=','0')
        ->orderBy('id','asc')
        ->paginate(7);
        return view('almacen.lista_usuarios.index',["users"=>$users]);
    }

   public function create()
    {
    	$users=DB::table('users');
        return view("almacen.lista_usuarios.create",["users"=>$users]);
        
    }

    public function store (Request $request)//Función para crear un nuevo usuario del sistema, éste puede ser un usuario normal, una secretaria o un administrador, pero solo será visible por el administrador
    {
        $users=new User;
        $users->name=$request->get('name');
        $users->direccion_region=$request->get('region');
        $users->direccion_cuidad=$request->get('ciudad');
        $users->email=$request->get('email');
        $users->telefono=$request->get('telefono');
        $users->edad=$request->get('edad');
        $users->tipo_usuario=$request->get('tipo_usuario');
        $users->password =bcrypt($request->get('password'));
        $users->estado = '0';
        $users->save();
        return Redirect::to('almacen/lista_usuarios');

    }

    public function show($id)
    {
        return view("almacen.lista_usuarios.show",["users"=>User::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view("almacen.lista_usuarios.edit",["users"=>User::findOrFail($id)]);
    }

    public function update(Request $request,$id)
    {
        $users=User::findOrFail($id);
        $users->name=$request->get('name');
        $users->direccion_region=$request->get('region');
        $users->direccion_cuidad=$request->get('ciudad');
        $users->email=$request->get('email');
        $users->telefono=$request->get('telefono');
        $users->edad=$request->get('edad');
        $users->tipo_usuario=$request->get('tipo_usuario');
        $users->estado = '0';
        $users->password = bcrypt($request->get('password'));
        $users->update();
        return Redirect::to('almacen/lista_usuarios');
    }

    public function destroy($id)
    {
        $user = User::find($id); //Esta funcion elimina el usuario seleccionado
        $user->tipo_usuario = '4';
        $user->estado = '1';
        $user->update();
        return Redirect::to('almacen/lista_usuarios');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
