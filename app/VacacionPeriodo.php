<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VacacionPeriodo extends Model
{
    public $timestamps = false; 
	protected $table = 'vacacionPeriodo';
	protected $fillable = [
       'cantidad', 'vacacion_id', 'periodo_id',
    ];

    public function vacacion(){
        return $this->hasOne('App\Vacacion','id','vacacion_id')->with('usuario');
    }

	public function periodo(){
        return $this->hasOne('App\Periodo','id','periodo_id');
    }

}
