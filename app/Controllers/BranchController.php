<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class BranchController extends BaseController
{
    public function save()
    {
        $this->store($this->request->getPost());
        return redirect()->to('/setting');
    }

    public function store($post)
    {
        $data = array(
            'BrID' => $post['BrID'] ?? '',
            'BrName' => $post['BrName']
        );

        if ($this->branchModel->save($data)){
            $this->session->setFlashdata('success', $post['BrID'] ? 'Branch name has been updated!' :'A new branch has been added!');
        }else{
            $this->session->setFlashdata('errors', $this->branchModel->errors());
            $this->session->setFlashdata('posts', $data);
        }
    }
}
