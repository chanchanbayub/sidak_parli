<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Bap extends Migration
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
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'jenis_penindakan_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true
            ],
            'nomor_bap' => [
                'type'       => 'VARCHAR',
                'constraint' => "255",
                'null'       => false
            ],
            'status_bap_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true
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
        $this->forge->addForeignKey('status_bap_id', 'status_penderekan_table', 'id', 'cascade', 'cascade');
        $attributes = ['ENGINE' => 'InnoDB'];
        $this->forge->createTable('bap_table', false, $attributes);
    }

    public function down()
    {
        $this->forge->dropTable('bap_table');
    }
}
