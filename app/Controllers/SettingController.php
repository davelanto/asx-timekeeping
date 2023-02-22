<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SettingController extends BaseController
{
    public function get()
    {
        $post = $this->request->getPost();

        $pager = service('pager');
        $branches = $this->branchModel->orLike('BrName', $post['searchBranch'] ?? '')
            ->orderBy('BrID', 'DESC')
            ->paginate(5, 'branch');
        $pager_branch = $pager->links('branch', 'custom_pagination');

        $departments = $this->departmentModel->orLike('DeName', $post['searchDepartment'] ?? '')
            ->orderBy('DeID', 'DESC')
            ->paginate(5, 'department');
        $pager_department = $pager->links('department', 'custom_pagination');

        $designations = $this->designationModel->orLike('EdName', $post['searchDesignation'] ?? '')
            ->orderBy('EdID', 'DESC')
            ->paginate(5, 'designation');
        $pager_designation = $pager->links('designation', 'custom_pagination');

        $data = [
            'branchTotal' => $this->branchModel->countAllResults(),
            'departmentTotal' => $this->departmentModel->countAllResults(),
            'designationTotal' => $this->designationModel->countAllResults(),
            'branches' => $branches,
            'pager_branch' => $pager_branch,
            'searchBranch' => $post['searchBranch'] ?? '',
            'departments' => $departments,
            'pager_department' => $pager_department,
            'searchDepartment' => $post['searchDepartment'] ?? '',
            'designations' => $designations,
            'pager_designation' => $pager_designation,
            'searchDesignation' => $post['searchDesignation'] ?? '',
            'session' => $this->session,
            'active' => 'setting'
        ];

        echo view('layouts/adminheader',$data);
        echo view('admin/setting');
        echo view('layouts/adminfooter');
    }



}
