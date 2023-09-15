<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TambahUnitIdBapTable extends Migration
{
    public function up()
    {
        $fields = [
            'unit_id' => [
                'type' => 'int',
                'constraint' => 11,
                'unsigned' => true,
                'after' => 'nomor_bap'
            ]
        ];
        $this->forge->addForeignKey('unit_id', 'unit_regu_table', 'id', 'cascade', 'cascade');
        $attributes = ['ENGINE' => 'InnoDB'];
        $this->forge->addColumn('bap_table', $fields, false, $attributes);
    }

    public function down()
    {
        $this->forge->dropColumn('bap_table', 'unit_id');
    }
}
