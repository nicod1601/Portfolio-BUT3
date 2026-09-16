<?php

namespace App\Controllers;

class Competence1 extends BaseController
{
    public function index(): string
    {
        return view('layout/header') . view('competences/c1') . view('layout/footer');
    }
}
