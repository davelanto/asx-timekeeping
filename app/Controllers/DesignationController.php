<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DesignationController extends BaseController
{
    public function save()
    {
        $this->store($this->request->getPost());
        return redirect()->to('/setting');
    }

    public function store($post)
    {
        $data = array(
            'EdID' => $post['EdID'] ?? '',
            'EdName' => $post['EdName']
        );

        if ($this->designationModel->save($data)){
            $this->session->setFlashdata('success', $post['EdID'] ? 'Designation has been updated!' :'A new Designation has been added!');
        }else{
            $this->session->setFlashdata('errors', $this->designationModel->errors());
            $this->session->setFlashdata('posts', $data);
        }
    }
}
