<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class TimekeepingController extends BaseController
{
    public function get()
    {
        $post = $this->request->getPost();
        $pager = service('pager');
        $records = $this->timekeepinglogModel->get($post['search'] ?? '');
        $pager_links = $pager->links('timekeepinglogs', 'custom_pagination');

        $data = [
            'search' => $post['search'] ?? '',
            'data' => $records,
            'pager_links' => $pager_links,
            'employee_record' => $employee_record ?? '',
            'session' => $this->session
        ];

        echo view('layouts/header',$data);
        echo view('admin/timekeeping');
        echo view('layouts/footer');
    }

    public function getEmployeeRecord()
    {
        if ($this->request->is('post')){
            $post = $this->request->getPost();
            $data = $this->timekeepinglogModel->getEmployeebyID($post['qrID']);

            if ($data){
                $this->session->setFlashdata('records', $data);
                $record_today = $this->timekeepinglogModel->getRecordTodayByEmployeeID($post['qrID']);
                $this->session->setFlashdata('todaysrecord', $this->generateTheActiveButton($record_today));
            }
            return redirect()->to('/');
        }
    }

    public function save()
    {
        $this->store($this->request->getPost());
        $this->session->setFlashdata('newrecord', true);
        return redirect()->to('/');
    }

    public function store($post)
    {
        $date = date('Y-m-d H:i:s');
        switch (strtolower($post['commitRecord'])) {
            case "time in":
                $status = 1;
                break;
            case "time out":
                $status = 2;
                break;
            case "break in":
                $status = 3;
                break;
            case "break out":
                $status = 4;
                break;
            case "overtime in":
                $status = 5;
                break;
            default:
                $status = 6;
                break;
        }
        $this->timekeepinglogModel->save([
            'TklEmID' => $post['EmID'],
            'TklLog' => $date,
            'TklStatus' => $status,
            'TklCreatedAt' => $date
        ]);
    }

    public function generateTheActiveButton($data)
    {
        if ($data){
            if ($data[0]->TklStatus == 1) {
                return [
                    'timein' => 'disabled',
                    'timeout' => '',
                    'breakin' => '',
                    'breakout' => 'disabled',
                    'otin' => 'disabled',
                    'otout' => 'disabled'
                ];
            } else if ($data[0]->TklStatus == 2) {
                return [
                    'timein' => 'disabled',
                    'timeout' => 'disabled',
                    'breakin' => 'disabled',
                    'breakout' => 'disabled',
                    'otin' => '',
                    'otout' => 'disabled'
                ];
            } else if ($data[0]->TklStatus == 3) {
                return [
                    'timein' => 'disabled',
                    'timeout' => 'disabled',
                    'breakin' => 'disabled',
                    'breakout' => '',
                    'otin' => 'disabled',
                    'otout' => 'disabled'
                ];
            } else if ($data[0]->TklStatus == 4) {
                return [
                    'timein' => 'disabled',
                    'timeout' => '',
                    'breakin' => 'disabled',
                    'breakout' => 'disabled',
                    'otin' => 'disabled',
                    'otout' => 'disabled'
                ];
            } else if ($data[0]->TklStatus == 5) {
                return [
                    'timein' => 'disabled',
                    'timeout' => 'disabled',
                    'breakin' => 'disabled',
                    'breakout' => 'disabled',
                    'otin' => 'disabled',
                    'otout' => ''
                ];
            } else if ($data[0]->TklStatus == 6) {
                return [
                    'timein' => 'disabled',
                    'timeout' => 'disabled',
                    'breakin' => 'disabled',
                    'breakout' => 'disabled',
                    'otin' => 'disabled',
                    'otout' => 'disabled'
                ];
            }
        }else{
            return [
                'timein' => '',
                'timeout' => 'disabled',
                'breakin' => 'disabled',
                'breakout' => 'disabled',
                'otin' => 'disabled',
                'otout' => 'disabled'
            ];
        }
    }
}
