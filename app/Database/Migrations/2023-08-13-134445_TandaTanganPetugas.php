<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TandaTanganPetugas extends Migration
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
            'petugas_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'tanda_tangan_petugas' => [
                'type'       => 'VARCHAR',
                'constraint' => "255",
                'null'       => true
            ],
            'created_at' => [
                'type' => 'datetime'
            ],
            'updated_at' => [
                'type' => 'datetime'
            ]

        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('petugas_id', 'petugas_table', 'id', 'cascade', 'cascade');
        $attributes = ['ENGINE' => 'InnoDB'];
        $this->forge->createTable('tanda_tangan_petugas_table', false, $attributes);
    }

    public function down()
    {
        $this->forge->dropTable('tanda_tangan_petugas_table');
    }
}
