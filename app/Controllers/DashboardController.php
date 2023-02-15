<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        echo view('layouts/adminheader');
        echo view('admin/dashboard');
        echo view('layouts/adminfooter');
    }

}
