<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class JenisSPKModel extends Model
{
    protected $table            = 'jenis_spk_table';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['jenis_spk'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getJenisSPK()
    {
        return $this->table($this->table)
            ->orderBy('id desc')
            ->get()->getResultObject();
    }
}
