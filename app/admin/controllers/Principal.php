<?php
namespace App\admin\controllers;

use App\admin\models\PrincipalModel;
use Controller,View,Token,Session,Arr,Message,Redirect;

class Principal extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
		View::ver('admin/principal/index');
    }
}