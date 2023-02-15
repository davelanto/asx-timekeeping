<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BranchModel;
use App\Models\DepartmentModel;
use App\Models\DesignationModel;
use App\Models\EmployeeModel;

class EmployeeController extends BaseController
{
    public function get()
    {
        $post = $this->request->getPost();

        $data = [
            'page' => $_GET['page'] ?? 1,
            'total' => $this->employeeModel->countAllResults(),
            'perPage' => 10,
            'data' => $this->employeeModel->withDeleted()->get($post['search'] ?? ''),
            'pager' => $this->employeeModel->pager,
            'branches' => $this->branchModel->findAll(),
            'departments' => $this->departmentModel->findAll(),
            'designations' => $this->designationModel->findAll(),
            'session' => $this->session
        ];

        echo view('layouts/adminheader');
        echo view('admin/employee', $data);
        echo view('layouts/adminfooter');
    }

    public function save(){
       $this->store($this->request->getPost());
        return redirect()->to('/employee');
    }

    public function store($post)
    {
        $data = array(
            'EmID' => $post['EmID'] ?? '',
            'EmAltID' => $post['altID'],
            'EmFirstName' => $post['firstname'],
            'EmLastName' => $post['lastname'],
            'EmBrID' => $post['branch'],
            'EmDeID' => $post['department'],
            'EmEdID' => $post['designation']
        );

        if(!$this->employeeModel->save($data)){
            $this->session->setFlashdata('errors', $this->employeeModel->errors());
            $this->session->setFlashdata('posts', $data);
        }else{
            $this->session->setFlashdata('success', 'A new employee has been added!');
        }
    }

    public function delete()
    {
        $post = $this->request->getPost();
        $this->employeeModel->delete($post['id']);
        $this->session->setFlashdata('success', 'Employee account has been deactivated!');
    }
}
