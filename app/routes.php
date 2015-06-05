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
