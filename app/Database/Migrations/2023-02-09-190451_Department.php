<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Department extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'DeID' => [
                'type' => 'INT',
                'constraint' => 8,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'DeName' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'DeCreatedAt' => [
                'type' => 'DATETIME',
            ],
            'DeUpdatedAt' => [
                'type' => 'DATETIME',
            ],
            'DeDeletedAt' => [
                'type' => 'DATETIME',
                'null' => true
            ],
        ]);
        $this->forge->addKey('DeID', true);
        $this->forge->createTable('tbldepartments');
    }

    public function down()
    {
        $this->forge->dropTable('tbldepartments');
    }
}
