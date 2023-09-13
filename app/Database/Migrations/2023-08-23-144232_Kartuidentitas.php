<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kartuidentitas extends Migration
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
            'kartu_identitas' => [
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
        $this->forge->createTable('kartu_identitas_table', false, $attributes);
    }

    public function down()
    {
        $this->forge->dropTable('kartu_identitas_table');
    }
}
