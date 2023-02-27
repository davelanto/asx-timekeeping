<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Timekeeping extends Seeder
{
    public function run()
    {
        $data = array(
            array(
                'TkEmID' => '1',
                'TkTimeIn' => '2023-02-10 08:30:00',
                'TkTimeOut' => '2023-02-10 17:30:00',
                'TkBreakIn' => '2023-02-10 12:00:00',
                'TkBreakOut' => '2023-02-10 13:00:00',
                'TkCreatedAt' => '2023-02-10 08:30:00',
                'TkUpdatedAt' => '2023-02-10 17:30:00'
            ),
            array(
                'TkEmID' => '2',
                'TkTimeIn' => '2023-02-10 08:00:00',
                'TkTimeOut' => '2023-02-10 18:34:00',
                'TkBreakIn' => '2023-02-10 12:01:00',
                'TkBreakOut' => '2023-02-10 12:58:00',
                'TkCreatedAt' => '2023-02-10 08:00:00',
                'TkUpdatedAt' => '2023-02-10 18:34:00'
            ),
            array(
                'TkEmID' => '3',
                'TkTimeIn' => '2023-02-10 08:06:00',
                'TkTimeOut' => '2023-02-10 18:34:00',
                'TkBreakIn' => '2023-02-10 12:04:00',
                'TkBreakOut' => '2023-02-10 13:02:00',
                'TkCreatedAt' => '2023-02-10 08:06:00',
                'TkUpdatedAt' => '2023-02-10 18:34:00'
            ),
            array(
                'TkEmID' => '4',
                'TkTimeIn' => '2023-02-10 08:06:00',
                'TkTimeOut' => '2023-02-10 18:34:00',
                'TkBreakIn' => '2023-02-10 12:04:00',
                'TkBreakOut' => '2023-02-10 13:02:00',
                'TkOtIn' => '2023-02-10 18:35:00',
                'TkOtOut' => '2023-02-10 20:06:00',
                'TkCreatedAt' => '2023-02-10 08:06:00',
                'TkUpdatedAt' => '2023-02-10 18:34:00'
            ),
            array(
                'TkEmID' => '5',
                'TkTimeIn' => '2023-02-10 07:06:00',
                'TkTimeOut' => '2023-02-10 17:34:00',
                'TkBreakIn' => '2023-02-10 12:21:00',
                'TkBreakOut' => '2023-02-10 13:02:00',
                'TkOtIn' => '2023-02-10 17:34:00',
                'TkOtOut' => '2023-02-10 18:34:00',
                'TkCreatedAt' => '2023-02-10 07:06:00',
                'TkUpdatedAt' => '2023-02-10 17:34:00'
            ),
        );

        foreach($data as $time){
            $this->db->table('tbltimekeeping')->insert($time);
        }
    }
}
