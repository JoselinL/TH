<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marcacion extends Model
{
    public $timestamps = false; 
	protected $table = 'marcacion';
	protected $fillable = [
       'persona_id',
    ];


    public function persona(){
        return $this->hasOne('App\Persona','id','persona_id');
    }
}
