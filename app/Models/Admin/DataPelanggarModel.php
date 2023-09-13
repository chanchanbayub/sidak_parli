<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class DataPelanggarModel extends Model
{
    protected $table            = 'data_pelanggar_table';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['bap_id', 'kartu_identitas_id', 'nomor_identitas', 'nama_pengemudi', 'alamat_pengemudi', 'nomor_hp', 'tanda_tangan_pelanggar'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $fieldTable = 'data_pelanggar_table.bap_id ,data_pelanggar_table.kartu_identitas_id, data_pelanggar_table.nomor_identitas,data_pelanggar_table.nama_pengemudi ,data_pelanggar_table.alamat_pengemudi ,data_pelanggar_table.nomor_hp,data_pelanggar_table.tanda_tangan_pelanggar';
}
