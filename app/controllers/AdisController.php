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
			$datos = Noticias::where('titulo', 'LIKE', '%'.$buscar.'%')->orwhere('estracto', 'LIKE', '%'.$buscar.'%')->paginate(10);
		} else {
			$datos = Noticias::orderBy('created_at', 'desc')->paginate(10);
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
					Session::flash('mensajeError','No se pudo subir el archivo!!');
					return Redirect::to('/adis/noticias');
				}
			}
		}
		catch(Exception $e)
		{
			DB::rollback();
			
			Session::flash('mensajeError','Ocurrio un error inesperado :(<br/> Por favor contacte con el administrador del sistema.');
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
			
			Session::flash('mensajeError','Ocurrio un error inesperado :(<br/> Por favor contacte con el administrador del sistema.');
			return Redirect::to('/adis/noticias');
		}
		
	}

	public function postPublishnoticia()
	{
		if (!$this->accessRutesAdis())
		{
			echo "/login";
			echo "*";
			echo $this->mensaje;
			echo "*";
			echo "error";
			exit();	
		}

		try
		{
			DB::beginTransaction();
			$inputs = Input::All();
			$validaciones = array
			(
				'paramidnew' => 'numeric'
			);		
			$mensajes = array
			(
				"numeric" => "Valor Invalido."
			);
			
			$validar=Validator::make($inputs,$validaciones,$mensajes);
			
			if($validar->fails())
			{
				return Redirect::back() -> withErrors($validar);
			}else
			{	
				$eu = Noticias::find($inputs["paramidnew"]);
				$eu->publicado = 1;
				$eu->save();				
				echo "/adis/noticias";
				echo "*";
				echo "La noticia ha sido publicada correctamente!!";
				echo "*";
				echo "done";
				DB::commit();
				exit();
			}
		}
		catch(Exception $e)
		{
			DB::rollback();

			echo "/adis/noticias";
			echo "*";
			echo "Ocurrio un error inesperado :(<br/> Por favor contacte con el administrador del sistema.";
			echo "*";
			echo "error";
			exit();	
		}
	}

	public function postUnpublishnoticia()
	{
		if (!$this->accessRutesAdis())
		{
			echo "/login";
			echo "*";
			echo $this->mensaje;
			echo "*";
			echo "error";
			exit();
		}

		try
		{
			DB::beginTransaction();
			$inputs = Input::All();
			$validaciones = array
			(
				'paramidnew' => 'numeric'
			);		
			$mensajes = array
			(
				"numeric" => "Valor Invalido."
			);
			
			$validar=Validator::make($inputs,$validaciones,$mensajes);
			
			if($validar->fails())
			{
				return Redirect::back() -> withErrors($validar);
			}else
			{	
				$eu = Noticias::find($inputs["paramidnew"]);
				$eu->publicado = 0;
				$eu->save();				
				echo "/adis/noticias";
				echo "*";
				echo "La noticia ha sido ocultada correctamente!!";
				echo "*";
				echo "done";
				DB::commit();
				exit();
			}
		}
		catch(Exception $e)
		{
			DB::rollback();
			
			echo "/adis/noticias";
			echo "*";
			echo "Ocurrio un error inesperado :(<br/> Por favor contacte con el administrador del sistema.";
			echo "*";
			echo "error";
			exit();	
		}
	}

	public function getUpload($id_noticia = null)
	{
		if (!$this->accessRutesAdis())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
		
		//$datos = Preguntas::find($id_noticia);
		return $this->layout->content = View::make('adis.upload',compact("id_noticia"));
		//return $this->layout->content = View::make('admon.upload');
	}

	public function postUploads()
	{
		if (!$this->accessRutesAdis())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}

		try {

			$file_imagen = Request::file('imagen');
			$file_video = Request::file('video');
			$id_noticia = Request::input('id');
			$d_imagen = Request::input('descriptionimagen');
			$d_video = Request::input('descriptionvideo');

			$path_imagen = 'uploads/noticias/imagenes';
			$path_video = 'uploads/noticias/videos';

			if ($file_imagen != null && $file_video != null){
				$extencion_imagen = $file_imagen->getClientOriginalExtension();
				$extencion_video = $file_video->getClientOriginalExtension();
				
				if($extencion_imagen == "png" || $extencion_imagen == "jpg" || $extencion_imagen == "PNG" || $extencion_imagen == "JPG")
				{
					if($extencion_video == "mp4" || $extencion_video == "avi" || $extencion_video == "MP4" || $extencion_video == "AVI")
					{
						
					}else{
						return Redirect::back()->with('mensajeError','Formato del video invalido!!');
					}
				}
				else{
					return Redirect::back()->with('mensajeError','Formato de la imagen invalido!!');
				}

				$archivo_imagen = $file_imagen->getClientOriginalName();
				$upload = $file_imagen->move($path_imagen,$archivo_imagen);				
				if($upload)
				{
					$m = new Multimedias;
					$m->id_noticia = $id_noticia;
					$m->tipo = "imagen";
					$m->archivo = $archivo_imagen;
					$m->descripcion = $d_imagen;
					$m->save();
					//DB::commit();
				}else
				{
					DB::rollback();
					return Redirect::back()->with('mensajeError','No se pudo subir la imagen!!');
				}

				$archivo_video = $file_video->getClientOriginalName();
				$upload = $file_video->move($path_video,$archivo_video);				
				if($upload)
				{					
					$m = new Multimedias;
					$m->id_noticia = $id_noticia;
					$m->tipo = "video";
					$m->archivo = $archivo_video;
					$m->descripcion = $d_video;
					$m->save();
					//DB::commit();
				}else
				{
					DB::rollback();
					return Redirect::back()->with('mensajeError','No se pudo subir el video!!');
				}

				DB::commit();
				Session::flash('mensaje','Registros ingresados correctamente!!');
				return Redirect::to('/adis/noticias');
				
			}else{
				if ($file_imagen != null) {
					$extencion_imagen = $file_imagen->getClientOriginalExtension();
					
					if($extencion_imagen == "png" || $extencion_imagen == "jpg" || $extencion_imagen == "PNG" || $extencion_imagen == "JPG")
					{
						
					}else{
						return Redirect::back()->with('mensajeError','Formato de la imagen invalido!!');
					}

					$archivo_imagen = $file_imagen->getClientOriginalName();
					$upload = $file_imagen->move($path_imagen,$archivo_imagen);				
					if($upload)
					{
						$m = new Multimedias;
						$m->id_noticia = $id_noticia;
						$m->tipo = "imagen";
						$m->archivo = $archivo_imagen;
						$m->descripcion = $d_imagen;
						$m->save();
						DB::commit();
						Session::flash('mensaje','Registro ingresado correctamente!!');
						return Redirect::to('/adis/noticias');
					}else
					{
						DB::rollback();
						return Redirect::back()->with('mensajeError','No se pudo subir la imagen!!');
					}
				}
				else{
					if($file_video != null)
					{
						$extencion_video = $file_video->getClientOriginalExtension();
						
						if($extencion_video == "mp4" || $extencion_video == "avi" || $extencion_video == "MP4" || $extencion_video == "AVI")
						{
							
						}
						else{
							return Redirect::back()->with('mensajeError','Formato del video invalido!!');
						}

						$archivo_video = $file_video->getClientOriginalName();
						$upload = $file_video->move($path_video,$archivo_video);				
						if($upload)
						{					
							$m = new Multimedias;
							$m->id_noticia = $id_noticia;
							$m->tipo = "video";
							$m->archivo = $archivo_video;
							$m->descripcion = $d_video;
							$m->save();
							DB::commit();
							Session::flash('mensaje','Registro ingresado correctamente!!');
							return Redirect::to('/adis/noticias');
						}else
						{
							DB::rollback();
							return Redirect::back()->with('mensajeError','No se pudo subir el video!!');
						}
					}
					else{
						return Redirect::back()->with('mensajeError', 'No hay datos cargados, favor cargue una imagen o video');
					}
				}
			}

		} catch (Exception $e) {
			DB::rollback();
			return Redirect::back()->with('mensajeError', 'Ocurrio un error inesperado :(<br/> Por favor contacte con el administrador del sistema.');
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
						Session::flash('mensajeError','Error al subir el archivo');
						return Redirect::to('/adis/confbanners');
					}				
				}
				else
				{
					Session::flash('mensajeError','Formato Invalido');
					return Redirect::to('/adis/confbanners');
				}
			} else {
				return Redirect::to('/adis/confbanners')->with('mensajeError', 'El Archivo es Requerido');
			}							
		}
		catch(Exception $e)
		{			
			Session::flash('mensajeError','Ocurrio un error inesperado :(<br/> Por favor contacte con el administrador del sistema.');
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

	/**************************************SECCIÓN LÍDERES Y COMUNIDADES*************************************/

	/********Líderes********/
	public function getLideres()
	{
		if (!$this->accessRutesAdis())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}

		if (isset($_GET["filtro"])) {
			$buscar = htmlspecialchars(Input::get('filtro'));
			$tipo = htmlspecialchars(Input::get('tipo'));

			switch ($tipo) {
				case 0: //Nombre
					$datos = Lideres::where('nombre', 'LIKE', '%'.$buscar.'%')->paginate(5);
					break;

				case 1: //Comunidad
					$comunidad = Comunidades::where('nombreComunidad', '=', $buscar)->get();
					if ($comunidad->count() == 0) {
						$datos = Comunidades::where('id_comunidad', '=', null)->paginate(5);
					}else{
						$datos = Comunidades::where('id_comunidad', '=', $perfil[0]->id_perfil)->paginate(5);
					}

				default:
					
					break;
			}
		} else {
			$datos = Lideres::paginate(10);
		}
	
		return $this->layout->content = View::make('adis.lideres',compact("datos"));
	}

	public function getAddlider()
	{
		if (!$this->accessRutesAdis())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
		
		$perfiles = Perfiles::whereRaw('estado=1')->lists('nombre', 'id_perfil');	
		$colaboradores = Colaboradores::lists('abreviatura', 'id_colaborador');	
		$lista_perfil = array(0 => "--- Seleccione --- ") + $perfiles;
		$lista_colaboradores = array(0 => "--- Seleccione --- ") + $colaboradores;
		$selected = array();

		$comunidades = Comunidades::whereRaw('id_comunidad>0')->lists('nombreComunidad', 'id_comunidad');			
		$lista_comunidad = array(0 => "--- Seleccione --- ") + $comunidades;

		$item_selected = array();	
		return $this->layout->content = View::make('adis.addlider',compact("lista_comunidad","selected","lista_colaboradores","item_selected"));
	}
	
	public function getEditlider($id_lider = null)
	{
		if (!$this->accessRutesAdis())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
		
		$datos = Lideres::find($id_lider);

		$comunidades = Comunidades::whereRaw('id_comunidad>0')->lists('nombreComunidad', 'id_comunidad');			
		$lista_comunidad = array(0 => "--- Seleccione --- ") + $comunidades;
		$selected = array($datos->id_comunidad);

		return $this->layout->content = View::make('adis.editlider',compact("datos","lista_comunidad","selected"));
	}
	
	public function postEditlider()
	{
		if (!$this->accessRutesAdis())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
		
		$inputs = Input::All();
		$validaciones = array
		(
			'nombre' => 'required|min:5'
		);		
		$mensajes = array
		(
			"required" => "Este campo no puede quedar vacio.",
			"min" => "Debe tener como minimo 5 caracteres",
			"unique" => "Lider ya existe"
		);
		//echo $inputs["colaborador"]; exit;
		$validar=Validator::make($inputs,$validaciones,$mensajes);
		
		if($validar->fails())
		{
			return Redirect::back() -> withErrors($validar);
		}else
		{			
			$nombreLider = $inputs["nombre"];

			if ($nombreLider != "")
			{
				$eu = Lideres::find($inputs["id"]);

				$eu->nombre = $inputs["nombre"];
				$eu->id_comunidad = $inputs["comunidad"];


				$eu->estado = 1;
				$eu->save();
				
				Session::flash('mensaje','Registro editado correctamente!!');
				return Redirect::to('/adis/lideres');
				
			}
			else
			{
				return Redirect::to('/adis/editlider/'.$inputs["id"] )->with('mensajeError','Perfil no Valido!!');	
			}			
		}
	}
	
	public function postAddlideres()
	{
		if (!$this->accessRutesAdis())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
		
		$inputs = Input::All();		
		$validaciones = array
		(
			'nombre' => 'required|min:5'
		);		
		$mensajes = array
		(
			"required" => "Este campo no puede quedar vacio.",
			"min" => "Debe tener como minimo 5 caracteres",
			"unique" => "Lider ya existe"
		);
		
		$validar=Validator::make($inputs,$validaciones,$mensajes);
		
		if($validar->fails())
		{
			return Redirect::back() -> withErrors($validar);
		}else
		{			
			$campoNombre = $inputs["nombre"];
			
			if ($campoNombre != "")
			{
			
				$nu = new Lideres;
				$nu->nombre = $inputs["nombre"];
				$nu->id_comunidad = $inputs["comunidad"];

				$nu->estado = 1;

				$nu->save();
				Session::flash('mensaje','Registro ingresado correctamente!!');
				return Redirect::to('/adis/lideres');	
				//}					
			}
			else
			{
				return Redirect::to('/adis/addlider')->with('mensajeError','Seleccione un Perfil!!');	
			}
		}
	}
	
	public function getDeletelider($id_lider = null)
	{		
		if (!$this->accessRutesAdis())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
		
		$du = Lideres::find($id_lider);
		$du -> delete();
		Session::flash('mensaje','Registro eliminado correctamente!!');
		return Redirect::to('/adis/lideres');	
	}








	/********Comunidades********/
	public function getComunidades()
	{
		if (!$this->accessRutesAdis())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}

		if (isset($_GET["filtro"])) {
			$buscar = htmlspecialchars(Input::get('filtro'));
			$tipo = htmlspecialchars(Input::get('tipo'));

			switch ($tipo) {
				case 0: //Nombre
					$datos = Comunidades::where('nombreComunidad', 'LIKE', '%'.$buscar.'%')->paginate(5);
					break;

				default:
					
					break;
			}
		} else {
			$datos = Comunidades::paginate(10);
		}
	
		return $this->layout->content = View::make('adis.comunidades',compact("datos"));
	}

	public function getAddcomunidad()
	{
		if (!$this->accessRutesAdis())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
		
		$perfiles = Perfiles::whereRaw('estado=1')->lists('nombre', 'id_perfil');	
		$colaboradores = Colaboradores::lists('abreviatura', 'id_colaborador');	
		$lista_perfil = array(0 => "--- Seleccione --- ") + $perfiles;
		$lista_colaboradores = array(0 => "--- Seleccione --- ") + $colaboradores;
		$selected = array();
		$item_selected = array();	
		return $this->layout->content = View::make('adis.addcomunidad',compact("lista_perfil","selected","lista_colaboradores","item_selected"));
	}
	
	public function getEditcomunidad($id_comunidad = null)
	{
		if (!$this->accessRutesAdis())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
		
		$datos = Comunidades::find($id_comunidad);

		return $this->layout->content = View::make('adis.editcomunidad',compact("datos"));
	}
	
	public function postEditcomunidad()
	{
		if (!$this->accessRutesAdis())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
		
		$inputs = Input::All();
		$validaciones = array
		(
			'nombreComunidad' => 'required|min:5'
		);		
		$mensajes = array
		(
			"required" => "Este campo no puede quedar vacio.",
			"min" => "Debe tener como minimo 5 caracteres",
			"unique" => "Comunidad ya existe"
		);
		//echo $inputs["colaborador"]; exit;
		$validar=Validator::make($inputs,$validaciones,$mensajes);
		
		if($validar->fails())
		{
			return Redirect::back() -> withErrors($validar);
		}else
		{			
			$nombreComunidad = $inputs["nombreComunidad"];

			if ($nombreComunidad != "")
			{
				$eu = Comunidades::find($inputs["id"]);

				$eu->nombreComunidad = $inputs["nombreComunidad"];
				$eu->codigo_comunidad = $inputs["codigo_comunidad"];
				$eu->descripcion = $inputs["descripcion"];
				
				$eu->save();
				
				Session::flash('mensaje','Registro editado correctamente!!');
				return Redirect::to('/adis/comunidades');
				
			}
			else
			{
				return Redirect::to('/adis/editcomunidad/'.$inputs["id"] )->with('mensajeError','Perfil no Valido!!');	
			}			
		}
	}
	
	public function postAddcomunidades()
	{
		if (!$this->accessRutesAdis())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
		
		$inputs = Input::All();		
		$validaciones = array
		(
			'nombreComunidad' => 'required|min:5'
		);		
		$mensajes = array
		(
			"required" => "Este campo no puede quedar vacio.",
			"min" => "Debe tener como minimo 5 caracteres",
			"unique" => "Comunidad ya existe"
		);
		
		$validar=Validator::make($inputs,$validaciones,$mensajes);
		
		if($validar->fails())
		{
			return Redirect::back() -> withErrors($validar);
		}else
		{			
			$campoNombre = $inputs["nombreComunidad"];
			
			if ($campoNombre != "")
			{
			
				$nu = new Comunidades;
				$nu->nombreComunidad = $inputs["nombreComunidad"];
				$nu->codigo_comunidad = $inputs["codigo_comunidad"];
				$nu->descripcion = $inputs["descripcion"];


				$nu->save();
				Session::flash('mensaje','Registro ingresado correctamente!!');
				return Redirect::to('/adis/comunidades');	
				//}					
			}
			else
			{
				return Redirect::to('/adis/addcomunidad')->with('mensajeError','Seleccione un Perfil!!');	
			}
		}
	}
	
	public function getDeletecomunidad($id_comunidad = null)
	{		
		if (!$this->accessRutesAdis())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
		
		$du = Comunidades::find($id_comunidad);
		$du -> delete();
		Session::flash('mensaje','Registro eliminado correctamente!!');
		return Redirect::to('/adis/comunidades');	
	}
}
