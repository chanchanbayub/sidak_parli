<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class JenisPelanggaranModel extends Model
{
    protected $table            = 'jenis_pelanggaran_table';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['jenis_pelanggaran'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getPelanggaran()
    {
        return $this->table($this->table)
            ->orderBy('id desc')
            ->get()->getResultObject();
    }
}
