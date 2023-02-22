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

        $pager = service('pager');
        $data = $this->employeeModel->withDeleted()->get($post['search'] ?? '');
        $pager_links = $pager->links('employee', 'custom_pagination');

        $data = [
            'search' => $post['search'] ?? '',
            'data' => $data,
            'total' => $this->employeeModel->countAllResults(),
            'pager_links' => $pager_links,
            'pager' => $this->employeeModel->pager,
            'branches' => $this->branchModel->findAll(),
            'departments' => $this->departmentModel->findAll(),
            'designations' => $this->designationModel->findAll(),
            'session' => $this->session,
            'active' => 'employee'
        ];

        echo view('layouts/adminheader', $data);
        echo view('admin/employee');
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
        if (strtolower($post['active']) == 'no'){
            $this->employeeModel
                ->where('EmID', $post['id'])
                ->set('EmDeletedAt', null)
                ->update();
        }else{
            $this->employeeModel->delete($post['id']);
        }

        $this->session->setFlashdata('success', strtolower($post['active']) == 'no' ? 'Employee account has been activated' :'Employee account has been deactivated!');
    }
}
