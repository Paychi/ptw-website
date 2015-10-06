<?php

class ColaboradorController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Colaborador Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/colaborador', 'ColaboradorController');
	|
	*/
	
	public $restful = true;
	protected $layout = 'layouts.layout_colaborador';
	protected $mensaje = null;

	public function accessRutesColaborador()
	{
		/***    Validacion para el acceso a las rutas    ***/
		$access = true;
		if (Session::has('usuario'))
		{
			$session_user = Usuarios::whereRaw('nombre_usuario=?',[Session::get('usuario')])->get();

			if($session_user[0]->perfil->id_perfil != 3)
			{
				$access = false;
				$this->mensaje = '¡No tiene permiso para acceder a esta página!.';
			}
		}
		else
		{
			$access = false;
			$this->mensaje = '¡Debes iniciar sesión para ver esa página!.';			
		}
		/*******     Fin     *******/
		return $access;
	}

	public function idcolaborador()
	{
		$session_user = Usuarios::whereRaw('nombre_usuario=?',[Session::get('usuario')])->get();
		return $session_user[0]->id_colaborador;
	}
	
	public function getIndex()
	{		
		if (!$this->accessRutesColaborador())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}

		return $this->layout->content = View::make('colaborador.index_colaborador');
	}
	
	public function getLogout()
	{
		if (!$this->accessRutesColaborador())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
		
		//Auth::logout();
		Session::forget('usuario');
		return Redirect::to('login')->with('mensaje','¡Has cerrado sesión correctamente!.');
	}

	public function getAjustes()
	{
		if (!$this->accessRutesColaborador())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}

		$colaborador = Colaboradores::find($this->idcolaborador());

		return $this->layout->content = View::make('colaborador.ajustes', compact("colaborador"));
	}

	public function postCambionombre()
	{
		if (!$this->accessRutesColaborador())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}

		try {
			$inputs = Input::all();
			$validaciones = array
			(
				'nombre' => 'required|min:5'
			);		
			$mensajes = array
			(
				"required" => "Este campo no puede quedar vacio.",
				"min" => "Debe tener como minimo 5 caracteres"
			);		

			$validar=Validator::make($inputs,$validaciones,$mensajes);
			
			if($validar->fails())
			{
				return Redirect::back() -> withErrors($validar);
				
			}else
			{
				$editcol = Colaboradores::find($this->idcolaborador());
				$editcol->nombre = $inputs["nombre"];
				$editcol->save();
				Session::flash('mensajeNombre','Registro editado correctamente!!');
				DB::commit();
				return Redirect::to('/colaborador/ajustes');
			}
		} catch (Exception $e) {
			DB::rollback();
			
			Session::flash('mensajeError','Ocurrio un error inesperado :(<br/> Por favor contacte con el administrador del sistema.');
			return Redirect::to('/colaborador/ajustes');
		}		
	}

	public function postCambiodescripcion()
	{
		if (!$this->accessRutesColaborador())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}

		try {
			$inputs = Input::all();
			$validaciones = array
			(
				'descripcion' => 'required|min:5'
			);		
			$mensajes = array
			(
				"required" => "Este campo no puede quedar vacio.",
				"min" => "Debe tener como minimo 5 caracteres"
			);		

			$validar=Validator::make($inputs,$validaciones,$mensajes);
			
			if($validar->fails())
			{
				return Redirect::back() -> withErrors($validar);
				
			}else
			{
				$editcol = Colaboradores::find($this->idcolaborador());
				$editcol->descripcion = $inputs["descripcion"];
				$editcol->save();
				Session::flash('mensajeDescripcion','Registro editado correctamente!!');
				DB::commit();
				return Redirect::to('/colaborador/ajustes');
			}
		} catch (Exception $e) {
			DB::rollback();
			
			Session::flash('mensajeError','Ocurrio un error inesperado :(<br/> Por favor contacte con el administrador del sistema.');
			return Redirect::to('/colaborador/ajustes');
		}		
	}

	public function postCambiologo()
	{
		if (!$this->accessRutesColaborador())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}

		try {
			$inputs = Input::all();	
			$validaciones = array
			(
				'imagen_logo' => 'required'
			);		
			$mensajes = array
			(
				"required" => "Este campo no puede quedar vacio."
			);			

			$validar=Validator::make($inputs,$validaciones,$mensajes);
			
			if($validar->fails())
			{
				return Redirect::back() -> withErrors($validar);
				
			}else
			{	
				$editcol = Colaboradores::find($this->idcolaborador());
				$path = 'uploads/logo_colaboradores';
				$file = Input::file('imagen_logo');
				$archivo = $editcol->logo;
				$extencion = $file->getClientOriginalExtension();

				if($extencion == "png" || $extencion == "jpg" || $extencion == "PNG" || $extencion == "JPG")
				{
					$upload = $file->move($path,$archivo);

					if($upload)
					{
						$editcol->logo = $archivo;
						$editcol->save();
						Session::flash('mensajeLogo','Registro editado correctamente!!<br /> sino se muestra la nueva imagen recarge la pagina. Gracias!');
						DB::commit();
						return Redirect::to('/colaborador/ajustes');
					}else{
						Session::flash('mensajeLogoError','No se pudo subir el archivo!!');
						return Redirect::to('/colaborador/ajustes');
					}
				}
				else{
					Session::flash('mensajeLogoError','Formato Invalido');
					return Redirect::to('/colaborador/ajustes');
				}				
			}
		} catch (Exception $e) {
			DB::rollback();
			
			Session::flash('mensajeError','Ocurrio un error inesperado :(<br/> Por favor contacte con el administrador del sistema.');
			return Redirect::to('/colaborador/ajustes');
		}		
	}

	public function postCambiowebsite()
	{
		if (!$this->accessRutesColaborador())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}

		try {
			$inputs = Input::all();
			$validaciones = array
			(
				'website' => 'required|min:5'
			);		
			$mensajes = array
			(
				"required" => "Este campo no puede quedar vacio.",
				"min" => "Debe tener como minimo 5 caracteres"
			);		

			$validar=Validator::make($inputs,$validaciones,$mensajes);
			
			if($validar->fails())
			{
				return Redirect::back() -> withErrors($validar);
				
			}else
			{
				$editcol = Colaboradores::find($this->idcolaborador());
				$editcol->sitio_web = $inputs["website"];
				$editcol->save();
				Session::flash('mensajeWebsite','Registro editado correctamente!!');
				DB::commit();
				return Redirect::to('/colaborador/ajustes');
			}
		} catch (Exception $e) {
			DB::rollback();
			
			Session::flash('mensajeError','Ocurrio un error inesperado :(<br/> Por favor contacte con el administrador del sistema.');
			return Redirect::to('/colaborador/ajustes');
		}			
	}

	public function postCambioabreviatura()
	{
		if (!$this->accessRutesColaborador())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}

		try {
			$inputs = Input::all();
			$validaciones = array
			(
				'abreviatura' => 'required'
			);		
			$mensajes = array
			(
				"required" => "Este campo no puede quedar vacio."
			);		

			$validar=Validator::make($inputs,$validaciones,$mensajes);
			
			if($validar->fails())
			{
				return Redirect::back() -> withErrors($validar);
				
			}else
			{
				$editcol = Colaboradores::find($this->idcolaborador());
				$editcol->abreviatura = $inputs["abreviatura"];

				$editcol->save();
				Session::flash('mensajeAbreviatura','Registro editado correctamente!!');
				DB::commit();
				return Redirect::to('/colaborador/ajustes');
			}
		} catch (Exception $e) {
			DB::rollback();
			
			Session::flash('mensajeError','Ocurrio un error inesperado :(<br/> Por favor contacte con el administrador del sistema.');
			return Redirect::to('/colaborador/ajustes');
		}		
	}
}
