<?php
class Colaboradores extends Eloquent
{	
	protected $table = 'colaborador';
	public $primaryKey = 'id_colaborador';
	/*protected $guarded = array("*");
	protected $fillable = array("id","titulo","estracto","descripcion","imagen","fecha_registro","fecha_modificacion","estado");*/
	
	public function colaborador()
	{
		return $this->belongsTo('Usuario', 'id_usuario');
	}
}
