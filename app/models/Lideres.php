<?php
class Lideres extends Eloquent
{	
	protected $table = 'lider';
	public $primaryKey = 'id_lider';

	public function comunidad()
	{
		return $this->belongsTo('Comunidades', 'id_comunidad');
	}
}