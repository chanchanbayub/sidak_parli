<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class KecamatanModel extends Model
{
    protected $table            = 'kecamatan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['kabkot_id', 'kecamatan'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getKecamatan()
    {
        return $this->table($this->table)
            ->orderBy('id desc')
            ->get()->getResultObject();
    }

    public function getKecamatanWithKota($kota_id)
    {
        return $this->table($this->table)
            ->where(["kabkot_id" => $kota_id])
            ->orderBy('id desc')
            ->get()->getResultObject();
    }
}
