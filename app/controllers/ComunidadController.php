 <?php

class ComunidadController extends BaseController {

	public function Waslala()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',1)
					->get();


		return $comunity;
	}


	public function ZinicaUno()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',2)
					->get();


		return $comunity;
	}


	public function Kaskita()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',3)
					->get();


		return $comunity;
	}

	public function SanRamonLasVallas()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',4)
					->get();


		return $comunity;
	}

	public function VallasElPastal()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',5)
					->get();


		return $comunity;
	}

	public function VallasCentral()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',6)
					->get();


		return $comunity;
	}


	public function SantaMariaKubali()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',7)
					->get();


		return $comunity;
	}

	public function BuenosAiresKubali()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',8)
					->get();


		return $comunity;
	}

	public function GuayaboKubali()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',9)
					->get();


		return $comunity;
	}

	public function KubaiCentral()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',10)
					->get();


		return $comunity;
	}

	public function PiedrasBlancas()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',11)
					->get();


		return $comunity;
	}

	public function SectorKum()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',12)
					->get();


		return $comunity;
	}

	public function LasDelicias()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',13)
					->get();


		return $comunity;
	}

	public function NaranjoArriba()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',14)
					->get();


		return $comunity;
	}

	public function WaslalitaNaranjo()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',15)
					->get();


		return $comunity;
	}

	public function AguasCalientes()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',16)
					->get();


		return $comunity;
	}

	public function ElNaranjo()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',17)
					->get();


		return $comunity;
	}

	public function LasTorrez()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',18)
					->get();


		return $comunity;
	}

	public function LosMilagros()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',19)
					->get();


		return $comunity;
	}

	public function LasNuevesDos()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',20)
					->get();


		return $comunity;
	}

	public function LasNuevesUno()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',21)
					->get();


		return $comunity;
	}

	public function ElPijibay()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',22)
					->get();


		return $comunity;
	}

	public function ElPuyus()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',23)
					->get();


		return $comunity;
	}

	public function ElKiawa()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',24)
					->get();


		return $comunity;
	}

	public function Sofana()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',25)
					->get();


		return $comunity;
	}

	public function BuenosAiresDudu()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',26)
					->get();


		return $comunity;
	}

	public function Dipina()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',27)
					->get();


		return $comunity;
	}

	public function CanoSucio()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',28)
					->get();


		return $comunity;
	}

	public function SnAntonioYaro()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',29)
					->get();


		return $comunity;
	}

	public function YaroCentral()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',30)
					->get();


		return $comunity;
	}

	public function SnJuanYaro()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',31)
					->get();


		return $comunity;
	}

	public function OcoteTuma()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',32)
					->get();


		return $comunity;
	}

	public function ChileTres()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',33)
					->get();


		return $comunity;
	}

	public function OcoteYaosca()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',34)
					->get();


		return $comunity;
	}

	public function VallasAbajo()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',35)
					->get();


		return $comunity;
	}

	public function SnPedroLasVallas()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',36)
					->get();


		return $comunity;
	}

	public function SnRafaelKum()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',37)
					->get();


		return $comunity;
	}

	public function SnFranciscoPtoViejo()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',38)
					->get();


		return $comunity;
	}

	public function GuayaboAbajo()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',39)
					->get();


		return $comunity;
	}

	public function LaLimonera()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',40)
					->get();


		return $comunity;
	}

	public function LasJawas()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',41)
					->get();


		return $comunity;
	}

	public function Kusuli()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',42)
					->get();


		return $comunity;
	}

	public function SanBenito()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',43)
					->get();


		return $comunity;
	}

	public function StaRosaDudu()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',44)
					->get();


		return $comunity;
	}

	public function ZapoteDudu()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',45)
					->get();


		return $comunity;
	}

	public function ArenasBlancas()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',46)
					->get();


		return $comunity;
	}

	public function CeibaDudu()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',47)
					->get();


		return $comunity;
	}

	public function OcoteDudu()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',48)
					->get();


		return $comunity;
	}

	public function SnMiguelDudu()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',49)
					->get();


		return $comunity;
	}

	public function ElSombrero()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',50)
					->get();


		return $comunity;
	}

	public function SnPabloLasVallas()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',51)
					->get();


		return $comunity;
	}

	public function LasFlores()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',52)
					->get();


		return $comunity;
	}

	public function LaPosolera()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',53)
					->get();


		return $comunity;
	}

	public function ElCipres()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',54)
					->get();


		return $comunity;
	}

	public function HierbaBuena()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',55)
					->get();


		return $comunity;
	}

	public function ChileUno()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',56)
					->get();


		return $comunity;
	}

	public function ChileDos()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',57)
					->get();


		return $comunity;
	}

	public function ElAchioteWaslala()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',58)
					->get();


		return $comunity;
	}

	public function ElCorozal()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',59)
					->get();


		return $comunity;
	}

	public function LosPotrerios()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',60)
					->get();


		return $comunity;
	}

	public function CanoDeLosMartinez()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',61)
					->get();


		return $comunity;
	}

	public function Waslalita()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',62)
					->get();


		return $comunity;
	}

	public function CanoLaCeiba()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',63)
					->get();


		return $comunity;
	}

	public function CiudadWaslala()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',64)
					->get();


		return $comunity;
	}

	public function PapayoDos()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',65)
					->get();


		return $comunity;
	}

	public function BarrialColorado()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',66)
					->get();


		return $comunity;
	}

	public function ElGuabo()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',67)
					->get();


		return $comunity;
	}

	public function GuayaboArriba()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',68)
					->get();


		return $comunity;
	}

	public function ZinicaDos()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',69)
					->get();


		return $comunity;
	}

	public function OcoteKubali()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',70)
					->get();


		return $comunity;
	}

	public function ElBarillal()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',71)
					->get();


		return $comunity;
	}

	public function LosMangos()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',72)
					->get();


		return $comunity;
	}

	public function PtoViejo()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',73)
					->get();


		return $comunity;
	}

	public function SanPabloKubali()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',74)
					->get();


		return $comunity;
	}

	public function EsperanzaKubali()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',75)
					->get();


		return $comunity;
	}

	public function BocaDePiedra()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',76)
					->get();


		return $comunity;
	}

	public function ElGarrobo()
	{
		$comunity = \DB::table('comunidad')
					->select(['nombreComunidad','descripcion'])
					->where('comunidad.id_Comunidad','=',77)
					->get();


		return $comunity;
	}

}