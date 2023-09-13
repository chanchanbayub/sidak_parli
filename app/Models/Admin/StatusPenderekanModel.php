<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class StatusPenderekanModel extends Model
{
    protected $table            = 'status_penderekan_table';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['status_penderekan'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getStatusPenderekan()
    {
        return $this->table($this->table)
            ->orderBy('id desc')
            ->get()->getResultObject();
    }

    public function getStatusPenderekanKeluar()
    {
        return $this->table($this->table)
            ->where(["id" => 1])
            ->orderBy('id desc')
            ->get()->getResultObject();
    }
}
