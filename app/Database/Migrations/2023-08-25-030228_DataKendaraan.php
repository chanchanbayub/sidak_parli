<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DataKendaraan extends Migration
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
            'bap_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned' => true
            ],
            'jenis_kendaraan_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned' => true
            ],
            'type_kendaraan_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned' => true
            ],
            'merk_kendaraan' => [
                'type'       => 'VARCHAR',
                'constraint' => "255",

            ],
            'nomor_kendaraan' => [
                'type'       => 'VARCHAR',
                'constraint' => "255",
            ],
            'warna_kendaraan' => [
                'type'       => 'VARCHAR',
                'constraint' => "255",
            ],

            'created_at' => [
                'type' => 'datetime'
            ],
            'updated_at' => [
                'type' => 'datetime'
            ]

        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('bap_id', 'bap_table', 'id', 'cascade', 'cascade');
        $this->forge->addForeignKey('jenis_kendaraan_id', 'jenis_kendaraan_table', 'id', 'cascade', 'cascade');
        $this->forge->addForeignKey('type_kendaraan_id', 'type_kendaraan_table', 'id', 'cascade', 'cascade');

        $attributes = ['ENGINE' => 'InnoDB'];
        $this->forge->createTable('data_kendaraan_table', false, $attributes);
    }

    public function down()
    {
        $this->forge->dropTable('data_kendaraan_table');
    }
}
