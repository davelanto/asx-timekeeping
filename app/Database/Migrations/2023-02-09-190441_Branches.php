<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Branches extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'BrID' => [
                'type' => 'INT',
                'constraint' => 8,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'BrName' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'BrCreatedAt' => [
                'type' => 'DATETIME',
            ],
            'BrUpdatedAt' => [
                'type' => 'DATETIME',
            ],
            'BrDeletedAt' => [
                'type' => 'DATETIME',
                'null' => true
            ],
        ]);
        $this->forge->addKey('BrID', true);
        $this->forge->createTable('tblbranches');
    }

    public function down()
    {
        $this->forge->dropTable('tblbranches');
    }
}
