<?php
class Preguntas extends Eloquent
{	
	protected $table = 'pregunta';
	public $primaryKey = 'id_pregunta';
	/*protected $guarded = array("*");
	protected $fillable = array("id","titulo","estracto","descripcion","imagen","fecha_registro","fecha_modificacion","estado");*/
	
	public function usuario()
	{
		return $this->belongsTo('Usuario', 'id_usuario');
	}
}