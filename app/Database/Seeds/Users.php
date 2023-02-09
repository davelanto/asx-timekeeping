<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Users extends Seeder
{
    public function run()
    {
        $data = array(
            array(
                'username' =>  'asx',
                'password' =>  password_hash('airspeedexpress', PASSWORD_DEFAULT),
                'role' => 1,
                'CreatedAt' => '2023-02-10 04:12:00'
            )
        );

        foreach($data as $user){
            $this->db->table('tblusers')->insert($user);
        }
    }
}
