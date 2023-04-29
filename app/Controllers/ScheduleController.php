<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use DateTime;

class ScheduleController extends BaseController
{
    public function get()
    {
        $post = $this->request->getPost();
        if (isset($post['calendar'])){
            $dates = explode(",", $post['calendar']);
        }
        $fromDate = $dates[0] ?? date('Y-m-d');
        $toDate = $dates[1] ?? date('Y-m-d');

        $pager = service('pager');
        $data = $this->scheduleModel->get($fromDate, $toDate, $post['search'] ?? '');
        $pager_links = $pager->links('schedule', 'custom_pagination');

        $data = [
            'search' => $post['search'] ?? '',
            'from' => $dates[0] ?? date('Y-m-d'),
            'to' => $dates[1] ?? date('Y-m-d'),
            'data' => $data,
            'pager_links' => $pager_links,
            'pager' => $this->employeeModel->pager,
            'session' => $this->session,
            'active' => 'schedule'
        ];

        echo view('layouts/adminheader', $data);
        echo view('admin/schedule');
        echo view('layouts/adminfooter');
    }

    public function upload()
    {
        if ($file = $this->request->getFile('csvFile')) {
            $file = fopen($file, "r");
            $arr = array();
            $count = 0;
            while (($row = fgetcsv($file)) !== FALSE) {
                $count++;
                if ($count == 1) {
                    continue;
                }
                $arr[] = [
                    'ScEmID' => $this->getEmID($row[0]),
                    'ScTimeIn' => date('Y-m-d H:i', strtotime(str_replace('/', '-', $row[1]))),
                    'ScTimeOut' => date('Y-m-d H:i', strtotime(str_replace('/', '-', $row[2]))),
                    'ScCreatedAt' => date('Y-m-d H:i'),
                    'ScUpdatedAt' => date('Y-m-d H:i'),
                ];
            }
            if ($this->scheduleModel->store($arr)){
                $this->session->setFlashdata('success', 'Import Success!');
            }else{
                $this->session->setFlashdata('errors', $this->scheduleModel->errors());
            }
        }
       return redirect()->to('/schedule');
    }

    public function getEmID($id)
    {
        return
            $this->employeeModel
                ->select('EmID')
                ->where('EmAltID', $id)
                ->find()[0]->EmID;
    }

    public function remove($id)
    {
        $this->scheduleModel->remove($id);
        $this->session->setFlashdata('success', 'Delete Success!');
        return redirect()->to('/schedule');
    }
}
