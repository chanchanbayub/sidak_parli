<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DeleteUnitIdDataPenindakan extends Migration
{
    public function up()
    {
        $this->forge->dropForeignKey('data_penindakan_table', 'data_penindakan_table_unit_id_foreign');
        $attributes = ['ENGINE' => 'InnoDB'];
        $this->forge->dropColumn('data_penindakan_table', 'unit_id', false, $attributes);
    }

    public function down()
    {
        $this->forge->dropColumn('data_penindakan_table', 'unit_id');
    }
}
