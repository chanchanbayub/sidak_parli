<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class JenisPelanggaran extends Migration
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
            'jenis_pelanggaran' => [
                'type'       => 'VARCHAR',
                'constraint' => "100",
            ],
            'created_at' => [
                'type' => 'datetime'
            ],
            'updated_at' => [
                'type' => 'datetime'
            ]

        ]);

        $this->forge->addKey('id', true);
        $attributes = ['ENGINE' => 'InnoDB'];
        $this->forge->createTable('jenis_pelanggaran_table', false, $attributes);
    }

    public function down()
    {
        $this->forge->dropTable('jenis_pelanggaran_table');
    }
}
