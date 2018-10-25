<?php

namespace AnunciosProfesionales\Http\Controllers\Administrador;

use Illuminate\Support\Facades\Redirect;
use AnunciosProfesionales\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use AnunciosProfesionales\Anuncio;
use DB;
use Auth;
use Illuminate\Http\Request;
use AnunciosProfesionales\User;
use AnunciosProfesionales\Http\Requests;
use Illuminate\Support\Facades\Validator;

class EditarAdminController extends Controller
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
        return view('almacen.editar_admin.index',["users"=>$users]);
    }

    public function show($id)
    {
        return view("almacen.edita_usuario.show",["users"=>User::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view("almacen.editar_admin.edit",["users"=>User::findOrFail($id)]);
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
        $users->update();
        return Redirect::to('almacen/editar_admin');
    }

}
