<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    public $timestamps = false; 
	protected $table = 'tipoUsuario';
	protected $fillable = [
       'tipo',
    ];

    public function usuario(){
        return $this->hasMany('App\User', 'id');
    }
}
