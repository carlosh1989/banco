<?php 
namespace App;
use App\Donante;
use \Illuminate\Database\Eloquent\Model;
 
class Serologia extends Model {
    protected $table = 'donantes_serologia';
	public $timestamps = false;
    //Ejemplo de definir campos
    //protected $fillable = ['username','email','password'];
	public function donante()
	{
		return $this->belongsTo(Donante::class, 'donante_id','id');
	}	
}

