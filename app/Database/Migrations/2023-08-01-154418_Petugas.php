<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Petugas extends Migration
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
            'unit_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => "100",
            ],
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => "100",
            ],
            'nip' => [
                'type'       => 'VARCHAR',
                'constraint' => "100",
            ],
            'golongan' => [
                'type'       => 'VARCHAR',
                'constraint' => "100",
                'null' => true
            ],
            'pangkat' => [
                'type'       => 'VARCHAR',
                'constraint' => "100",
                'null' => true
            ],
            'jabatan_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned' => true
            ],
            'role_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned' => true
            ],
            'status_id' => [
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
        $this->forge->addForeignKey('unit_id', 'unit_regu_table', 'id', 'cascade', 'cascade');
        $this->forge->addForeignKey('jabatan_id', 'jabatan_table', 'id', 'cascade', 'cascade');
        $this->forge->addForeignKey('role_id', 'role_management_table', 'id', 'cascade', 'cascade');
        $this->forge->addForeignKey('status_id', 'status_petugas_table', 'id', 'cascade', 'cascade');
        $attributes = ['ENGINE' => 'InnoDB'];
        $this->forge->createTable('petugas_table', false, $attributes);
    }

    public function down()
    {
        $this->forge->dropTable('petugas_table');
    }
}
