<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class TypeKendaraanModel extends Model
{
    protected $table            = 'type_kendaraan_table';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['jenis_kendaraan_id', 'type_kendaraan'];
    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getTypeKendaraan()
    {
        return $this->table($this->table)
            ->select("type_kendaraan_table.id, type_kendaraan_table.jenis_kendaraan_id, type_kendaraan_table.type_kendaraan, jenis_kendaraan_table.jenis_kendaraan")
            ->orderBy('type_kendaraan_table.id desc')
            ->join('jenis_kendaraan_table', 'jenis_kendaraan_table.id = type_kendaraan_table.jenis_kendaraan_id')
            ->get()->getResultObject();
    }

    public function getTypeKendaraanWhereJenisKendaraan($jenis_kendaraan_id)
    {
        return $this->table($this->table)
            ->select("type_kendaraan_table.id, type_kendaraan_table.jenis_kendaraan_id, type_kendaraan_table.type_kendaraan, jenis_kendaraan_table.jenis_kendaraan")
            ->where(["jenis_kendaraan_id" => $jenis_kendaraan_id])
            ->orderBy('type_kendaraan_table.id desc')
            ->join('jenis_kendaraan_table', 'jenis_kendaraan_table.id = type_kendaraan_table.jenis_kendaraan_id')
            ->get()->getResultObject();
    }
}
