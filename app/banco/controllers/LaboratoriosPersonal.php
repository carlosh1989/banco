<?php
namespace App\banco\controllers;

use App\LaboratorioPersonal;
use App\Usuario;
use System\template\View;
use System\tools\url\Url;

class LaboratoriosPersonal
{
    function __construct()
    {
        Role('banco');
    }

    // localhost/proyecto/modulo/principal
    public function index()
    {
        View();
    }

    // localhost/proyecto/modulo/principal/create
    public function create()
    {
        $laboratorio_id = Uri(5);
        View(compact('laboratorio_id'));
    }

    // localhost/proyecto/modulo/principal/
    public function store()
    {
        //Arr::show($_POST);
        //se manda los datos del formulario al repositorio para ser guardados
        RepoConfirm($_POST,'laboratoriosPersonal','laboratoriosPersonal');
        //$ingresarPersonal = Store($_POST);
    }

    // localhost/proyecto/modulo/principal/ID
    public function show($id)
    {
        View(Repo($id));
    }

    // localhost/proyecto/modulo/principal/ID/edit
    public function edit($id)
    {
        View(compact('id'));
    }

    // localhost/proyecto/modulo/principal/ID/put
    public function update($id)
    {
        //Actualizar datos con el ID
    }

    // localhost/proyecto/modulo/principal/ID/delete
    public function destroy($id)
    {
        //Borrar un registro usando el ID
    }
}