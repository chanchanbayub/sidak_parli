<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class KendaraanDinasModel extends Model
{
    protected $table            = 'kendaraan_dinas_table';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['ukpd_id', 'nomor_kendaraan_dinas', 'merk_kendaraan_dinas', 'unit_id', 'foto_kendaraan_dinas'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $fieldTable = 'kendaraan_dinas_table.id, kendaraan_dinas_table.ukpd_id, kendaraan_dinas_table.nomor_kendaraan_dinas, kendaraan_dinas_table.merk_kendaraan_dinas, kendaraan_dinas_table.unit_id, foto_kendaraan_dinas, ukpd_table.ukpd, unit_regu_table.unit_regu';

    public function getKendaraanDinas($ukpd_id)
    {
        if ($ukpd_id == null) {
            return $this->table($this->table)
                ->orderBy('kendaraan_dinas_table.id desc')
                ->get()->getResultObject();
        } else {
            return $this->table($this->table)
                ->orderBy('kendaraan_dinas_table.id desc')
                ->where(["ukpd_id" => $ukpd_id])
                ->get()->getResultObject();
        }
    }

    public function getKdoWithId($id)
    {
        return $this->table($this->table)
            ->select($this->fieldTable)
            ->join('ukpd_table', 'ukpd_table.id = kendaraan_dinas_table.ukpd_id', 'left')
            ->join('unit_regu_table', 'kendaraan_dinas_table.unit_id = unit_regu_table.id', 'left')
            ->where(["kendaraan_dinas_table.id" => $id])
            ->orderBy('kendaraan_dinas_table.id desc')
            ->get()->getRowObject();
    }

    public function getKDOWithUnitId($id)
    {
        return $this->table($this->table)
            ->select($this->fieldTable)
            ->join('ukpd_table', 'ukpd_table.id = kendaraan_dinas_table.ukpd_id', 'left')
            ->join('unit_regu_table', 'kendaraan_dinas_table.unit_id = unit_regu_table.id', 'left')
            ->where(["kendaraan_dinas_table.unit_id" => $id])
            ->orderBy('kendaraan_dinas_table.id desc')
            ->get()->getRowObject();
    }
}
