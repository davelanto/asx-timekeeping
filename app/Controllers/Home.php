<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        echo view('layouts/header');
        echo view('public/dashboard');
        echo view('layouts/footer');
    }
}
