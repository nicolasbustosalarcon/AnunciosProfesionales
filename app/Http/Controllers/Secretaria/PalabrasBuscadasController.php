<?php

namespace AnunciosProfesionales\Http\Controllers\Secretaria;

use Illuminate\Http\Request;

use AnunciosProfesionales\Http\Requests;
use AnunciosProfesionales\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use AnunciosProfesionales\Http\Requests\AnuncioFormRequest;
use AnunciosProfesionales\Palabras;
use DB;
use DateTime;
use Auth;

use Carbon\Carbon;

class PalabrasBuscadasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        if ($request)
        {
            $palabras=DB::table('palabras_buscadas')
            ->orderBy('palabras_buscadas.cantidad','des')
            ->get();

            
            foreach ($palabras as $p) {
                if ($p->palabra == NULL) {
                    $borrar=Palabras::findOrFail($p->idpalabra);
                    $borrar->delete();
                }
            }
            return view('almacen.palabras_buscadas.palabras_buscadas',["palabras"=>$palabras]);
        }
    }
}
