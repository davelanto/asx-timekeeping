<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BranchModel;
use App\Models\DepartmentModel;
use App\Models\DesignationModel;
use App\Models\EmployeeModel;

class AdminController extends BaseController
{

    public function index()
    {
        echo view('layouts/adminheader');
        echo view('admin/dashboard');
        echo view('layouts/adminfooter');
    }

    public function employee()
    {

        $data['employees'] = $this->employeeModel->getEmployees();
        $data['pager'] = $this->employeeModel->pager;
        $data['branches'] = $this->branchModel->findAll();
        $data['departments'] = $this->departmentModel->findAll();
        $data['designations'] = $this->designationModel->findAll();
        $data['session'] = $this->session;
        echo view('layouts/adminheader');
        echo view('admin/employee', $data);
        echo view('layouts/adminfooter');
    }

    public function newEmployee()
    {

        $data = [
            'EmAltID' => $this->request->getPost('altID'),
            'EmFirstName' => $this->request->getPost('firstname'),
            'EmLastName' => $this->request->getPost('lastname'),
            'EmBrID' => $this->request->getPost('branch'),
            'EmDeID' => $this->request->getPost('department'),
            'EmEdID' => $this->request->getPost('designation')
        ];

        if(!$this->employeeModel->save($data)){
            $this->session->setFlashdata('errors', $this->employeeModel->errors());
            $this->session->setFlashdata('posts', $data);
        }else{
            $this->session->setFlashdata('success', true);
        }
        return redirect()->to('/employee');
    }
}
