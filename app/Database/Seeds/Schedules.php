<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Schedules extends Seeder
{
    public function run()
    {
        $data = array(
            array(
                'ScEmID' => '1',
                'ScTimeIn' => '2023-03-08 08:00:00',
                'ScTimeOut' => '2023-03-08 17:30:00',
                'ScCreatedAt' => date('Y-m-d H:i:s'),
                'ScUpdatedAt' => date('Y-m-d H:i:s')
            ),
            array(
                'ScEmID' => '1',
                'ScTimeIn' => '2023-03-09 08:00:00',
                'ScTimeOut' => '2023-03-09 17:30:00',
                'ScCreatedAt' => date('Y-m-d H:i:s'),
                'ScUpdatedAt' => date('Y-m-d H:i:s')
            ),
            array(
                'ScEmID' => '1',
                'ScTimeIn' => '2023-03-10 08:00:00',
                'ScTimeOut' => '2023-03-10 17:30:00',
                'ScCreatedAt' => date('Y-m-d H:i:s'),
                'ScUpdatedAt' => date('Y-m-d H:i:s')
            ),
            array(
                'ScEmID' => '2',
                'ScTimeIn' => '2023-03-08 08:00:00',
                'ScTimeOut' => '2023-03-08 17:30:00',
                'ScCreatedAt' => date('Y-m-d H:i:s'),
                'ScUpdatedAt' => date('Y-m-d H:i:s')
            ),
            array(
                'ScEmID' => '2',
                'ScTimeIn' => '2023-03-09 08:00:00',
                'ScTimeOut' => '2023-03-09 17:30:00',
                'ScCreatedAt' => date('Y-m-d H:i:s'),
                'ScUpdatedAt' => date('Y-m-d H:i:s')
            ),
            array(
                'ScEmID' => '2',
                'ScTimeIn' => '2023-03-10 08:00:00',
                'ScTimeOut' => '2023-03-10 17:30:00',
                'ScCreatedAt' => date('Y-m-d H:i:s'),
                'ScUpdatedAt' => date('Y-m-d H:i:s')
            ),
            array(
                'ScEmID' => '3',
                'ScTimeIn' => '2023-03-08 08:00:00',
                'ScTimeOut' => '2023-03-08 17:30:00',
                'ScCreatedAt' => date('Y-m-d H:i:s'),
                'ScUpdatedAt' => date('Y-m-d H:i:s')
            ),
            array(
                'ScEmID' => '3',
                'ScTimeIn' => '2023-03-09 08:00:00',
                'ScTimeOut' => '2023-03-09 17:30:00',
                'ScCreatedAt' => date('Y-m-d H:i:s'),
                'ScUpdatedAt' => date('Y-m-d H:i:s')
            ),
            array(
                'ScEmID' => '3',
                'ScTimeIn' => '2023-03-10 08:00:00',
                'ScTimeOut' => '2023-03-10 17:30:00',
                'ScCreatedAt' => date('Y-m-d H:i:s'),
                'ScUpdatedAt' => date('Y-m-d H:i:s')
            ),
            array(
                'ScEmID' => '4',
                'ScTimeIn' => '2023-03-08 08:00:00',
                'ScTimeOut' => '2023-03-08 17:30:00',
                'ScCreatedAt' => date('Y-m-d H:i:s'),
                'ScUpdatedAt' => date('Y-m-d H:i:s')
            ),
            array(
                'ScEmID' => '4',
                'ScTimeIn' => '2023-03-09 08:00:00',
                'ScTimeOut' => '2023-03-09 17:30:00',
                'ScCreatedAt' => date('Y-m-d H:i:s'),
                'ScUpdatedAt' => date('Y-m-d H:i:s')
            ),
            array(
                'ScEmID' => '4',
                'ScTimeIn' => '2023-03-10 08:00:00',
                'ScTimeOut' => '2023-03-10 17:30:00',
                'ScCreatedAt' => date('Y-m-d H:i:s'),
                'ScUpdatedAt' => date('Y-m-d H:i:s')
            )
        );

        foreach($data as $schedule){
            $this->db->table('tblschedules')->insert($schedule);
        }
    }
}
