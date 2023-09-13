<?php

namespace App\Models\Auth;

use CodeIgniter\Model;

class LoginModel extends Model
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

    public function getPetugasRow($username, $nip)
    {
        return $this->table($this->table)
            ->select("petugas_table.id, petugas_table.ukpd_id,petugas_table.unit_id, petugas_table.nama, petugas_table.username ,petugas_table.nip, petugas_table.pangkat ,petugas_table.golongan,petugas_table.jabatan_id, petugas_table.role_id,petugas_table.status_id, ukpd_table.ukpd, unit_regu_table.unit_regu, jabatan_table.jabatan, role_management_table.role_management, status_petugas_table.status_petugas")
            ->join('ukpd_table', 'ukpd_table.id = petugas_table.ukpd_id')
            ->join('unit_regu_table', 'unit_regu_table.id = petugas_table.unit_id')
            ->join('jabatan_table', 'jabatan_table.id = petugas_table.jabatan_id')
            ->join('role_management_table', 'role_management_table.id = petugas_table.role_id')
            ->join('status_petugas_table', 'status_petugas_table.id = petugas_table.status_id')
            ->where(["petugas_table.username" => $username])
            ->where(["petugas_table.nip" => $nip])
            ->orderBy('petugas_table.id desc')
            ->get()->getRowObject();
    }
}
