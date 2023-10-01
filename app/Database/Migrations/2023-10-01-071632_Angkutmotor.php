<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Angkutmotor extends Migration
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
                'unsigned' => true
            ],
            'jenis_penindakan_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned' => true
            ],
            'unit_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned' => true
            ],
            'nopol' => [
                'type'       => 'varchar',
                'constraint' => 255,
            ],
            'merk_kendaraan' => [
                'type'       => 'varchar',
                'constraint' => 255,

            ],
            'warna_kendaraan' => [
                'type'       => 'varchar',
                'constraint' => 255,
            ],
            'tanggal_pelanggaran_angkut' => [
                'type'       => 'date',
            ],
            'jam_pelanggaran_angkut' => [
                'type'       => 'time',
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
            'lokasi_angkut' => [
                'type'           => 'varchar',
                'constraint'     => 255,
            ],
            'nama_pengemudi' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'alamat_pengemudi' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'tempat_penyimpanan_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'foto_kendaraan_angkut' => [
                'type'           => 'varchar',
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
        $this->forge->addForeignKey('unit_id', 'unit_regu_table', 'id', 'cascade', 'cascade');
        $this->forge->addForeignKey('provinsi_id', 'provinsi', 'id', 'cascade', 'cascade');
        $this->forge->addForeignKey('kota_id', 'kota', 'id', 'cascade', 'cascade');
        $this->forge->addForeignKey('kecamatan_id', 'kecamatan', 'id', 'cascade', 'cascade');
        $this->forge->addForeignKey('tempat_penyimpanan_id', 'tempat_penyimpanan_table', 'id', 'cascade', 'cascade');

        $attributes = ['ENGINE' => 'InnoDB'];
        $this->forge->createTable('angkut_motor_table', false, $attributes);
    }

    public function down()
    {
        $this->forge->dropTable('angkut_motor_table');
    }
}
