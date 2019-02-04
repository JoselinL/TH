<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    public $timestamps = false; 
	protected $table = 'periodo';
	protected $fillable = [
       'descripcion', 'fechaInicio', 'fechaFin', 'estado',
    ];

    public function periodopersona(){
        return $this->hasMany('App\PeriodoPersona', 'id');
    }

    public function vacacionperiodo(){
        return $this->hasMany('App\VacacionPeriodo', 'id');
    }
    
}
