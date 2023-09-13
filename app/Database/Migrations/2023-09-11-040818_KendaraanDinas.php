<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KendaraanDinas extends Migration
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
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'nomor_kendaraan_dinas' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'merk_kendaraan_dinas' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'unit_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'foto_kendaraan_dinas' => [
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
        $this->forge->addForeignKey('ukpd_id', 'ukpd_table', 'id', 'cascade', 'cascade');
        $this->forge->addForeignKey('unit_id', 'unit_regu_table', 'id', 'cascade', 'cascade');
        $attributes = ['ENGINE' => 'InnoDB'];
        $this->forge->createTable('kendaraan_dinas_table', false, $attributes);
    }

    public function down()
    {
        $this->forge->dropTable('kendaraan_dinas_table');
    }
}
