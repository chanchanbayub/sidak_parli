<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class DataKendaraanModel extends Model
{
    protected $table            = 'data_kendaraan_table';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['bap_id', 'jenis_kendaraan_id', 'type_kendaraan_id', 'merk_kendaraan', 'nomor_kendaraan', 'warna_kendaraan'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $fieldTable = 'data_kendaraan_table.bap_id ,data_kendaraan_table.jenis_kendaraan_id, data_kendaraan_table.type_kendaraan_id,data_kendaraan_table.merk_kendaraan ,data_kendaraan_table.nomor_kendaraan ,data_kendaraan_table.warna_kendaraan';
}
