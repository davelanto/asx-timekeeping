<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Schedule extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'ScID' => [
                'type' => 'INT',
                'constraint' => 8,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'ScEmID' => [
                'type' => 'INT',
                'constraint' => 8,
            ],
            'ScTimeIn' => [
                'type' => 'DATETIME',
            ],
            'ScTimeOut' => [
                'type' => 'DATETIME',
            ],
            'ScCreatedAt' => [
                'type' => 'DATETIME',
            ],
            'ScUpdatedAt' => [
                'type' => 'DATETIME',
            ],
            'ScDeletedAt' => [
                'type' => 'DATETIME',
                'null' => true
            ],
        ]);
        $this->forge->addKey('ScID', true);
        $this->forge->createTable('tblschedules');
    }

    public function down()
    {
        $this->forge->dropTable('tblschedules');
    }
}
