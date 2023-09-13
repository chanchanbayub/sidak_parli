<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DataPelanggar extends Migration
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
            'kartu_identitas_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true
            ],
            'nomor_identitas' => [
                'type'       => 'VARCHAR',
                'constraint' => "255",
                'null' => true
            ],
            'nama_pengemudi' => [
                'type'       => 'VARCHAR',
                'constraint' => "255",
                'null' => true
            ],
            'alamat_pengemudi' => [
                'type'       => 'VARCHAR',
                'constraint' => "255",
                'null' => true
            ],
            'nomor_hp' => [
                'type'       => 'VARCHAR',
                'constraint' => "255",
                'null' => true
            ],
            'tanda_tangan_pelanggar' => [
                'type'       => 'VARCHAR',
                'constraint' => "255",
                'null' => true
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
        $this->forge->addForeignKey('kartu_identitas_id', 'kartu_identitas_table', 'id', 'cascade', 'cascade');
        $attributes = ['ENGINE' => 'InnoDB'];
        $this->forge->createTable('data_pelanggar_table', false, $attributes);
    }

    public function down()
    {
        $this->forge->dropTable('data_pelanggar_table');
    }
}
