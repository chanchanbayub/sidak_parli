<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tempatpenyimpanan extends Migration
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
            'tempat_penyimpanan' => [
                'type'       => 'VARCHAR',
                'constraint' => "100",
            ],
            'link_gmaps' => [
                'type'       => 'VARCHAR',
                'constraint' => "255",
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
        $this->forge->createTable('tempat_penyimpanan_table', false, $attributes);
    }

    public function down()
    {
        $this->forge->dropTable('tempat_penyimpanan_table');
    }
}
