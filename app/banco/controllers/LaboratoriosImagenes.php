<?php
namespace App\banco\controllers;

class LaboratoriosImagenes
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
        View();
    }

    public function store()
    {
        Arr($_POST);
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

    }

    public function destroy($id)
    {

    }
}