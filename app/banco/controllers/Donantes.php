<?php
namespace App\banco\controllers;

use App\Donante;

class Donantes
{
    function __construct()
    {
        Role('banco');
    }

    public function index()
    {
        View(Repo());
    }

    public function create()
    {
        $cedula = Uri(5);
        View(compact('cedula'));
    }

    public function store()
    {
        //Arr($_POST);
        RepoConfirm($_POST,'donantes','donantes/create');
    }

    public function show($id)
    {
        View(Repo($id));
    }   

    public function edit($id)
    {
        View(compact('id'));
    }

    public function update($id)
    {

    }

    public function destroy($id)
    {

    }

/* FIN DE METODOS RESTFUL */

    public function busqueda()
    {
        extract($_POST);
        if($cedula)
        {
            $donante = Donante::where('cedula',$cedula)->first();

            if($donante)
            {
                Success('donantes/'.$donante->id,'Donante esta en el sistema');
            }
            else
            {
                Info('donantes/create/'.$cedula,'El donante no se encuentra registrado en el sistema.');
            }
        }
        else
        {
            Error('donantes','Debe ingresar un numero de cédula.');
        }
    }
}