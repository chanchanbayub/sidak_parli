<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class TempatPenyimpananModel extends Model
{
    protected $table            = 'tempat_penyimpanan_table';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['ukpd_id', 'tempat_penyimpanan', 'link_gmaps'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getTempatPenyimpanan()
    {
        return $this->table($this->table)
            ->select("tempat_penyimpanan_table.id, tempat_penyimpanan_table.ukpd_id, tempat_penyimpanan_table.tempat_penyimpanan,tempat_penyimpanan_table.link_gmaps, ukpd_table.ukpd")
            ->orderBy('tempat_penyimpanan_table.id desc')
            ->join('ukpd_table', 'ukpd_table.id = tempat_penyimpanan_table.ukpd_id')
            ->get()->getResultObject();
    }
    public function getTempatPenyimpananWhereUKPD($ukpd_id)
    {
        return $this->table($this->table)
            ->select("tempat_penyimpanan_table.id, tempat_penyimpanan_table.ukpd_id, tempat_penyimpanan_table.tempat_penyimpanan,tempat_penyimpanan_table.link_gmaps, ukpd_table.ukpd")
            ->where(["ukpd_id" => $ukpd_id])
            ->orderBy('tempat_penyimpanan_table.id desc')
            ->join('ukpd_table', 'ukpd_table.id = tempat_penyimpanan_table.ukpd_id')
            ->get()->getResultObject();
    }
}
