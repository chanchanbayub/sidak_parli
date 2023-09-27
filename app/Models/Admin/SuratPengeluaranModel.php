<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class SuratPengeluaranModel extends Model
{
    protected $table            = 'surat_pengeluaran_table';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['bap_id', 'jenis_spk_id', 'nomor_spk_pdf'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $fieldTable = 'surat_pengeluaran_table.id, surat_pengeluaran_table.bap_id, surat_pengeluaran_table.jenis_spk_id, surat_pengeluaran_table.nomor_spk_pdf,
    data_kendaraan_table.nomor_kendaraan,
    jenis_spk_table.jenis_spk,
    status_penderekan_table.status_penderekan,
    bap_table.status_bap_id';

    public function getSPK($ukpd_id)
    {
        if ($ukpd_id == null) {
            return $this->table($this->table)
                ->select($this->fieldTable)
                ->join('bap_table', 'bap_table.id = surat_pengeluaran_table.bap_id', 'left')
                ->join('status_penderekan_table', 'bap_table.status_bap_id = status_penderekan_table.id', 'left')
                ->join('data_kendaraan_table', 'bap_table.id = data_kendaraan_table.bap_id', 'left')
                ->join('jenis_spk_table', 'jenis_spk_table.id = surat_pengeluaran_table.jenis_spk_id')
                ->orderBy('surat_pengeluaran_table.id desc')
                ->get()->getResultObject();
        } else {
            return $this->table($this->table)
                ->select($this->fieldTable)
                ->join('bap_table', 'bap_table.id = surat_pengeluaran_table.bap_id', 'left')
                ->join('status_penderekan_table', 'bap_table.status_bap_id = status_penderekan_table.id', 'left')
                ->join('data_kendaraan_table', 'bap_table.id = data_kendaraan_table.bap_id', 'left')
                ->join('jenis_spk_table', 'jenis_spk_table.id = surat_pengeluaran_table.jenis_spk_id')
                ->where(['bap_table.ukpd_id' => $ukpd_id])
                ->orderBy('surat_pengeluaran_table.id desc')
                ->get()->getResultObject();
        }
    }
}
