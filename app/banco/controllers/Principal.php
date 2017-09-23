<?php
namespace App\banco\controllers;

use App\banco\models\PrincipalModel;
use Controller,View,Token,Session,Arr,Message,Redirect;
use Faker\Factory;



class Principal extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
		Redirect::to('banco/donantes');
    }

    public function direccion()
    {
        $faker = Factory::create();
        echo $faker->state;
        $data = [];
        for ($i = 0; $i < 5; $i++) {
            $data[] = [
                'name'      => $faker->name,
                'password'  => password_hash('123', PASSWORD_DEFAULT),
                'email'     => $faker->email,
                'role'      => 'admin',
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s'),
            ];
        }
    }
}