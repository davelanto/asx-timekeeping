<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Department extends Seeder
{
    public function run()
    {
        $data = array(
            array(
                'DeName'   =>  'Trucking',
                'DeCreatedAt'   =>  '2023-02-10 03:30:00',
                'DeUpdatedAt'   =>  '2023-02-10 03:30:00'
            ),
            array(
                'DeName'   =>  'PUD',
                'DeCreatedAt'   =>  '2023-02-10 03:30:00',
                'DeUpdatedAt'   =>  '2023-02-10 03:30:00'
            ),
            array(
                'DeName'   =>  'Sales',
                'DeCreatedAt'   =>  '2023-02-10 03:30:00',
                'DeUpdatedAt'   =>  '2023-02-10 03:30:00'
            ),
            array(
                'DeName'   =>  'Warehousing',
                'DeCreatedAt'   =>  '2023-02-10 03:30:00',
                'DeUpdatedAt'   =>  '2023-02-10 03:30:00'
            ),
            array(
                'DeName'   =>  'Admin',
                'DeCreatedAt'   =>  '2023-02-10 03:30:00',
                'DeUpdatedAt'   =>  '2023-02-10 03:30:00'
            ),
        );

        foreach($data as $department){
            $this->db->table('tbldepartments')->insert($department);
        }
    }
}
