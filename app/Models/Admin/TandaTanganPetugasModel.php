<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class TandaTanganPetugasModel extends Model
{
    protected $table            = 'tanda_tangan_petugas_table';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['petugas_id', 'tanda_tangan_petugas'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getTandaTanganPetugas()
    {
        return $this->table($this->table)
            ->select("tanda_tangan_petugas_table.id, tanda_tangan_petugas_table.tanda_tangan_petugas, petugas_table.nama")
            ->join('petugas_table', 'petugas_table.id = tanda_tangan_petugas_table.petugas_id')
            ->orderBy('tanda_tangan_petugas_table.id desc')
            ->get()->getResultObject();
    }
}
