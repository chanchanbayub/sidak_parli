<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class EditNomorSurat extends Migration
{
    public function up()
    {
        $fields = [
            'nomor_surat' => [
                'name' => 'nomor_spk_pdf',
                'type' => 'varchar',
                'constraint'  => '225',
                'null' => false,
            ],
        ];
        $this->forge->modifyColumn('surat_pengeluaran_table', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('surat_pengeluaran_table', 'nomor_spk_table');
    }
}
