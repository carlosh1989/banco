<?php
namespace App\banco\repositories;

use App\Donante;
use App\DonanteSerologia;
use App\Estatus;
use Eloquent;

class SerologiasRepository 
{
    function __construct()
    {
		new Eloquent();
    }

    public function store($data)
    {
        extract($data);
        $examen = new DonanteSerologia;
        $examen->donante_id = $donante_id;
        $examen->responsable = $responsable;
        $examen->VIH = $VIH;
        $examen->HBSAG = $HBSAG;
        $examen->ANTIVHC = $ANTIVHC;
        $examen->SIFILIS = $SIFILIS;
        $examen->CHAGAS = $CHAGAS;
        $examen->fecha = $fecha;

        //CREAR EL ESTATUS O ACTULIZARLO DEPENDIENDO DEL CASO
        $estatus = Estatus::where('donante_id')->first();

        if($estatus)
        {
            $estatus->estatus = 1;
            $estatus->fecha = $fecha;
        }
        else
        {
            $estatus = new Estatus;
            $estatus->donante_id = $donante_id;
            $estatus->estatus = 1;
            $estatus->fecha = $fecha;
        }

        if($examen->save() AND $estatus->save())
        {
            return $examen->id;
        }
        else
        {
            return 'Error al ingresar serologia.';
        }
    }

    public function show($id)
    {

    }

    public function update($id,$data)
    {

    }

    public function destroy($id)
    {

    }
}