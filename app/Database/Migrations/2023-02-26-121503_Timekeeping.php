<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Timekeeping extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'TkID' => [
                'type' => 'INT',
                'constraint' => 8,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'TkEmID' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'TkTimeIn' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'TkTimeOut' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'TkBreakIn' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'TkBreakOut' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'TkOtIn' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'TkOtOut' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'TkCreatedAt' => [
                'type' => 'DATETIME',
            ],
            'TkUpdatedAt' => [
                'type' => 'DATETIME',
            ],
            'TkDeletedAt' => [
                'type' => 'DATETIME',
                'null' => true
            ]
        ]);
        $this->forge->addKey('TkID', true);
        $this->forge->createTable('tbltimekeeping');
    }

    public function down()
    {
        $this->forge->dropTable('tbltimekeeping');
    }
}
