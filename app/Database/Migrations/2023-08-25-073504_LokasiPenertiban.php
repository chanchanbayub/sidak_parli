<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class LokasiPenertiban extends Migration
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
            'provinsi_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned' => true
            ],
            'kota_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned' => true
            ],
            'kecamatan_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned' => true
            ],
            'nama_jalan' => [
                'type'       => 'VARCHAR',
                'constraint' => "255",
            ],
            'nama_gedung' => [
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
        $this->forge->addForeignKey('provinsi_id', 'provinsi', 'id', 'cascade', 'cascade');
        $this->forge->addForeignKey('kota_id', 'kota', 'id', 'cascade', 'cascade');
        $this->forge->addForeignKey('kecamatan_id', 'kecamatan', 'id', 'cascade', 'cascade');

        $attributes = ['ENGINE' => 'InnoDB'];
        $this->forge->createTable('lokasi_penindakan_table', false, $attributes);
    }

    public function down()
    {
        $this->forge->dropTable('lokasi_penindakan_table');
    }
}
