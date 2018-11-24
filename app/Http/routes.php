<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/auth', function () {
    return view('auth.login');
});

//Route::group(['middleware'=> ['auth','administrador'], 'prefix'=> 'administrador'],function(){
	Route::resource('almacen/admin','Administrador\AnuncioController3');
//});

//Route::group(['middleware'=> ['auth','secretaria'], 'prefix' => 'secretaria'],function(){
	Route::resource('almacen/secretaria','Secretaria\AnuncioController2');
//});

//Route::group(['middleware'=> ['auth','usuario'], 'prefix' => 'tipo_usuario'],function(){
	Route::resource('almacen/anuncio','Usuario\AnuncioController');
//});
Route::get("almacen/anuncio/{id}/{parametro}","Usuario\AnuncioController@show");

//Route::resource('almacen/anuncio','AnuncioController');

Route::resource('almacen/palabras_buscadas','Secretaria\PalabrasBuscadasController');

Route::resource('almacen/secretaria_anuncio','Secretaria\MostrarAnuncioController');



Route::resource('almacen/categoria','Administrador\CategoriaController');
Route::resource('almacen/usuario','Usuario\UsuarioController');
Route::resource('almacen/tipoanuncio','Administrador\TipoanuncioController');

Route::get('anunciosusuario/anunciospersonales', 'Usuario\AnuciousuarioController@anunciospersonales');

Route::resource('almacen/lista_usuarios', 'Administrador\ListausuarioController');
Route::resource('almacen/editar_usuario', 'Usuario\EditarUsuarioController');
Route::resource('almacen/editar_admin', 'Administrador\EditarAdminController');

Route::resource('almacen/graficos/pdf', 'Graficos\ReporteGeneralController');
Route::resource('almacen/graficos/maule', 'Graficos\ReportController');
Route::resource('almacen/graficos/categorias', 'Graficos\ReporteCategoriasController');
Route::get('almacen/graficos/informe_palabras','Graficos\ReportController@informe_palabras_buscadas');
Route::get('almacen/graficos/like','Graficos\ReportController@anuncios_like');
Route::get('almacen/graficos/deslike','Graficos\ReportController@anuncios_deslike');

Route::resource('almacen/censura','Administrador\CensuraController');

Route::resource('almacen/redsocial','Administrador\RedsocialController');
Route::resource('almacen/regiones','Administrador\RegionController');
Route::resource('almacen/cuentaeliminada','Administrador\CuentaeliminadaController');
Route::auth();

Route::get('/home', 'HomeController@index');

Route::resource('almacen/graficos/categoriasgeneral', 'Graficos\CategoriaGeneralController');
Route::resource('almacen/graficos/informeusuarios', 'Graficos\ReporteUsuariosController');



Route::resource('almacen/mensaje','Usuario\MensajeController');
Route::post("almacen/mensaje/{id}","Usuario\MensajeController@show");

