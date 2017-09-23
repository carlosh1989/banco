<?php
namespace App\banco\repositories;

use App\Laboratorio;
use App\LaboratorioImagen;
use Eloquent;

class LaboratoriosRepository 
{
    function __construct()
    {
		new Eloquent();
    }

    public function index()
    {
        $data['laboratorios'] =  Laboratorio::all();
        return $data;
    }

    public function store($data)
    {
        extract($data);
        $laboratorio = new Laboratorio;
        $laboratorio->razon_social = $razon_social;
        $laboratorio->direccion = $location;
        $laboratorio->telefono = $telefono;
        $laboratorio->email = $email;
        $laboratorio->lat = $lat;
        $laboratorio->lng = $lng; 

        $laboratorioImagen = $imagen;
        if( $laboratorio->save())
        {
            $imagen = new LaboratorioImagen;
            $imagen->laboratorio_id = $laboratorio->id;
            $imagen->imagen_original = 'https://process.filestackapi.com/AhTgLagciQByzXpFGRI0Az/resize=w:1000/quality=value:70/compress/'.$laboratorioImagen;
            $imagen->imagen_grande = 'https://process.filestackapi.com/AhTgLagciQByzXpFGRI0Az/resize=w:800/quality=value:70/compress/'.$laboratorioImagen;
            $imagen->imagen_medio = 'https://process.filestackapi.com/AhTgLagciQByzXpFGRI0Az/resize=w:400/quality=value:70/compress/'.$laboratorioImagen;
            $imagen->imagen_miniatura = 'https://process.filestackapi.com/AhTgLagciQByzXpFGRI0Az/resize=w:250/quality=value:70/compress/'.$laboratorioImagen;
            //return $laboratorio->id;

            if($imagen->save())
            {
                return $laboratorio->id;
            }
            else
            {
                return 'Error al ingresar imagen de laboratorio.';
            }
        }
        else
        {
            return 'Error al ingresar datos de laboratorio.';
        }
    }

    public function show($id)
    {
        $data['laboratorio'] = Laboratorio::find($id);
        return $data;
    }

    public function update($id,$data)
    {

    }

    public function destroy($id)
    {

    }
}