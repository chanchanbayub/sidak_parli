<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class KotaModel extends Model
{
    protected $table            = 'kota';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['provinsi_id', 'kabupaten_kota', 'ibukota', 'k_bsni'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getKota()
    {
        return $this->table($this->table)
            ->orderBy('id desc')
            ->get()->getResultObject();
    }

    public function getKotaWithProvinsi($provinsi_id)
    {
        return $this->table($this->table)
            ->where(["provinsi_id" => $provinsi_id])
            ->orderBy('id desc')
            ->get()->getResultObject();
    }
}
