 <?php

class ComunidadController extends BaseController {

	public function GetInfoComunidad()
	{
		$idComunidadActual = Request::input('idComunidad');

		$liderFound = \DB::table('lider')
					->join('comunidad','lider.id_comunidad','=','comunidad.id_comunidad')
					->select(['lider.nombre'])
					->where('comunidad.id_Comunidad','=',$idComunidadActual)
					->get();

		if($liderFound != null)
		{
			$comunity = \DB::table('comunidad')
					->join('lider','lider.id_comunidad','=','comunidad.id_comunidad')
					->select(['comunidad.nombreComunidad','comunidad.descripcion', 'lider.nombre'])
					->where('comunidad.id_Comunidad','=',$idComunidadActual)
					->get();							

				return  $comunity;
		}
		else{
			$comunity = \DB::table('comunidad')
					->select(['comunidad.nombreComunidad','comunidad.descripcion'])
					->where('comunidad.id_Comunidad','=',$idComunidadActual)
					->get();							

				return  $comunity;
		}
		return null;

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
