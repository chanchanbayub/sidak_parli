<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TypeKendaraan extends Migration
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
            'jenis_kendaraan_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null' => false,
                'unsigned'   => true,
            ],
            'type_kendaraan' => [
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
        $this->forge->addForeignKey('jenis_kendaraan_id', 'jenis_kendaraan_table', 'id', 'cascade', 'cascade');
        $attributes = ['ENGINE' => 'InnoDB'];
        $this->forge->createTable('type_kendaraan_table', false, $attributes);
    }

    public function down()
    {
        $this->forge->dropTable('type_kendaraan_table');
    }
}
