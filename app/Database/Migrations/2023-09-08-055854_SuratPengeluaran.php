<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SuratPengeluaran extends Migration
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
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'jenis_spk_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],

            'nomor_surat' => [
                'type'           => 'varchar',
                'constraint'     => '225'
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
        $this->forge->addForeignKey('jenis_spk_id', 'jenis_spk_table', 'id', 'cascade', 'cascade');
        $attributes = ['ENGINE' => 'InnoDB'];
        $this->forge->createTable('surat_pengeluaran_table', false, $attributes);
    }

    public function down()
    {
        $this->forge->dropTable('surat_pengeluaran_table');
    }
}
