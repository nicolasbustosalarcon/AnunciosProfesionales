<?php

namespace AnunciosProfesionales\Http\Controllers\Usuario;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use AnunciosProfesionales\Http\Controllers\Controller;
use AnunciosProfesionales\Anuncio;
use DB;
use Auth;
use Illuminate\Http\Request;
use AnunciosProfesionales\User;
use AnunciosProfesionales\Http\Requests;
use Illuminate\Support\Facades\Validator;

class EditarUsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()//Funcion que mostrará al usuario que inicio sesión
    {
        $users = DB::table('users')
        ->where('id','=',Auth::user()->id)
        ->where('estado','=','0')
        ->orderBy('id','asc')
        ->paginate(1);
        return view('almacen.editar_usuario.index',["users"=>$users]);
    }

    public function show($id)
    {
        return view("almacen.edita_usuario.show",["users"=>User::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view("almacen.editar_usuario.edit",["users"=>User::findOrFail($id)]);
    }

    public function update(Request $request,$id)//Se obtienen los datos ingresados por el usuario
    {
        $users=User::findOrFail($id);
        $users->name=$request->get('name');
        $users->direccion_region=$request->get('region');
        $users->direccion_cuidad=$request->get('ciudad');
        $users->email=$request->get('email');
        $users->telefono=$request->get('telefono');
        $users->edad=$request->get('edad');
        $users->estado = '0';
        $users->password = bcrypt($request->get('password'));
        $users->update();
        return Redirect::to('almacen/editar_usuario');
    }


}
