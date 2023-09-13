<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Ukpd extends Migration
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
            'ukpd' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'nama_dinas' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
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
        $this->forge->createTable('ukpd_table', false, $attributes);
    }

    public function down()
    {
        $this->forge->dropTable('ukpd_table');
    }
}
