<?php

class AdisController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Adis Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/adis', 'AdisController');
	|
	*/
	
	public $restful = true;
	protected $layout = 'layouts.layout_adis';
	protected $mensaje = null;
	
	public function construct()
	{
		parent::construct();		
		$this->filter('before', 'auth');
	}

	public function accessRutesAdis()
	{
		/***    Validacion para el acceso a las rutas    ***/
		$access = true;
		if (Session::has('usuario'))
		{
			$session_user = Usuarios::whereRaw('nombre_usuario=?',[Session::get('usuario')])->get();

			if($session_user[0]->perfil->id_perfil != 2)
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
	
	public function getIndex()
	{
		if (!$this->accessRutesAdis())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
		
		return $this->layout->content = View::make('adis.index_adis');
	}
	
	public function getLogout()
	{
		if (!$this->accessRutesAdis())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
		
		//Auth::logout();
		Session::forget('usuario');
		return Redirect::to('login')->with('mensaje','¡Has cerrado sesión correctamente!.');
	}

	/******  Vistas de Noticias  ******/

	public function getNoticias()
	{
		if (!$this->accessRutesAdis())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
		
		if (isset($_GET["filtro"])) {
			$buscar = htmlspecialchars(Input::get('filtro'));
			$datos = Noticias::where('titulo', 'LIKE', '%'.$buscar.'%')->orwhere('estracto', 'LIKE', '%'.$buscar.'%')->paginate(5);
		} else {
			$datos = Noticias::paginate(10);
		}

		return $this->layout->content = View::make('adis.noticias',compact("datos"));
	}

	public function getAddnoticia()
	{
		if (!$this->accessRutesAdis())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
		
		return $this->layout->content = View::make('adis.addnoticia');
	}

	public function postAddnoticia()
	{
		if (!$this->accessRutesAdis())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
		
		try
		{
			//DB::beginTransaction();
			$inputs = Input::All();
			$validaciones = array
			(
				'titulo' => 'required|min:5',
				'estracto' => 'required|min:5',
				'contenido' => 'required|min:5',
				'fecha' => 'required|date',
				'archivo' => 'required'
			);		
			$mensajes = array
			(
				"required" => "Este campo no puede quedar vacio.",
				"min" => "Debe tener como minimo 5 caracteres",
				"date" => "La fecha no es valida"
			);

			

			$validar=Validator::make($inputs,$validaciones,$mensajes);
			
			if($validar->fails())
			{
				return Redirect::back() -> withErrors($validar);
				
			}else
			{	
				$fecha = $inputs["fecha"];
				$fecha = str_replace('/', '-', $fecha);
				$fecha_post = strtotime($fecha);
				$newfecha = date("Y-m-d",$fecha_post);

				$path = 'uploads/noticias';
				$file = Input::file('archivo');
				$archivo = $file->getClientOriginalName();
				
				$upload = $file->move($path,$archivo);
				
				if($upload)
				{
					$id_user = Usuarios::whereRaw('nombre_usuario=?',[Session::get('usuario')])->get();
					$n = new Noticias;
					$n->id_usuario = $id_user[0]->id_usuario;
					$n->titulo = $inputs["titulo"];
					$n->estracto = $inputs["estracto"];
					$n->descripcion = $inputs["contenido"];
					$n->imagen = $archivo;
					$n->fecha_noticia = $newfecha;
					$n->estado = 1;
					$n->save();
					Session::flash('mensaje','Registro ingresado correctamente!!');
					DB::commit();
					return Redirect::to('/adis/noticias');
				}else
				{
					Session::flash('mensaje','No se pudo subir el archivo!!');
					return Redirect::to('/adis/noticias');
				}
			}
		}
		catch(Exception $e)
		{
			DB::rollback();
			
			Session::flash('mensaje','Ocurrio un error inesperado :(<br/> Por favor contacte con el administrador del sistema.');
			return Redirect::to('/adis/noticias');
		}
	}

	public function getEditnoticia($id_noticia = null)
	{
		if (!$this->accessRutesAdis())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
		
		$datos = Noticias::find($id_noticia);
		return $this->layout->content = View::make('adis.editnoticia',compact("datos"));
	}
	
	public function postEditnoticia()
	{
		if (!$this->accessRutesAdis())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
		
		try
		{
			DB::beginTransaction();
			$inputs = Input::All();
			$validaciones = array
			(
				'titulo' => 'required|min:5',
				'estracto' => 'required|min:5',
				'contenido' => 'required|min:5',
				'fecha' => 'required|date'
			);		
			$mensajes = array
			(
				"required" => "Este campo no puede quedar vacio.",
				"min" => "Debe tener como minimo 5 caracteres",
				"date" => "La fecha no es valida"
			);
			
			$validar=Validator::make($inputs,$validaciones,$mensajes);
			
			if($validar->fails())
			{
				return Redirect::back() -> withErrors($validar);
			}else
			{		

				$fecha = $inputs["fecha"];
				$fecha = str_replace('/', '-', $fecha);
				$fecha_post = strtotime($fecha);
				$newfecha = date("Y-m-d",$fecha_post);

				$eu = Noticias::find($inputs["id"]);
				$eu->titulo = $inputs["titulo"];
				$eu->estracto = $inputs["estracto"];
				$eu->descripcion = $inputs["contenido"];
				$eu->fecha_noticia = $newfecha;
				$eu->estado = 1;
				$eu->save();
				Session::flash('mensaje','Registro editado correctamente!!');
				DB::commit();
				return Redirect::to('/adis/noticias');
			}
		}
		catch(Exception $e)
		{
			DB::rollback();
			
			Session::flash('mensaje','Ocurrio un error inesperado :(<br/> Por favor contacte con el administrador del sistema.');
			return Redirect::to('/adis/noticias');
		}
		
	}

	/******  Vistas de Colaborador  ******/

	public function getColaboradores()
	{
		if (!$this->accessRutesAdis())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
		
		if (isset($_GET["filtro"])) {
			$buscar = htmlspecialchars(Input::get('filtro'));
			$datos = Colaboradores::where('nombre', 'LIKE', '%'.$buscar.'%')->orwhere('descripcion', 'LIKE', '%'.$buscar.'%')->paginate(5);
		} else {
			$datos = Colaboradores::paginate(10);
		}

		return $this->layout->content = View::make('adis.colaboradores',compact("datos"));
	}

	public function getAddcolaborador()
	{
		if (!$this->accessRutesAdis())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
		
		return $this->layout->content = View::make('adis.addcolaborador');
	}
	
	public function postAddcolaborador()
	{
		if (!$this->accessRutesAdis())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}

		try
		{
			DB::beginTransaction();
			$inputs = Input::All();
			$validaciones = array
			(
				'nombre' => 'required|min:5',
				'descripcion' => 'required|min:5',
				'abreviatura' => 'required',
				'fecha' => 'required|date',
				'logo' => 'required'
			);		
			$mensajes = array
			(
				"required" => "Este campo no puede quedar vacio.",
				"min" => "Debe tener como minimo 5 caracteres",
				"date" => "La fecha no es valida"
			);
			
			$validar=Validator::make($inputs,$validaciones,$mensajes);
			
			if($validar->fails())
			{
				return Redirect::back() -> withErrors($validar);
				
			}else
			{		
				$fecha = $inputs["fecha"];
				$fecha = str_replace('/', '-', $fecha);
				$fecha_post = strtotime($fecha);
				$newfecha = date("Y-m-d",$fecha_post);	

				$path = 'uploads/logo_colaboradores';
				$file = Input::file('logo');
				$archivo = $file->getClientOriginalName();
				
				$upload = $file->move($path,$archivo);
				
				if($upload)
				{
					$id_user = Usuarios::whereRaw('nombre_usuario=?',[Session::get('usuario')])->get();
					$c = new Colaboradores;
					$c->id_usuario = $id_user[0]->id_usuario;
					$c->nombre = $inputs["nombre"];
					$c->abreviatura = $inputs["abreviatura"];
					$c->descripcion = $inputs["descripcion"];
					$c->logo = $archivo;
					$c->sitio_web = $inputs["website"];
					$c->fecha_colaborador = $newfecha;
					$c->estado = 1;
					$c->save();
					Session::flash('mensaje','Registro ingresado correctamente!!');
					DB::commit();
					return Redirect::to('/adis/colaboradores');
				}else
				{
					Session::flash('mensaje','No se pudo subir el archivo!!');
					return Redirect::to('/adis/colaboradores');
				}
			}
		}
		catch(Exception $e)
		{
			DB::rollback();
			
			Session::flash('mensaje','Ocurrio un error inesperado :(<br/> Por favor contacte con el administrador del sistema.');
			return Redirect::to('/adis/colaboradores');
		}
	}

	/***   Vista Configuracion para los banners   ***/	
	
	public function getConfbanners()
	{
		if (!$this->accessRutesAdis())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
		
		return $this->layout->content = View::make('adis.banners');
	}
	
	public function postConfbanners()
	{
		if (!$this->accessRutesAdis())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
			
		try
		{		
			$inputs = Input::All();		
			$path = 'uploads/header_site';
			$file = $inputs["imagen_banner"];
			$nombre_file = $inputs["nombre_banner"];

			if ($file != null) {
				$extencion = $file->getClientOriginalExtension();
				$tamano = $file->getSize();
				$imagen_banner = $file->getClientOriginalName();
				
				//$imp= 'nada';
				if($extencion == "png" || $extencion == "jpg" || $extencion == "PNG" || $extencion == "JPG")
				{
					$upload = $file->move($path,$nombre_file);
					if($upload)
					{
						//$imp= '<br /> nombre: '.$imagen_banner.'<br /> tamano: '.$tamano.'<br /> extencion: '.$extencion;
						Session::flash('mensaje','Registro actualizado correctamente!!<br /> sino se muestra la nueva imagen recarge la pagina. Gracias!');
						return Redirect::to('/adis/confbanners');
					}
					else
					{
						Session::flash('mensaje','Error al subir el archivo');
						return Redirect::to('/adis/confbanners');
					}				
				}
				else
				{
					Session::flash('mensaje','Formato Invalido');
					return Redirect::to('/adis/confbanners');
				}
			} else {
				return Redirect::to('/adis/confbanners')->with('mensaje', 'El Archivo es Requerido');
			}							
		}
		catch(Exception $e)
		{			
			Session::flash('mensaje','Ocurrio un error inesperado :(<br/> Por favor contacte con el administrador del sistema.');
			return Redirect::to('/adis/confbanners');
		}
	}

		
	public function getEventos()
	{
		if (!$this->accessRutesAdis())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
		
		return $this->layout->content = View::make('adis.eventos');
	}
}
