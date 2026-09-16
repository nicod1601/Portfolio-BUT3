<?php

namespace App\Controllers;

class Competence2 extends BaseController
{
    public function index(): string
    {
        return view('layout/header') . view('competences/c2') . view('layout/footer');
    }
}
