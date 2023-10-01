<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class AngkutMotorModel extends Model
{
    protected $table            = 'angkut_motor_table';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['ukpd_id', 'jenis_penindakan_id', 'unit_id', 'nopol', 'merk_kendaraan', 'warna_kendaraan', 'tanggal_pelanggaran_angkut', 'jam_pelanggaran_angkut', 'provinsi_id', 'kota_id', 'kecamatan_id', 'lokasi_angkut', 'nama_pengemudi', 'alamat_pengemudi', 'tempat_penyimpanan_id', 'foto_kendaraan_angkut'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $fieldTable = 'angkut_motor_table.id,angkut_motor_table.ukpd_id, angkut_motor_table.jenis_penindakan_id, angkut_motor_table.unit_id, angkut_motor_table.nopol, angkut_motor_table.merk_kendaraan, angkut_motor_table.warna_kendaraan, angkut_motor_table.tanggal_pelanggaran_angkut,angkut_motor_table.jam_pelanggaran_angkut, angkut_motor_table.lokasi_angkut, angkut_motor_table.nama_pengemudi, angkut_motor_table.alamat_pengemudi, angkut_motor_table.foto_kendaraan_angkut, ukpd_table.ukpd, jenis_penindakan_table.jenis_penindakan, unit_regu_table.unit_regu, provinsi.provinsi, kota.kabupaten_kota, kecamatan.kecamatan, tempat_penyimpanan_table.tempat_penyimpanan';

    public function getAngkutMotor($ukpd_id)
    {
        if ($ukpd_id == null) {
            return $this->table($this->table)
                ->select($this->fieldTable)
                ->join('ukpd_table', 'ukpd_table.id = angkut_motor_table.ukpd_id', 'left')
                ->join('jenis_penindakan_table', 'jenis_penindakan_table.id = angkut_motor_table.jenis_penindakan_id', 'left')
                ->join('tempat_penyimpanan_table', 'tempat_penyimpanan_table.id = angkut_motor_table.tempat_penyimpanan_id', 'left')
                ->join('unit_regu_table', 'unit_regu_table.id = angkut_motor_table.unit_id', 'left')
                ->join('provinsi', 'provinsi.id = angkut_motor_table.provinsi_id')
                ->join('kota', 'kota.id = angkut_motor_table.kota_id')
                ->join('kecamatan', 'kecamatan.id = angkut_motor_table.kecamatan_id')
                ->orderBy('angkut_motor_table.id desc')
                ->get()->getResultObject();
        } else {
            return $this->table($this->table)
                ->select($this->fieldTable)
                ->join('ukpd_table', 'ukpd_table.id = angkut_motor_table.ukpd_id', 'left')
                ->join('jenis_penindakan_table', 'jenis_penindakan_table.id = angkut_motor_table.jenis_penindakan_id', 'left')
                ->join('tempat_penyimpanan_table', 'tempat_penyimpanan_table.id = angkut_motor_table.tempat_penyimpanan_id', 'left')
                ->join('unit_regu_table', 'unit_regu_table.id = angkut_motor_table.unit_id', 'left')
                ->join('provinsi', 'provinsi.id = angkut_motor_table.provinsi_id')
                ->join('kota', 'kota.id = angkut_motor_table.kota_id')
                ->join('kecamatan', 'kecamatan.id = angkut_motor_table.kecamatan_id')
                ->where(["angkut_motor_table.ukpd_id" => $ukpd_id])
                ->orderBy('angkut_motor_table.id desc')
                ->get()->getResultObject();
        }
    }
}
