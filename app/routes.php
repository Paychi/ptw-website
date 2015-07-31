<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::controller('/es','RootController');
Route::controller('/login','LoginController');
Route::controller('/admin','AdmonController');
Route::controller('/adis','AdisController');
Route::controller('/colaborador','ColaboradorController');

Route::get('/', function()
{
	return Redirect::to('/es');
});

Route::get('/error', function()
{
	return View::make('error.404');
});

Route::get('/perfil', function()
{
	return View::make('error.perfildeshabilitado');
});

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function($exception)
{
	return Response::error('500');
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('login')->with('mensaje','¡Debes iniciar sesión para ver esa página!.');;
});


Route::post('Comunidad/Waslala', 'ComunidadController@Waslala');
Route::post('Comunidad/ZinicaUno', 'ComunidadController@ZinicaUno');
Route::post('Comunidad/Kaskita', 'ComunidadController@Kaskita');
Route::post('Comunidad/SanRamonLasVallas', 'ComunidadController@SanRamonLasVallas');
Route::post('Comunidad/VallasElPastal', 'ComunidadController@VallasElPastal');
Route::post('Comunidad/VallasCentral', 'ComunidadController@VallasCentral');
Route::post('Comunidad/SantaMariaKubali', 'ComunidadController@SantaMariaKubali');
Route::post('Comunidad/BuenosAiresKubali', 'ComunidadController@BuenosAiresKubali');
Route::post('Comunidad/GuayaboKubali', 'ComunidadController@GuayaboKubali');
Route::post('Comunidad/KubaiCentral', 'ComunidadController@KubaiCentral');
Route::post('Comunidad/PiedrasBlancas', 'ComunidadController@PiedrasBlancas');
Route::post('Comunidad/SectorKum', 'ComunidadController@SectorKum');
Route::post('Comunidad/LasDelicias', 'ComunidadController@LasDelicias');
Route::post('Comunidad/NaranjoArriba', 'ComunidadController@NaranjoArriba');
Route::post('Comunidad/WaslalitaNaranjo', 'ComunidadController@WaslalitaNaranjo');
Route::post('Comunidad/AguasCalientes', 'ComunidadController@AguasCalientes');
Route::post('Comunidad/ElNaranjo', 'ComunidadController@ElNaranjo');
Route::post('Comunidad/LasTorrez', 'ComunidadController@LasTorrez');
Route::post('Comunidad/LosMilagros', 'ComunidadController@LosMilagros');
Route::post('Comunidad/LasNuevesDos', 'ComunidadController@LasNuevesDos');
Route::post('Comunidad/LasNuevesUno', 'ComunidadController@LasNuevesUno');
Route::post('Comunidad/ElPijibay', 'ComunidadController@ElPijibay');
Route::post('Comunidad/ElPuyus', 'ComunidadController@ElPuyus');
Route::post('Comunidad/ElKiawa', 'ComunidadController@ElKiawa');
Route::post('Comunidad/Sofana', 'ComunidadController@Sofana');
Route::post('Comunidad/BuenosAiresDudu', 'ComunidadController@BuenosAiresDudu');
Route::post('Comunidad/Dipina', 'ComunidadController@Dipina');
Route::post('Comunidad/CanoSucio', 'ComunidadController@CanoSucio');
Route::post('Comunidad/SnAntonioYaro', 'ComunidadController@SnAntonioYaro');
Route::post('Comunidad/YaroCentral', 'ComunidadController@YaroCentral');
Route::post('Comunidad/SnJuanYaro', 'ComunidadController@SnJuanYaro');
Route::post('Comunidad/OcoteTuma', 'ComunidadController@OcoteTuma');
Route::post('Comunidad/ChileTres', 'ComunidadController@ChileTres');
Route::post('Comunidad/OcoteYaosca', 'ComunidadController@OcoteYaosca');
Route::post('Comunidad/VallasAbajo', 'ComunidadController@VallasAbajo');
Route::post('Comunidad/SnPedroLasVallas', 'ComunidadController@SnPedroLasVallas');
Route::post('Comunidad/SnRafaelKum', 'ComunidadController@SnRafaelKum');
Route::post('Comunidad/SnFranciscoPtoViejo', 'ComunidadController@SnFranciscoPtoViejo');
Route::post('Comunidad/GuayaboAbajo', 'ComunidadController@GuayaboAbajo');
Route::post('Comunidad/LaLimonera', 'ComunidadController@LaLimonera');
Route::post('Comunidad/LasJawas', 'ComunidadController@LasJawas');
Route::post('Comunidad/Kusuli', 'ComunidadController@Kusuli');
Route::post('Comunidad/SanBenito', 'ComunidadController@SanBenito');
Route::post('Comunidad/StaRosaDudu', 'ComunidadController@StaRosaDudu');
Route::post('Comunidad/ZapoteDudu', 'ComunidadController@ZapoteDudu');
Route::post('Comunidad/ArenasBlancas', 'ComunidadController@ArenasBlancas');
Route::post('Comunidad/CeibaDudu', 'ComunidadController@CeibaDudu');
Route::post('Comunidad/OcoteDudu', 'ComunidadController@OcoteDudu');
Route::post('Comunidad/SnMiguelDudu', 'ComunidadController@SnMiguelDudu');
Route::post('Comunidad/ElSombrero', 'ComunidadController@ElSombrero');
Route::post('Comunidad/SnPabloLasVallas', 'ComunidadController@SnPabloLasVallas');
Route::post('Comunidad/LasFlores', 'ComunidadController@LasFlores');
Route::post('Comunidad/LaPosolera', 'ComunidadController@LaPosolera');
Route::post('Comunidad/ElCipres', 'ComunidadController@ElCipres');
Route::post('Comunidad/HierbaBuena', 'ComunidadController@HierbaBuena');
Route::post('Comunidad/ChileUno', 'ComunidadController@ChileUno');
Route::post('Comunidad/ChileDos', 'ComunidadController@ChileDos');
Route::post('Comunidad/ElAchioteWaslala', 'ComunidadController@ElAchioteWaslala');
Route::post('Comunidad/ElCorozal', 'ComunidadController@ElCorozal');
Route::post('Comunidad/LosPotrerios', 'ComunidadController@LosPotrerios');
Route::post('Comunidad/CanoDeLosMartinez', 'ComunidadController@CanoDeLosMartinez');
Route::post('Comunidad/Waslalita', 'ComunidadController@Waslalita');
Route::post('Comunidad/CanoLaCeiba', 'ComunidadController@CanoLaCeiba');
Route::post('Comunidad/CiudadWaslala', 'ComunidadController@CiudadWaslala');
Route::post('Comunidad/PapayoDos', 'ComunidadController@PapayoDos');
Route::post('Comunidad/BarrialColorado', 'ComunidadController@BarrialColorado');
Route::post('Comunidad/ElGuabo', 'ComunidadController@ElGuabo');
Route::post('Comunidad/GuayaboArriba', 'ComunidadController@GuayaboArriba');
Route::post('Comunidad/ZinicaDos', 'ComunidadController@ZinicaDos');
Route::post('Comunidad/OcoteKubali', 'ComunidadController@OcoteKubali');
Route::post('Comunidad/ElBarillal', 'ComunidadController@ElBarillal');
Route::post('Comunidad/LosMangos', 'ComunidadController@LosMangos');
Route::post('Comunidad/PtoViejo', 'ComunidadController@PtoViejo');
Route::post('Comunidad/SanPabloKubali', 'ComunidadController@SanPabloKubali');
Route::post('Comunidad/EsperanzaKubali', 'ComunidadController@EsperanzaKubali');
Route::post('Comunidad/BocaDePiedra', 'ComunidadController@BocaDePiedra');
Route::post('Comunidad/ElGarrobo', 'ComunidadController@ElGarrobo');



/*Route::group(array('before' => 'auth'), function()
{	
	Route::controller('/admin','AdmonController');
	
	Route::get('/admin', function()
	{
		return View::make('admon.index_admon');
	});
	
	Route::get('/admin/noticias', function()
	{
		return View::make('admon.noticias');
	});
});*/
