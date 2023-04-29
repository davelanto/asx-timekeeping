<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Master extends Seeder
{
    public function run()
    {
        $this->call('Branches');
        $this->call('Department');
        $this->call('Employee');
        $this->call('Users');
        $this->call('Designation');
        $this->call('TimekeepingLogs');
        $this->call('Timekeeping');
        $this->call('Schedules');
    }
}
