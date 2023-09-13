<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class UnitReguModel extends Model
{
    protected $table            = 'unit_regu_table';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['ukpd_id', 'unit_regu'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $fieldTable = 'unit_regu_table.id, unit_regu_table.ukpd_id, unit_regu_table.unit_regu, petugas_table.nama, petugas_table.nip, petugas_table.status_id, status_petugas_table.status_petugas';

    public function getUnit()
    {
        return $this->table($this->table)
            ->select("unit_regu_table.id, unit_regu_table.ukpd_id, unit_regu_table.unit_regu, ukpd_table.ukpd")
            ->orderBy('unit_regu_table.id desc')
            ->join('ukpd_table', 'ukpd_table.id = unit_regu_table.ukpd_id')
            ->get()->getResultObject();
    }

    public function getUnitWhereUKPD($ukpd_id)
    {
        return $this->table($this->table)
            ->select("unit_regu_table.id, unit_regu_table.ukpd_id, unit_regu_table.unit_regu")
            ->orderBy('unit_regu_table.id desc')
            ->where(["ukpd_id" => $ukpd_id])
            ->get()->getResultObject();
    }

    public function getUnitWithPetugas($id)
    {
        return $this->table($this->table)
            ->select($this->fieldTable)
            ->join('petugas_table', 'petugas_table.unit_id = unit_regu_table.id', 'left')
            ->join('status_petugas_table', 'petugas_table.status_id = status_petugas_table.id', 'left')
            ->orderBy('unit_regu_table.id desc')
            ->where(["unit_regu_table.id" => $id])
            ->get()->getResultObject();
    }
}
