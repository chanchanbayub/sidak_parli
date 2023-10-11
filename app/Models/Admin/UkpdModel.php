<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class UkpdModel extends Model
{
    protected $table            = 'ukpd_table';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['ukpd', 'nama_dinas'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getUkpd()
    {
        return $this->table($this->table)
            ->orderBy('id asc')
            ->get()->getResultObject();
    }
}
