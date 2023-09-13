<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DataPenindakan extends Migration
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
            'ppns_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned' => true
            ],
            'spt_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned' => true
            ],
            'unit_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned' => true
            ],
            'jenis_penindakan_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned' => true
            ],
            'bap_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned' => true
            ],
            'jenis_pelanggaran_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned' => true
            ],
            'tanggal_pelanggaran' => [
                'type'       => 'date',
            ],
            'jam_pelanggaran' => [
                'type'       => 'time',
            ],
            'tempat_penyimpanan_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned' => true
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
        $this->forge->addForeignKey('ppns_id', 'petugas_table', 'id', 'cascade', 'cascade');
        $this->forge->addForeignKey('spt_id', 'nomor_spt_table', 'id', 'cascade', 'cascade');
        $this->forge->addForeignKey('unit_id', 'unit_regu_table', 'id', 'cascade', 'cascade');
        $this->forge->addForeignKey('jenis_penindakan_id', 'jenis_penindakan_table', 'id', 'cascade', 'cascade');
        $this->forge->addForeignKey('bap_id', 'bap_table', 'id', 'cascade', 'cascade');
        $this->forge->addForeignKey('jenis_pelanggaran_id', 'jenis_pelanggaran_table', 'id', 'cascade', 'cascade');
        $this->forge->addForeignKey('tempat_penyimpanan_id', 'tempat_penyimpanan_table', 'id', 'cascade', 'cascade');
        $attributes = ['ENGINE' => 'InnoDB'];
        $this->forge->createTable('data_penindakan_table', false, $attributes);
    }

    public function down()
    {
        $this->forge->dropTable('data_penindakan_table');
    }
}
