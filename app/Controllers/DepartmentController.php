<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DepartmentController extends BaseController
{
    public function save()
    {
        $this->store($this->request->getPost());
        return redirect()->to('/setting');
    }

    public function store($post)
    {
        $data = array(
            'DeID' => $post['DeID'] ?? '',
            'DeName' => $post['DeName']
        );

        if ($this->departmentModel->save($data)){
            $this->session->setFlashdata('success', $post['DeID'] ? 'Department has been updated!' :'A new Department has been added!');
        }else{
            $this->session->setFlashdata('errors', $this->departmentModel->errors());
            $this->session->setFlashdata('posts', $data);
        }
    }
}
