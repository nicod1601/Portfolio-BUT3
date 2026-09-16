<?php

namespace App\Controllers;

class Competence3 extends BaseController
{
    public function index(): string
    {
        return view('layout/header') . view('competences/c3') . view('layout/footer');
    }
}
