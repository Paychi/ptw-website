 <?php

class ComunidadController extends BaseController {

	public function GetInfoComunidad()
	{
		$idComunidadActual = Request::input('idComunidad');

		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',$idComunidadActual)
					->get();		

		return  $comunity;
	}

	public function ImagenesAMostrar()
	{
		$lider = \DB::table('lider')
					->select(['id_comunidad'])
					->where('lider.estado','=',1)
					->get();	

		return $lider;
	}
}
