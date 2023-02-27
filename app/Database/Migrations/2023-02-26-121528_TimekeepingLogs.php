<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TimekeepingLogs extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'TklID' => [
                'type' => 'INT',
                'constraint' => 8,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'TklEmID' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'TklLog' => [
                'type' => 'DATETIME',
            ],
            'TklStatus' => [
                'type' => 'INT',
                'constraint' => 1,
            ],
            'TklCreatedAt' => [
                'type' => 'DATETIME',
            ]
        ]);
        $this->forge->addKey('TklID', true);
        $this->forge->createTable('tbltimekeepinglogs');
    }

    public function down()
    {
        $this->forge->dropTable('tbltimekeepinglogs');
    }
}
