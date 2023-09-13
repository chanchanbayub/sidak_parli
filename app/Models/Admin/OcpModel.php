<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class OcpModel extends Model
{
    protected $table            = 'ocp_table';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['ukpd_id', 'jenis_penindakan_id', 'unit_id', 'nomor_kendaraan_ocp', 'provinsi_id', 'tanggal_ocp', 'jam_ocp', 'kecamatan_id', 'kota_id', 'lokasi_penindakan', 'foto_penindakan'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $fieldTable = 'ocp_table.id,ocp_table.ukpd_id, ocp_table.jenis_penindakan_id,ocp_table.unit_id ,ocp_table.nomor_kendaraan_ocp, ocp_table.provinsi_id, ocp_table.kota_id, ocp_table.kecamatan_id, ocp_table.lokasi_penindakan, ocp_table.foto_penindakan, ocp_table.tanggal_ocp, ocp_table.jam_ocp,
    ukpd_table.ukpd, 
    jenis_penindakan_table.jenis_penindakan, 
    provinsi.provinsi,
    kota.kabupaten_kota,
    unit_regu_table.unit_regu,
    kecamatan.kecamatan';

    public function getDataOcp()
    {
        return $this->table($this->table)
            ->select($this->fieldTable)
            ->join('ukpd_table', 'ukpd_table.id = ocp_table.ukpd_id')
            ->join('jenis_penindakan_table', 'jenis_penindakan_table.id = ocp_table.jenis_penindakan_id')
            ->join('provinsi', 'provinsi.id = ocp_table.provinsi_id')
            ->join('kota', 'kota.id = ocp_table.kota_id')
            ->join('kecamatan', 'kecamatan.id = ocp_table.kecamatan_id')
            ->join('unit_regu_table', 'unit_regu_table.id = ocp_table.unit_id')
            ->orderBy('ocp_table.id desc')
            ->get()->getResultObject();
    }

    public function getDataOcpWithUnit($ukpd_id, $unit_id)
    {
        return $this->table($this->table)
            ->select($this->fieldTable)
            ->join('ukpd_table', 'ukpd_table.id = ocp_table.ukpd_id')
            ->join('jenis_penindakan_table', 'jenis_penindakan_table.id = ocp_table.jenis_penindakan_id')
            ->join('provinsi', 'provinsi.id = ocp_table.provinsi_id')
            ->join('kota', 'kota.id = ocp_table.kota_id')
            ->join('kecamatan', 'kecamatan.id = ocp_table.kecamatan_id')
            ->join('unit_regu_table', 'unit_regu_table.id = ocp_table.unit_id')
            ->where(["ocp_table.ukpd_id" => $ukpd_id])
            ->where(["ocp_table.unit_id" => $unit_id])
            ->orderBy('ocp_table.id desc')
            ->get()->getResultObject();
    }

    public function getDataOcpWithID($id)
    {
        return $this->table($this->table)
            ->select($this->fieldTable)
            ->join('ukpd_table', 'ukpd_table.id = ocp_table.ukpd_id')
            ->join('jenis_penindakan_table', 'jenis_penindakan_table.id = ocp_table.jenis_penindakan_id')
            ->join('provinsi', 'provinsi.id = ocp_table.provinsi_id')
            ->join('kota', 'kota.id = ocp_table.kota_id')
            ->join('kecamatan', 'kecamatan.id = ocp_table.kecamatan_id')
            ->join('unit_regu_table', 'unit_regu_table.id = ocp_table.unit_id')
            ->where(["ocp_table.id " => $id])
            ->orderBy('ocp_table.id desc')
            ->get()->getRowObject();
    }
}
