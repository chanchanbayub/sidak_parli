<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FotoPenindakan extends Migration
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
            'foto_penindakan_1' => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'foto_penindakan_2' => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
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
        $attributes = ['ENGINE' => 'InnoDB'];
        $this->forge->createTable('foto_penindakan_table', false, $attributes);
    }

    public function down()
    {
        $this->forge->dropTable('foto_penindakan_table');
    }
}
