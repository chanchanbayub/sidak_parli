<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class SPTModel extends Model
{
    protected $table            = 'nomor_spt_table';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['ukpd_id', 'nomor_surat', 'tanggal_surat'];
    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getSPT()
    {
        return $this->table($this->table)
            ->select("nomor_spt_table.id, nomor_spt_table.ukpd_id, nomor_spt_table.nomor_surat, nomor_spt_table.tanggal_surat, ukpd_table.ukpd")
            ->orderBy('nomor_spt_table.id desc')
            ->join('ukpd_table', 'ukpd_table.id = nomor_spt_table.ukpd_id')
            ->get()->getResultObject();
    }

    public function getNewSPT($ukpd_id)
    {
        return $this->table($this->table)
            ->orderBy('id desc')
            ->where(["ukpd_id" => $ukpd_id])
            ->get()->getRowObject();
    }
}
