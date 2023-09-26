<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class PetugasModel extends Model
{
    protected $table            = 'petugas_table';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['ukpd_id', 'unit_id', 'nama', 'username', 'nip', 'golongan', 'pangkat', 'jabatan_id', 'role_id', 'status_id'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getPetugas()
    {
        return $this->table($this->table)
            ->select("petugas_table.id, petugas_table.ukpd_id,petugas_table.unit_id, petugas_table.nama, petugas_table.username ,petugas_table.nip, petugas_table.pangkat ,petugas_table.golongan,petugas_table.jabatan_id, petugas_table.role_id,petugas_table.status_id, ukpd_table.ukpd, unit_regu_table.unit_regu, jabatan_table.jabatan, role_management_table.role_management, status_petugas_table.status_petugas")
            ->join('ukpd_table', 'ukpd_table.id = petugas_table.ukpd_id')
            ->join('unit_regu_table', 'unit_regu_table.id = petugas_table.unit_id')
            ->join('jabatan_table', 'jabatan_table.id = petugas_table.jabatan_id')
            ->join('role_management_table', 'role_management_table.id = petugas_table.role_id')
            ->join('status_petugas_table', 'status_petugas_table.id = petugas_table.status_id')
            ->orderBy('petugas_table.id desc')
            ->get()->getResultObject();
    }

    public function getPetugasWithUKPD($ukpd_id)
    {
        return $this->table($this->table)
            ->select("petugas_table.id, petugas_table.ukpd_id,petugas_table.unit_id, petugas_table.nama, petugas_table.username ,petugas_table.nip, petugas_table.pangkat ,petugas_table.golongan,petugas_table.jabatan_id, petugas_table.role_id,petugas_table.status_id, ukpd_table.ukpd, unit_regu_table.unit_regu, jabatan_table.jabatan, role_management_table.role_management, status_petugas_table.status_petugas")
            ->join('ukpd_table', 'ukpd_table.id = petugas_table.ukpd_id')
            ->join('unit_regu_table', 'unit_regu_table.id = petugas_table.unit_id')
            ->join('jabatan_table', 'jabatan_table.id = petugas_table.jabatan_id')
            ->join('role_management_table', 'role_management_table.id = petugas_table.role_id')
            ->join('status_petugas_table', 'status_petugas_table.id = petugas_table.status_id')
            ->where(["petugas_table.ukpd_id" => $ukpd_id])
            ->orderBy('petugas_table.id desc')
            ->get()->getResultObject();
    }

    // public function getJumlahPetugas()
    // {
    //     return $this->table($this->table)
    //         ->select('*')
    //         ->get()->countAllResults());
    // }


    public function getPetugasWithTTD($id)
    {
        return $this->table($this->table)
            ->select("petugas_table.id, petugas_table.ukpd_id,petugas_table.unit_id, petugas_table.nama, petugas_table.username ,petugas_table.nip, petugas_table.pangkat ,petugas_table.golongan,petugas_table.jabatan_id, petugas_table.role_id,petugas_table.status_id, ukpd_table.ukpd, unit_regu_table.unit_regu, jabatan_table.jabatan, role_management_table.role_management, status_petugas_table.status_petugas, tanda_tangan_petugas_table.tanda_tangan_petugas")
            ->join('ukpd_table', 'ukpd_table.id = petugas_table.ukpd_id')
            ->join('unit_regu_table', 'unit_regu_table.id = petugas_table.unit_id')
            ->join('jabatan_table', 'jabatan_table.id = petugas_table.jabatan_id')
            ->join('role_management_table', 'role_management_table.id = petugas_table.role_id')
            ->join('status_petugas_table', 'status_petugas_table.id = petugas_table.status_id')
            ->join('tanda_tangan_petugas_table', 'tanda_tangan_petugas_table.petugas_id = petugas_table.id', 'left')
            ->where(['petugas_table.id' => $id])
            ->orderBy('petugas_table.id desc')
            ->get()->getRowObject();
    }

    public function getPetugasRow($nip)
    {
        return $this->table($this->table)
            ->select("petugas_table.id, petugas_table.ukpd_id,petugas_table.unit_id, petugas_table.nama, petugas_table.username ,petugas_table.nip, petugas_table.pangkat ,petugas_table.golongan,petugas_table.jabatan_id, petugas_table.role_id,petugas_table.status_id, ukpd_table.ukpd, unit_regu_table.unit_regu, jabatan_table.jabatan, role_management_table.role_management, status_petugas_table.status_petugas")
            ->join('ukpd_table', 'ukpd_table.id = petugas_table.ukpd_id')
            ->join('unit_regu_table', 'unit_regu_table.id = petugas_table.unit_id')
            ->join('jabatan_table', 'jabatan_table.id = petugas_table.jabatan_id')
            ->join('role_management_table', 'role_management_table.id = petugas_table.role_id')
            ->join('status_petugas_table', 'status_petugas_table.id = petugas_table.status_id')
            ->where(["petugas_table.nip" => $nip])
            ->orderBy('petugas_table.id desc')
            ->get()->getRowObject();
    }

    public function getKomandanRegu()
    {
        return $this->table($this->table)
            ->select("petugas_table.id, petugas_table.ukpd_id,petugas_table.unit_id, petugas_table.nama, petugas_table.username ,petugas_table.nip, petugas_table.pangkat ,petugas_table.golongan, petugas_table.jabatan_id, petugas_table.role_id, petugas_table.status_id, 
            tanda_tangan_petugas_table.tanda_tangan_petugas")
            ->join('tanda_tangan_petugas_table', 'tanda_tangan_petugas_table.petugas_id = petugas_table.id', "left")
            ->where(["tanda_tangan_petugas_table.tanda_tangan_petugas" => null])
            ->orderBy('petugas_table.id desc')
            ->get()->getResultObject();
    }

    public function getPPNS($ukpd_id)
    {
        return $this->table($this->table)
            ->select("petugas_table.id, petugas_table.ukpd_id,petugas_table.unit_id, petugas_table.nama, petugas_table.username ,petugas_table.nip, petugas_table.pangkat ,petugas_table.golongan,petugas_table.jabatan_id, petugas_table.role_id,petugas_table.status_id")
            ->where(["petugas_table.ukpd_id" => $ukpd_id])
            ->where(["petugas_table.jabatan_id" => 6])
            ->where(["petugas_table.status_id" => 1])
            ->orderBy('petugas_table.id desc')
            ->get()->getRowObject();
    }

    public function getDataPPNSBAP($ppns_id)
    {
        return $this->table($this->table)
            ->select("petugas_table.id, petugas_table.ukpd_id,petugas_table.unit_id, petugas_table.nama, petugas_table.username ,petugas_table.nip, petugas_table.pangkat ,petugas_table.golongan,petugas_table.jabatan_id, petugas_table.role_id,petugas_table.status_id, tanda_tangan_petugas_table.tanda_tangan_petugas as ttd_ppns")
            ->join('tanda_tangan_petugas_table', 'tanda_tangan_petugas_table.petugas_id = petugas_table.id')
            ->where(["petugas_table.id" => $ppns_id])
            ->orderBy('petugas_table.id desc')
            ->get()->getRowObject();
    }

    public function getPetugasUnit($ukpd_id, $unit_id)
    {
        return $this->table($this->table)
            ->select("petugas_table.id, petugas_table.ukpd_id,petugas_table.unit_id, petugas_table.nama, petugas_table.username ,petugas_table.nip, petugas_table.pangkat ,petugas_table.golongan,petugas_table.jabatan_id, petugas_table.role_id,petugas_table.status_id, ukpd_table.ukpd, unit_regu_table.unit_regu, jabatan_table.jabatan, role_management_table.role_management, status_petugas_table.status_petugas")
            ->join('ukpd_table', 'ukpd_table.id = petugas_table.ukpd_id')
            ->join('unit_regu_table', 'unit_regu_table.id = petugas_table.unit_id')
            ->join('jabatan_table', 'jabatan_table.id = petugas_table.jabatan_id')
            ->join('role_management_table', 'role_management_table.id = petugas_table.role_id')
            ->join('status_petugas_table', 'status_petugas_table.id = petugas_table.status_id')
            ->where(["petugas_table.ukpd_id" => $ukpd_id])
            ->where(["petugas_table.unit_id" => $unit_id])
            ->orderBy('petugas_table.id asc')
            ->get()->getResultObject();
    }
}
