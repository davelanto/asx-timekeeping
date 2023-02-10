<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Designation extends Seeder
{
    public function run()
    {
        $data = array(
            array(
                'EdName'   =>  'Warehouse Personnel',
                'EdCreatedAt'   =>  '2023-02-10 03:30:00',
                'EdUpdatedAt'   =>  '2023-02-10 03:30:00'
            ),
            array(
                'EdName'   =>  'Customer Support',
                'EdCreatedAt'   =>  '2023-02-10 03:30:00',
                'EdUpdatedAt'   =>  '2023-02-10 03:30:00'
            ),
            array(
                'EdName'   =>  'Business Operation Manager',
                'EdCreatedAt'   =>  '2023-02-10 03:30:00',
                'EdUpdatedAt'   =>  '2023-02-10 03:30:00'
            ),
            array(
                'EdName'   =>  'E-fulfillment Manager',
                'EdCreatedAt'   =>  '2023-02-10 03:30:00',
                'EdUpdatedAt'   =>  '2023-02-10 03:30:00'
            ),
            array(
                'EdName'   =>  'System Administrator',
                'EdCreatedAt'   =>  '2023-02-10 03:30:00',
                'EdUpdatedAt'   =>  '2023-02-10 03:30:00'
            ),
        );

        foreach($data as $designation){
            $this->db->table('tblemployeesdesignation')->insert($designation);
        }
    }
}
