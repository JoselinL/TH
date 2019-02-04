<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeriodoPersona extends Model
{
    public $timestamps = false; 
	protected $table = 'periodoPersona';
	protected $fillable = [
       'cantidadDiasPeriodo', 'persona_id', 'periodo_id',
    ];

    public function persona(){
        return $this->hasOne('App\Persona','id','persona_id');
    }

	public function periodo(){
        return $this->hasOne('App\Periodo','id','periodo_id');
    }

}
