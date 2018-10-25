<?php

namespace AnunciosProfesionales\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use AnunciosProfesionales\Http\Controllers\Controller;
use AnunciosProfesionales\Http\Requests;
use AnunciosProfesionales\Censura;
use Illuminate\Support\Facades\Redirect;
use AnunciosProfesionales\Http\Requests\CensuraFormRequest;
use DB;

class CensuraController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request){
    	if ($request)
    	{
    		$query=trim($request->get('searchText'));
    		$censura=DB::table('censura')->where('palabra_censurada','LIKE','%'.$query.'%')
    		->where('estado','=','1')
    		->orderby('idpalabra','asc')
    		->paginate(5);
    		return view('almacen.censura.index',["censura"=>$censura,"searchText"=>$query]);
    	}

    }

    public function create()
    {
        return view("almacen.censura.create");

    }

    public function store(CensuraFormRequest $request) //para almacenar
    {
    	$censura=new Censura;
        $censura->palabra_censurada=$request->get('palabra_censurada');
        $censura->estado='1';
        $censura->save();
        return Redirect::to('almacen/censura');

    }
    public function show($id) // mostrar
    {
    	return view("almacen.almance.show",["palabra_censurada"=>Censura::findOrFail($id)]);
    }
    public function edit($id)
    {
    	return view("almacen.censura.edit",["palabra_censurada"=>Censura::findOrFail($id)]);
    }
    public function update(CensuraFormRequest $request, $id) 
    {
    	$censura=Censura::findOrFail($id);
    	$censura->palabra_censurada=$request->get('palabra_censurada');
    	$censura->update();
        return Redirect::to('almacen/censura');
    }

    public function destroy($id)
    {
        $censura=Censura::findOrFail($id);
        $censura->estado='0';
        $censura->update();
        return Redirect::to('almacen/censura');
    }
}	
