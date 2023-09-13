<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class NomorSuratTugas extends Migration
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
            'nomor_surat' => [
                'type'       => 'VARCHAR',
                'constraint' => "100",
            ],
            'tanggal_surat' => [
                'type' => 'date',
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
        $attributes = ['ENGINE' => 'InnoDB'];
        $this->forge->createTable('nomor_spt_table', false, $attributes);
    }

    public function down()
    {
        $this->forge->dropTable('nomor_spt_table');
    }
}
