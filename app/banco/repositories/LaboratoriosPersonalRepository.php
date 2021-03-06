<?php
namespace App\banco\repositories;

use App\LaboratorioPersonal;
use App\Usuario;
use Eloquent;

class LaboratoriosPersonalRepository 
{
    function __construct()
    {
		new Eloquent();
    }

    public function store($data)
    {
        extract($data);

        //INGRESANDO CUENTA PARA ACCEDER
        $cuenta = new Usuario;
        $cuenta->name = $name;
        $cuenta->email = $email;
        $cuenta->role = 'laboratorio';
        $cuenta->password = password_hash($password, PASSWORD_DEFAULT);
        $cuenta->created_at = date('Y-m-d H:i:s');
        $cuenta->updated_at = date('Y-m-d H:i:s');

        if($cuenta->save())
        {
            //INGRESANDO DATOS DE PERSONAL DE LABORATORIO
            $personal = new LaboratorioPersonal;
            $personal->nombre_apellido = $nombre_apellido;
            $personal->usuario_id = $cuenta->id;
            $personal->laboratorio_id = $laboratorio_id;
            $personal->nacionalidad = $nacionalidad;
            $personal->cedula = $cedula;
            $personal->fecha_nacimiento = $fecha_nacimiento;
            $personal->telefono_fijo = $telefono_fijo;
            $personal->telefono_celular = $telefono_celular;
            $personal->cargo = $cargo;
            $personal->direccion = $direccion;
            $personal->email = $email;

            if($personal->save())
            {
                return $personal->id;
            }
            else
            {
                return 'Error al ingresar datos de personal de laboratorio.';
            }
        }
        else
        {
            return 'Error al ingresar datos de cuenta.';
        }
    }

    public function show($id)
    {
        $data['personal'] = LaboratorioPersonal::find($id);
        return $data;
    }

    public function update($id,$data)
    {

    }

    public function destroy($id)
    {

    }
}