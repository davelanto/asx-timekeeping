<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Designations extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'EdID' => [
                'type' => 'INT',
                'constraint' => 8,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'EdName' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'EdCreatedAt' => [
                'type' => 'DATETIME',
            ],
            'EdUpdatedAt' => [
                'type' => 'DATETIME',
            ],
            'EdDeletedAt' => [
                'type' => 'DATETIME',
                'null' => true
            ],
        ]);
        $this->forge->addKey('EdID', true);
        $this->forge->createTable('tblemployeesdesignation');
    }

    public function down()
    {
        $this->forge->dropTable('tblemployeesdesignation');
    }
}
