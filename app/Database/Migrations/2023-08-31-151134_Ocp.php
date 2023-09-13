<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Ocp extends Migration
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
            'jenis_penindakan_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'unit_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'nomor_kendaraan_ocp' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'provinsi_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'kota_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'kecamatan_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'lokasi_penindakan' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,

            ],
            'tanggal_ocp' => [
                'type'           => 'date',
            ],
            'jam_ocp' => [
                'type'           => 'time',
            ],
            'foto_penindakan' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,

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
        $this->forge->addForeignKey('jenis_penindakan_id', 'jenis_penindakan_table', 'id', 'cascade', 'cascade');
        $this->forge->addForeignKey('provinsi_id', 'provinsi', 'id', 'cascade', 'cascade');
        $this->forge->addForeignKey('kota_id', 'kota', 'id', 'cascade', 'cascade');
        $this->forge->addForeignKey('kecamatan_id', 'kecamatan', 'id', 'cascade', 'cascade');
        $this->forge->addForeignKey('unit_id', 'unit_regu_table', 'id', 'cascade', 'cascade');
        $attributes = ['ENGINE' => 'InnoDB'];
        $this->forge->createTable('ocp_table', false, $attributes);
    }

    public function down()
    {
        $this->forge->dropTable('ocp_table');
    }
}
