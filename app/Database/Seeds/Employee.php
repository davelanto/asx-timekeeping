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
                'EmBrID'      =>  '1',
                'EmDeID'  =>  '1',
                'EmEdID' =>  '1',
                'EmCreatedAt'   =>  '2023-02-10 03:30:00',
                'EmUpdatedAt'   =>  '2023-02-10 03:30:00'
            ),
            array(
                'EmFirstName'   =>  'Jonah Michelle',
                'EmLastName'    =>  'Olega',
                'EmAltID'       =>  'AIC934',
                'EmBrID'      =>  '2',
                'EmDeID'  =>  '2',
                'EmEdID' =>  '2',
                'EmCreatedAt'   =>  '2023-02-10 03:30:00',
                'EmUpdatedAt'   =>  '2023-02-10 03:30:00'
            ),
            array(
                'EmFirstName'   =>  'Aprilyn',
                'EmLastName'    =>  'Abayata',
                'EmAltID'       =>  'TGL0054',
                'EmBrID'      =>  '3',
                'EmDeID'  =>  '3',
                'EmEdID' =>  '3',
                'EmCreatedAt'   =>  '2023-02-10 03:30:00',
                'EmUpdatedAt'   =>  '2023-02-10 03:30:00'
            ),
            array(
                'EmFirstName'   =>  'Cindy',
                'EmLastName'    =>  'Cariño',
                'EmAltID'       =>  'TGL0059',
                'EmBrID'      =>  '4',
                'EmDeID'  =>  '2',
                'EmEdID' =>  '4',
                'EmCreatedAt'   =>  '2023-02-10 03:30:00',
                'EmUpdatedAt'   =>  '2023-02-10 03:30:00'
            ),
            array(
                'EmFirstName'   =>  'Mary Angelique',
                'EmLastName'    =>  'Sadiua',
                'EmAltID'       =>  'AIC479',
                'EmBrID'      =>  '5',
                'EmDeID'  =>  '2',
                'EmEdID' =>  '3',
                'EmCreatedAt'   =>  '2023-02-10 03:30:00',
                'EmUpdatedAt'   =>  '2023-02-10 03:30:00'
            ),

        );

        foreach($data as $employee){
            $this->db->table('tblemployees')->insert($employee);
        }

    }
}
