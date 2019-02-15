<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeriodoPersona extends Model
{
    public $timestamps = false; 
	protected $table = 'periodoPersona';
	protected $fillable = [
       'cantidadDiasPeriodo', 'user_id', 'periodo_id',
    ];

    public function usuario(){
        return $this->hasOne('App\User','id','user_id');
    }

	public function periodo(){
        return $this->hasOne('App\Periodo','id','periodo_id');
    }

}
