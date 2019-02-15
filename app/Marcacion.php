<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marcacion extends Model
{
    public $timestamps = false; 
	protected $table = 'marcacion';
	protected $fillable = [
       'user_id', 'registro',
    ];


    public function usuario(){
        return $this->hasOne('App\User','id','user_id');
    }
}
