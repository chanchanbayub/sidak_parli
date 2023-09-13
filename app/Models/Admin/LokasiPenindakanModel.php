<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class LokasiPenindakanModel extends Model
{
    protected $table            = 'lokasi_penindakan_table';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['bap_id', 'provinsi_id', 'kota_id', 'kecamatan_id', 'nama_jalan', 'nama_gedung'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $fieldTable = 'lokasi_penindakan_table.bap_id ,lokasi_penindakan_table.provinsi_id, lokasi_penindakan_table.kota_id,lokasi_penindakan_table.kecamatan_id ,lokasi_penindakan_table.nama_jalan ,lokasi_penindakan_table.nama_gedung';
}
