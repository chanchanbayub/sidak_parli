<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UnitRegu extends Migration
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
            'ukpd_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null' => false,
                'unsigned'   => true,
            ],
            'unit_regu' => [
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
        $this->forge->addForeignKey('ukpd_id', 'ukpd_table', 'id', 'cascade', 'cascade');
        $attributes = ['ENGINE' => 'InnoDB'];
        $this->forge->createTable('unit_regu_table', false, $attributes);
    }

    public function down()
    {
        $this->forge->dropTable('unit_regu_table');
    }
}
