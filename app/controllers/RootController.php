<?php

class RootController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Root Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/es', 'RootController');
	|
	*/
	public $restful = true;
	protected $layout = 'layouts.home';

	public function perfilUser()
	{
		$user_login = Usuarios::whereRaw('nombre_usuario=?', [Session::get('usuario')])->get();
		$perfil = 0;
		if (count($user_login)>0)
		{
			if($user_login[0]->perfil->id_perfil == 1)
				$perfil = 1;
				
			if($user_login[0]->perfil->id_perfil == 2)
				$perfil = 2;

			if($user_login[0]->perfil->id_perfil == 3)
				$perfil = 3;
		}
		else
		{
			$perfil = 0;
		}
		return $perfil;
	}

	public function getIndex()
	{
		try
		{
			//$datos = Noticias::paginate(3);

			$datos = DB::table('noticia')->where('estado', '=', '1')->where('publicado', '=', '1')->orderBy('fecha_noticia', 'desc')->paginate(5);


			$perfil = $this->perfilUser();
			$defn = "Waslala\nTotal de mensajes enviados: 999\nComunidad: San Antonio";
			$defnhidden = "<b>Total de mensajes enviados:</b> 999<br/><b>Comunidad:</b> San Antonio";
			
			return $this->layout->content = View::make('site.inicio',compact("datos","perfil","defn","defnhidden"));
		}
		catch(Exception $e )
		{
			return Redirect::to('/error');
		}
	}
	
	public function getWaslala()
	{
		try
		{
			$perfil = $this->perfilUser();			
			$defn = "Waslala\nTotal de mensajes enviados: 999\nComunidad: San Antonio";
			$defnhidden = "<b>Total de mensajes enviados:</b> 999<br/><b>Comunidad:</b> San Antonio";
			
			return $this->layout->content = View::make('site.waslala',compact("perfil","defn","defnhidden"));
		}
		catch(Exception $e )
		{
			return Redirect::to('/error');
		}
	}
	
	public function getAbout()
	{
		try
		{
			$perfil = $this->perfilUser();
			$defn = "Waslala\nTotal de mensajes enviados: 999\nComunidad: San Antonio";
			$defnhidden = "<b>Total de mensajes enviados:</b> 999<br/><b>Comunidad:</b> San Antonio";
			
			return $this->layout->content = View::make('site.about',compact("perfil","defn","defnhidden"));
		}
		catch(Exception $e )
		{
			return Redirect::to('/error');
		}
	}
	
	public function getColaboradores()
	{
		try
		{
			$datos = Colaboradores::all();

			$perfil = $this->perfilUser();			
			$defn = "Waslala\nTotal de mensajes enviados: 999\nComunidad: San Antonio";
			$defnhidden = "<b>Total de mensajes enviados:</b> 999<br/><b>Comunidad:</b> San Antonio";
			
			return $this->layout->content = View::make('site.colaboradores',compact("perfil", "datos","defn","defnhidden"));
		}
		catch(Exception $e )
		{
			return Redirect::to('/error');
		}
	}
	
	public function postSearch()
	{
		try
		{			
			$perfil = $this->perfilUser();
			$valores = Input::All();
			$noticiapost = $valores["itemsearch"];
			
			$datos=Noticias::where('titulo','LIKE','%'.$noticiapost.'%')->get();		
			
			$defn = "Waslala\nTotal de mensajes enviados: 999\nComunidad: San Antonio";
			$defnhidden = "<b>Total de mensajes enviados:</b> 999<br/><b>Comunidad:</b> San Antonio";
			
			return $this->layout->content = View::make('site.search',compact("noticiapost","datos","perfil","defn","defnhidden"));
		}
		catch(Exception $e )
		{
			return Redirect::to('/error');
		}
	}
	
	public function getCreditos()
	{
		try
		{
			$perfil = $this->perfilUser();			
			return $this->layout->content = View::make('site.creditos',compact("perfil"));
		}
		catch(Exception $e )
		{
			return Redirect::to('/error');
		}
	}
	
	public function getAdmon()
	{
		try
		{
			$perfil = $this->perfilUser();			
			return $this->layout->content = View::make('admon.index_admon',compact("perfil"));
		}
		catch(Exception $e )
		{
			return Redirect::to('/error');
		}
	}
	
	public function getDetalle($dato=null)
	{
		try
		{
			$perfil = $this->perfilUser();
			
			$datos=Noticias::where('titulo','=',$dato)->firstOrFail();

			$multimedia = Multimedias::where('id_noticia', '=', $datos->id_noticia)->orderBy('tipo')->get();
			
			$defn = "Waslala\nTotal de mensajes enviados: 999\nComunidad: San Antonio";
			$defnhidden = "<b>Total de mensajes enviados:</b> 999<br/><b>Comunidad:</b> San Antonio";
			
			return $this->layout->content = View::make('site.detallenoticia',compact("datos","perfil","defn","defnhidden","multimedia"));
		}
		catch(Exception $e )
		{
			return Redirect::to('/error');
		}
	}
	public function getLogout()
	{
		//Auth::logout();
		Session::forget('usuario');
		return Redirect::to('/');
	}

	public function getContactus()
	{
		$perfil = $this->perfilUser();
		$defn = "Waslala\nTotal de mensajes enviados: 999\nComunidad: San Antonio";
		$defnhidden = "<b>Total de mensajes enviados:</b> 999<br/><b>Comunidad:</b> San Antonio";
		$datos = Contactos::all();

		return $this->layout->content = View::make('site.contactus', compact("perfil", "defn","defnhidden","datos"));
	}

	public function postContactus()
	{
		$inputs = Input::All();
		$validaciones = array
		(
			'fname' => 'required',
			'lname' => 'required',
			'email' => 'required|email',
			'message' => 'required'
		);		
		$mensajes = array
		(
			"required" => "Este campo no puede quedar vacio.",
			"min" => "Debe tener como minimo 5 caracteres",
			"email" => "Dirección de correo electrónico no valida"
		);			

		$validar=Validator::make($inputs,$validaciones,$mensajes);
			
		if($validar->fails())
		{
			return Redirect::back() -> withErrors($validar);			
		}else
		{	
			$cont = Contactos::all();

			if($cont != null)
			{
				$to="";
				$count = count($cont);
				$i = 0;

				foreach ($cont as $item) {
					$i++;
					if ($i == $count)
						$to .= $item->correo;
					else
						$to .= $item->correo.',';
				}

				$data = array(
			        'firstname' => $inputs['fname'],
			        'lastname' => $inputs['lname'],
			        'email' => $inputs['email'],
			        'bodyMessage' => $inputs['message']
			    );

				Mail::send('emails.contactusproject', $data, function ($message) use ($to) {

			        $message->from('infowaslala@gmail.com', 'Info Waslala');

			        $message->to(explode(',', $to))->subject('Información Proyecto Telemedicina');

			    });

			    $to = $inputs['email'];

			    Mail::send('emails.contactusclient', $data, function ($message) use ($to) {

			        $message->from('infowaslala@gmail.com', 'Info Waslala');

			        $message->to($to)->subject('Solicitud Información Proyecto Telemedicina');

			    });

				return Redirect::to("/es/contactus")->with('mensajeContactus','Correo enviado satisfactoreamente!!');		
			}else{
				return Redirect::to("/es/contactus")->with('mensajeError','No se pudo enviar el correo!!');
			}
		}
	}

	public function getSimsiv()
	{
		$perfil = $this->perfilUser();
		$defn = "Waslala\nTotal de mensajes enviados: 999\nComunidad: San Antonio";
		$defnhidden = "<b>Total de mensajes enviados:</b> 999<br/><b>Comunidad:</b> San Antonio";

		return $this->layout->content = View::make('site.simsiv', compact("perfil", "defn","defnhidden"));
	}
}
