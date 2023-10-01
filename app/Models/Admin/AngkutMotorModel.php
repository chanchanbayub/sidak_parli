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

    // protected $fieldTable = 'data_kendaraan_table.bap_id ,data_kendaraan_table.jenis_kendaraan_id, data_kendaraan_table.type_kendaraan_id,data_kendaraan_table.merk_kendaraan ,data_kendaraan_table.nomor_kendaraan ,data_kendaraan_table.warna_kendaraan';
}
