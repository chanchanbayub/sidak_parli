<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TambahLatitude extends Migration
{
    public function up()
    {
        $fields = [
            'latitude' => [
                'type' => 'varchar',
                'constraint' => 255,
                'after' => 'tempat_penyimpanan'
            ],
            'longitude' => [
                'type' => 'varchar',
                'constraint' => 255,
                'after' => 'latitude'
            ]
        ];
        $attributes = ['ENGINE' => 'InnoDB'];
        $this->forge->addColumn('tempat_penyimpanan_table', $fields, false, $attributes);
        $this->forge->dropColumn('tempat_penyimpanan_table', 'link_gmaps', false, $attributes);
    }

    public function down()
    {
        $this->forge->dropColumn('tempat_penyimpanan_table', 'latitude', 'longitude');
    }
}
