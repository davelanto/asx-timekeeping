<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TimekeepingLogs extends Seeder
{
    public function run()
    {
        $data = array(
            array(
                'TklEmID' => '1',
                'TklLog' => '2023-02-10 08:30:00',
                'TklStatus' => '1',
                'TklCreatedAt' => '2023-02-10 08:30:00'
            ),
            array(
                'TklEmID' => '1',
                'TklLog' => '2023-02-10 12:00:00',
                'TklStatus' => '3',
                'TklCreatedAt' => '2023-02-10 12:00:00'
            ),
            array(
                'TklEmID' => '1',
                'TklLog' => '2023-02-10 13:00:00',
                'TklStatus' => '4',
                'TklCreatedAt' => '2023-02-10 13:00:00'
            ),
            array(
                'TklEmID' => '1',
                'TklLog' => '2023-02-10 17:30:00',
                'TklStatus' => '2',
                'TklCreatedAt' => '2023-02-10 17:30:00'
            ),
            array(
                'TklEmID' => '2',
                'TklLog' => '2023-02-10 08:00:00',
                'TklStatus' => '1',
                'TklCreatedAt' => '2023-02-10 08:00:00'
            ),
            array(
                'TklEmID' => '2',
                'TklLog' => '2023-02-10 12:01:00',
                'TklStatus' => '3',
                'TklCreatedAt' => '2023-02-10 12:01:00'
            ),
            array(
                'TklEmID' => '2',
                'TklLog' => '2023-02-10 12:58:00',
                'TklStatus' => '4',
                'TklCreatedAt' => '2023-02-10 12:58:00'
            ),
            array(
                'TklEmID' => '2',
                'TklLog' => '2023-02-10 17:30:00',
                'TklStatus' => '2',
                'TklCreatedAt' => '2023-02-10 17:30:00'
            ),
            array(
                'TklEmID' => '3',
                'TklLog' => '2023-02-10 08:06:00',
                'TklStatus' => '1',
                'TklCreatedAt' => '2023-02-10 08:06:00'
            ),
            array(
                'TklEmID' => '3',
                'TklLog' => '2023-02-10 12:04:00',
                'TklStatus' => '3',
                'TklCreatedAt' => '2023-02-10 12:04:00'
            ),
            array(
                'TklEmID' => '3',
                'TklLog' => '2023-02-10 13:02:00',
                'TklStatus' => '4',
                'TklCreatedAt' => '2023-02-10 13:02:00'
            ),
            array(
                'TklEmID' => '3',
                'TklLog' => '2023-02-10 18:34:00',
                'TklStatus' => '2',
                'TklCreatedAt' => '2023-02-10 18:34:00'
            ),
            array(
                'TklEmID' => '4',
                'TklLog' => '2023-02-10 08:06:00',
                'TklStatus' => '1',
                'TklCreatedAt' => '2023-02-10 08:06:00'
            ),
            array(
                'TklEmID' => '4',
                'TklLog' => '2023-02-10 12:04:00',
                'TklStatus' => '3',
                'TklCreatedAt' => '2023-02-10 12:04:00'
            ),
            array(
                'TklEmID' => '4',
                'TklLog' => '2023-02-10 13:02:00',
                'TklStatus' => '4',
                'TklCreatedAt' => '2023-02-10 13:02:00'
            ),
            array(
                'TklEmID' => '4',
                'TklLog' => '2023-02-10 18:34:00',
                'TklStatus' => '2',
                'TklCreatedAt' => '2023-02-10 18:34:00'
            ),
            array(
                'TklEmID' => '4',
                'TklLog' => '2023-02-10 18:35:00',
                'TklStatus' => '5',
                'TklCreatedAt' => '2023-02-10 18:35:00'
            ),
            array(
                'TklEmID' => '4',
                'TklLog' => '2023-02-10 20:06:00',
                'TklStatus' => '6',
                'TklCreatedAt' => '2023-02-10 20:06:00'
            ),
            array(
                'TklEmID' => '5',
                'TklLog' => '2023-02-10 07:06:00',
                'TklStatus' => '1',
                'TklCreatedAt' => '2023-02-10 07:06:00'
            ),
            array(
                'TklEmID' => '5',
                'TklLog' => '2023-02-10 12:21:00',
                'TklStatus' => '3',
                'TklCreatedAt' => '2023-02-10 12:21:00'
            ),
            array(
                'TklEmID' => '5',
                'TklLog' => '2023-02-10 13:02:00',
                'TklStatus' => '4',
                'TklCreatedAt' => '2023-02-10 13:02:00'
            ),
            array(
                'TklEmID' => '5',
                'TklLog' => '2023-02-10 17:34:00',
                'TklStatus' => '2',
                'TklCreatedAt' => '2023-02-10 17:34:00'
            ),
            array(
                'TklEmID' => '5',
                'TklLog' => '2023-02-10 17:34:00',
                'TklStatus' => '5',
                'TklCreatedAt' => '2023-02-10 17:34:00'
            ),
            array(
                'TklEmID' => '5',
                'TklLog' => '2023-02-10 18:34:00',
                'TklStatus' => '6',
                'TklCreatedAt' => '2023-02-10 18:34:00'
            ),
        );

        foreach($data as $timelog){
            $this->db->table('tbltimekeepinglogs')->insert($timelog);
        }
    }
}
