<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Branches extends Seeder
{
    public function run()
    {
        $data = array(
            array(
                'BrName'   =>  'GGB Bldg',
                'BrCreatedAt'   =>  '2023-02-10 03:30:00',
                'BrUpdatedAt'   =>  '2023-02-10 03:30:00'
            ),
            array(
                'BrName'   =>  'FDI',
                'BrCreatedAt'   =>  '2023-02-10 03:30:00',
                'BrUpdatedAt'   =>  '2023-02-10 03:30:00'
            ),
            array(
                'BrName'   =>  'San Isidro',
                'BrCreatedAt'   =>  '2023-02-10 03:30:00',
                'BrUpdatedAt'   =>  '2023-02-10 03:30:00'
            ),
            array(
                'BrName'   =>  'Lopez',
                'BrCreatedAt'   =>  '2023-02-10 03:30:00',
                'BrUpdatedAt'   =>  '2023-02-10 03:30:00'
            ),
            array(
                'BrName'   =>  'Asenan',
                'BrCreatedAt'   =>  '2023-02-10 03:30:00',
                'BrUpdatedAt'   =>  '2023-02-10 03:30:00'
            ),

        );

        foreach($data as $branch){
            $this->db->table('tblbranches')->insert($branch);
        }
    }
}
