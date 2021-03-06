<?php
namespace App\banco\controllers;

use App\BancoHistoria;
use App\Donante;
use App\DonanteHistoria;

class Historias
{
    function __construct()
    {
        Role('banco');
    }

    public function index()
    {
        View();
    }

    public function create()
    {
        $donante_id = Uri(5);
        $banco_historias = BancoHistoria::all();
        //Arr($banco_historia);
        View(compact('donante_id','banco_historias'));
    }

    public function store()
    {
        $preguntas = BancoHistoria::all();
        extract($_POST);

        DonanteHistoria::where('donante_id',$donante_id)->delete();

        foreach ($preguntas as $p) 
        {
            $var = 'pregunta-'.$p->id;
            $respuesta = $_POST[$var];

            $registro = new DonanteHistoria;
            $registro->donante_id = $donante_id;
            $registro->historia_id = $p->id;
            $registro->respuesta = $respuesta;

            if($registro->save())
            {
                Success('donantes/'.$donante_id,'Ingresado el historial de paciente.');
            }
            else
            {
                Error('donantes/'.$donante_id,'Error al ingresar historial.');
            }
        }
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        View(compact('id'));
    }

    public function update($id)
    {
        extract($_POST);
        //Arr($respuestas);
        $donante_id = $id;
        $donante = Donante::find($donante_id);

        if($donante->historia)
        {
            if(isset($respuestas))
            {
                foreach ($respuestas as $r) 
                {
                    $donante_historia = DonanteHistoria::where('donante_id',$donante_id)->where('historia_id',$r)->first();
                    $donante_historia->respuesta = 'yes';
                    $donante_historia->save();
                }
            }
            else
            {
                $updateArray = ['respuesta' => 'no'];
                $donante_historia = DonanteHistoria::where('donante_id',$donante_id)->update($updateArray);
            }
        }
        else
        {
            $banco_historias = BancoHistoria::all();

            foreach ($banco_historias as $h) 
            {
                $donante_historia = new DonanteHistoria;
                $donante_historia->donante_id = $donante_id;
                $donante_historia->historia_id = $h->id;
                $donante_historia->respuesta = 'no';
                $donante_historia->save();
            }
        }
    }

    public function destroy($id)
    {

    }
}