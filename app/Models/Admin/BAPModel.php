<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class BAPModel extends Model
{
    protected $table            = 'bap_table';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['ukpd_id', 'jenis_penindakan_id', 'nomor_bap', 'unit_id', 'status_bap_id'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $fieldTable = 'bap_table.id, bap_table.ukpd_id, bap_table.jenis_penindakan_id, bap_table.nomor_bap,bap_table.status_bap_id, ukpd_table.ukpd, jenis_penindakan_table.jenis_penindakan, status_penderekan_table.status_penderekan, unit_regu_table.unit_regu';

    public function getBAP($ukpd_id)
    {
        if ($ukpd_id == null) {
            return $this->table($this->table)
                ->select($this->fieldTable)
                ->join('ukpd_table', 'ukpd_table.id = bap_table.ukpd_id')
                ->join('jenis_penindakan_table', 'jenis_penindakan_table.id = bap_table.jenis_penindakan_id')
                ->join('status_penderekan_table', 'status_penderekan_table.id = bap_table.status_bap_id')
                ->join('unit_regu_table', 'unit_regu_table.id = bap_table.unit_id', 'left')
                ->orderBy('bap_table.id desc')
                ->get()->getResultObject();
        } else {
            return $this->table($this->table)
                ->select($this->fieldTable)
                ->join('ukpd_table', 'ukpd_table.id = bap_table.ukpd_id')
                ->join('jenis_penindakan_table', 'jenis_penindakan_table.id = bap_table.jenis_penindakan_id')
                ->join('status_penderekan_table', 'status_penderekan_table.id = bap_table.status_bap_id')
                ->join('unit_regu_table', 'unit_regu_table.id = bap_table.unit_id', 'left')
                ->where(["bap_table.ukpd_id" => $ukpd_id])
                ->orderBy('bap_table.id desc')
                ->get()->getResultObject();
        }
    }

    public function getNomorBap($ukpd_id, $jenis_penindakan_id, $unit_id)
    {
        return $this->table($this->table)
            ->select($this->fieldTable)
            ->join('ukpd_table', 'ukpd_table.id = bap_table.ukpd_id')
            ->join('status_penderekan_table', 'status_penderekan_table.id = bap_table.status_bap_id')
            ->join('jenis_penindakan_table', 'jenis_penindakan_table.id = bap_table.jenis_penindakan_id')
            ->join('unit_regu_table', 'unit_regu_table.id = bap_table.unit_id')
            ->where(["bap_table.ukpd_id" => $ukpd_id])
            ->where(["bap_table.jenis_penindakan_id" => $jenis_penindakan_id])
            ->where(["bap_table.unit_id" => $unit_id])
            ->where(["bap_table.status_bap_id" => 1])
            ->orderBy('bap_table.id asc')
            ->get()->getResultObject();
    }
}
