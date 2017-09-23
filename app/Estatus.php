<?php 
namespace App;
use \Illuminate\Database\Eloquent\Model;
 
class Estatus extends Model {
    protected $table = 'donantes_estatus';
	public $timestamps = false;
    //Ejemplo de definir campos
    //protected $fillable = ['username','email','password'];

}

