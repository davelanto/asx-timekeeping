<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Employees extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'EmID' => [
                'type' => 'INT',
                'constraint' => 8,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'EmAltID' => [
                'type' => 'VARCHAR',
                'constraint' => '10',
            ],
            'EmFirstName' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'EmLastName' => [
                'type' => 'VARCHAR',
                'constraint' => '30',
            ],
            'EmBranch' => [
                'type' => 'INT',
                'constraint' => 1,
            ],
            'EmDepartment' => [
                'type' => 'INT',
                'constraint' => 1,
            ],
            'EmCreatedAt' => [
                'type' => 'DATETIME',
            ],
            'EmUpdatedAt' => [
                'type' => 'DATETIME',
            ],
            'EmDeletedAt' => [
                'type' => 'DATETIME',
                'null' => true
            ],
        ]);
        $this->forge->addKey('EmID', true);
        $this->forge->createTable('tblemployees');
    }

    public function down()
    {
        $this->forge->dropTable('tblemployees');
    }
}
