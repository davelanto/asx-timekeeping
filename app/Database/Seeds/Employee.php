<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Employee extends Seeder
{
    public function run()
    {
        $data = array(
            array(
                'EmFirstName'   =>  'Dave',
                'EmLastName'    =>  'Lanto',
                'EmAltID'       =>  'AIC781',
                'EmBranch'      =>  '1',
                'EmDepartment'  =>  '1',
                'EmCreatedAt'   =>  '2023-02-10 03:30:00',
                'EmUpdatedAt'   =>  '2023-02-10 03:30:00'
            ),
            array(
                'EmFirstName'   =>  'Jonah Michelle',
                'EmLastName'    =>  'Olega',
                'EmAltID'       =>  'AIC934',
                'EmBranch'      =>  '2',
                'EmDepartment'  =>  '2',
                'EmCreatedAt'   =>  '2023-02-10 03:30:00',
                'EmUpdatedAt'   =>  '2023-02-10 03:30:00'
            ),
            array(
                'EmFirstName'   =>  'Juan',
                'EmLastName'    =>  'Dela Cruz',
                'EmAltID'       =>  'AIC123',
                'EmBranch'      =>  '3',
                'EmDepartment'  =>  '3',
                'EmCreatedAt'   =>  '2023-02-10 03:30:00',
                'EmUpdatedAt'   =>  '2023-02-10 03:30:00'
            ),

        );

        foreach($data as $employee){
            $this->db->table('tblemployees')->insert($employee);
        }

    }
}
