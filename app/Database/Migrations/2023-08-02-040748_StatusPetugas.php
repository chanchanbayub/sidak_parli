<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class StatusPetugas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'status_petugas' => [
                'type'       => 'VARCHAR',
                'constraint' => "100",
            ],
            'created_at' => [
                'type' => 'datetime'
            ],
            'updated_at' => [
                'type' => 'datetime'
            ]

        ]);

        $this->forge->addKey('id', true);
        $attributes = ['ENGINE' => 'InnoDB'];
        $this->forge->createTable('status_petugas_table', false, $attributes);
    }

    public function down()
    {
        $this->forge->dropTable('status_petugas_table');
    }
}
