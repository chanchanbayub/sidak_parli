<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class DataPenindakanModel extends Model
{
    protected $table            = 'data_penindakan_table';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['ukpd_id', 'ppns_id', 'spt_id',  'bap_id', 'jenis_pelanggaran_id', 'tanggal_pelanggaran', 'jam_pelanggaran', 'tempat_penyimpanan_id'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $fieldTable =
    'data_penindakan_table.id, data_penindakan_table.ukpd_id, data_penindakan_table.ppns_id, data_penindakan_table.spt_id,data_penindakan_table.bap_id, data_penindakan_table.jenis_pelanggaran_id,data_penindakan_table.tanggal_pelanggaran, data_penindakan_table.jam_pelanggaran, data_penindakan_table.tempat_penyimpanan_id,
    ukpd_table.ukpd,
    status_penderekan_table.status_penderekan,
    bap_table.nomor_bap, bap_table.status_bap_id, bap_table.unit_id,
    data_kendaraan_table.nomor_kendaraan,data_kendaraan_table.merk_kendaraan, data_kendaraan_table.warna_kendaraan, data_kendaraan_table.jenis_kendaraan_id,data_kendaraan_table.type_kendaraan_id,
    jenis_kendaraan_table.jenis_kendaraan,
    type_kendaraan_table.type_kendaraan,
    jenis_penindakan_table.jenis_penindakan,
    nomor_spt_table.nomor_surat, nomor_spt_table.tanggal_surat,
    tempat_penyimpanan_table.tempat_penyimpanan,
    jenis_pelanggaran_table.jenis_pelanggaran,
    unit_regu_table.unit_regu,
    data_pelanggar_table.nomor_identitas, data_pelanggar_table.nama_pengemudi,data_pelanggar_table.alamat_pengemudi, data_pelanggar_table.nomor_hp, data_pelanggar_table.tanda_tangan_pelanggar,
    kartu_identitas_table.kartu_identitas,
    petugas_table.nama, petugas_table.nip, 
    tanda_tangan_petugas_table.tanda_tangan_petugas,
    lokasi_penindakan_table.nama_jalan, lokasi_penindakan_table.nama_gedung,lokasi_penindakan_table.provinsi_id, lokasi_penindakan_table.kota_id, lokasi_penindakan_table.kecamatan_id, 
    provinsi.provinsi,
    kota.kabupaten_kota,
    kecamatan.kecamatan,
    foto_penindakan_table.foto_penindakan_1,foto_penindakan_table.foto_penindakan_2,
    surat_pengeluaran_table.nomor_surat,
    jenis_spk_table.jenis_spk
    ';

    protected $dataTable = 'data_penindakan_table.id, data_penindakan_table.ukpd_id, data_penindakan_table.ppns_id, data_penindakan_table.spt_id,data_penindakan_table.bap_id, data_penindakan_table.jenis_pelanggaran_id,data_penindakan_table.tanggal_pelanggaran, data_penindakan_table.jam_pelanggaran, data_penindakan_table.tempat_penyimpanan_id,
    ukpd_table.ukpd, bap_table.nomor_bap, bap_table.jenis_penindakan_id ,bap_table.unit_id, bap_table.status_bap_id,data_kendaraan_table.nomor_kendaraan, jenis_penindakan_table.jenis_penindakan, tempat_penyimpanan_table.tempat_penyimpanan, status_penderekan_table.status_penderekan';

    public function getDataPenindakan()
    {
        return $this->table($this->table)
            ->select($this->dataTable)
            ->join('ukpd_table', 'ukpd_table.id = data_penindakan_table.ukpd_id', 'left')
            ->join('bap_table', 'bap_table.id = data_penindakan_table.bap_id')
            ->join('jenis_penindakan_table', 'jenis_penindakan_table.id = bap_table.jenis_penindakan_id', 'left')
            ->join('status_penderekan_table', 'status_penderekan_table.id = bap_table.status_bap_id', 'left')
            ->join('data_kendaraan_table', 'bap_table.id = data_kendaraan_table.bap_id')
            ->join('jenis_kendaraan_table', 'data_kendaraan_table.jenis_kendaraan_id = jenis_kendaraan_table.id', 'left')
            ->join('type_kendaraan_table', 'data_kendaraan_table.type_kendaraan_id = type_kendaraan_table.id', 'left')
            ->join('nomor_spt_table', 'nomor_spt_table.id = data_penindakan_table.spt_id')
            ->join('tempat_penyimpanan_table', 'tempat_penyimpanan_table.id = data_penindakan_table.tempat_penyimpanan_id', 'left')
            ->join('jenis_pelanggaran_table', 'jenis_pelanggaran_table.id = data_penindakan_table.jenis_pelanggaran_id', 'left')
            ->join('unit_regu_table', 'unit_regu_table.id = bap_table.unit_id')
            ->join('data_pelanggar_table', 'data_pelanggar_table.bap_id = data_penindakan_table.bap_id', 'left')
            ->join('kartu_identitas_table', 'kartu_identitas_table.id = data_pelanggar_table.kartu_identitas_id', 'left')
            ->join('petugas_table', 'petugas_table.unit_id = unit_regu_table.id')
            ->join('tanda_tangan_petugas_table', 'tanda_tangan_petugas_table.petugas_id = petugas_table.id')
            ->join('lokasi_penindakan_table', 'lokasi_penindakan_table.bap_id = data_penindakan_table.bap_id', 'left')
            ->join('provinsi', 'provinsi.id = lokasi_penindakan_table.provinsi_id')
            ->join('kota', 'kota.id = lokasi_penindakan_table.kota_id')
            ->join('kecamatan', 'kecamatan.id = lokasi_penindakan_table.kecamatan_id')
            ->join('foto_penindakan_table', 'bap_table.id = foto_penindakan_table.bap_id')
            ->join('surat_pengeluaran_table', 'bap_table.id = surat_pengeluaran_table.bap_id', 'left')
            ->join('jenis_spk_table', 'jenis_spk_table.id = surat_pengeluaran_table.jenis_spk_id', 'left')
            ->orderBy('data_penindakan_table.id desc')
            ->get()->getResultObject();
    }

    public function getDataPenindakanPenderekan()
    {
        return $this->table($this->table)
            ->select($this->dataTable)
            ->join('ukpd_table', 'ukpd_table.id = data_penindakan_table.ukpd_id')
            ->join('bap_table', 'bap_table.id = data_penindakan_table.bap_id', 'left')
            ->join('jenis_penindakan_table', 'jenis_penindakan_table.id = bap_table.jenis_penindakan_id', 'left')
            ->join('tempat_penyimpanan_table', 'tempat_penyimpanan_table.id = data_penindakan_table.tempat_penyimpanan_id', 'left')
            ->join('status_penderekan_table', 'status_penderekan_table.id = bap_table.status_bap_id', 'left')
            ->join('data_kendaraan_table', ' bap_table.id = data_kendaraan_table.bap_id', 'left')
            ->orderBy('data_penindakan_table.id desc')
            ->get()->getResultObject();
    }


    public function getDataPenindakanStatusBAPTerbayar()
    {
        return $this->table($this->table)
            ->select($this->fieldTable)
            ->join('ukpd_table', 'ukpd_table.id = data_penindakan_table.ukpd_id', 'left')
            ->join('bap_table', 'bap_table.id = data_penindakan_table.bap_id')
            ->join('jenis_penindakan_table', 'jenis_penindakan_table.id = bap_table.jenis_penindakan_id', 'left')
            ->join('status_penderekan_table', 'status_penderekan_table.id = bap_table.status_bap_id', 'left')
            ->join('data_kendaraan_table', 'bap_table.id = data_kendaraan_table.bap_id')
            ->join('jenis_kendaraan_table', 'data_kendaraan_table.jenis_kendaraan_id = jenis_kendaraan_table.id', 'left')
            ->join('type_kendaraan_table', 'data_kendaraan_table.type_kendaraan_id = type_kendaraan_table.id', 'left')
            ->join('nomor_spt_table', 'nomor_spt_table.id = data_penindakan_table.spt_id')
            ->join('tempat_penyimpanan_table', 'tempat_penyimpanan_table.id = data_penindakan_table.tempat_penyimpanan_id', 'left')
            ->join('jenis_pelanggaran_table', 'jenis_pelanggaran_table.id = data_penindakan_table.jenis_pelanggaran_id', 'left')
            ->join('unit_regu_table', 'unit_regu_table.id = bap_table.unit_id')
            ->join('data_pelanggar_table', 'data_pelanggar_table.bap_id = data_penindakan_table.bap_id', 'left')
            ->join('kartu_identitas_table', 'kartu_identitas_table.id = data_pelanggar_table.kartu_identitas_id', 'left')
            ->join('petugas_table', 'petugas_table.unit_id = unit_regu_table.id')
            ->join('tanda_tangan_petugas_table', 'tanda_tangan_petugas_table.petugas_id = petugas_table.id')
            ->join('lokasi_penindakan_table', 'lokasi_penindakan_table.bap_id = data_penindakan_table.bap_id', 'left')
            ->join('provinsi', 'provinsi.id = lokasi_penindakan_table.provinsi_id')
            ->join('kota', 'kota.id = lokasi_penindakan_table.kota_id')
            ->join('kecamatan', 'kecamatan.id = lokasi_penindakan_table.kecamatan_id')
            ->join('foto_penindakan_table', 'bap_table.id = foto_penindakan_table.bap_id')
            ->join('surat_pengeluaran_table', 'bap_table.id = surat_pengeluaran_table.bap_id', 'left')
            ->join('jenis_spk_table', 'jenis_spk_table.id = surat_pengeluaran_table.jenis_spk_id', 'left')
            ->where(["bap_table.status_bap_id" => 3])
            ->orderBy('data_penindakan_table.id desc')
            ->get()->getResultObject();
    }

    public function getDataPenindakanWithNomorBAP($nomor_bap)
    {
        return $this->table($this->table)
            ->select($this->fieldTable)
            ->join('ukpd_table', 'ukpd_table.id = data_penindakan_table.ukpd_id', 'left')
            ->join('bap_table', 'bap_table.id = data_penindakan_table.bap_id')
            ->join('jenis_penindakan_table', 'jenis_penindakan_table.id = bap_table.jenis_penindakan_id', 'left')
            ->join('status_penderekan_table', 'status_penderekan_table.id = bap_table.status_bap_id', 'left')
            ->join('data_kendaraan_table', 'bap_table.id = data_kendaraan_table.bap_id')
            ->join('jenis_kendaraan_table', 'data_kendaraan_table.jenis_kendaraan_id = jenis_kendaraan_table.id', 'left')
            ->join('type_kendaraan_table', 'data_kendaraan_table.type_kendaraan_id = type_kendaraan_table.id', 'left')
            ->join('nomor_spt_table', 'nomor_spt_table.id = data_penindakan_table.spt_id')
            ->join('tempat_penyimpanan_table', 'tempat_penyimpanan_table.id = data_penindakan_table.tempat_penyimpanan_id', 'left')
            ->join('jenis_pelanggaran_table', 'jenis_pelanggaran_table.id = data_penindakan_table.jenis_pelanggaran_id', 'left')
            ->join('unit_regu_table', 'unit_regu_table.id = bap_table.unit_id')
            ->join('data_pelanggar_table', 'data_pelanggar_table.bap_id = data_penindakan_table.bap_id', 'left')
            ->join('kartu_identitas_table', 'kartu_identitas_table.id = data_pelanggar_table.kartu_identitas_id', 'left')
            ->join('petugas_table', 'petugas_table.unit_id = unit_regu_table.id')
            ->join('tanda_tangan_petugas_table', 'tanda_tangan_petugas_table.petugas_id = petugas_table.id')
            ->join('lokasi_penindakan_table', 'lokasi_penindakan_table.bap_id = data_penindakan_table.bap_id', 'left')
            ->join('provinsi', 'provinsi.id = lokasi_penindakan_table.provinsi_id')
            ->join('kota', 'kota.id = lokasi_penindakan_table.kota_id')
            ->join('kecamatan', 'kecamatan.id = lokasi_penindakan_table.kecamatan_id')
            ->join('foto_penindakan_table', 'bap_table.id = foto_penindakan_table.bap_id', 'left')
            ->join('surat_pengeluaran_table', 'bap_table.id = surat_pengeluaran_table.bap_id', 'left')
            ->join('jenis_spk_table', 'jenis_spk_table.id = surat_pengeluaran_table.jenis_spk_id', 'left')
            ->where(["bap_table.nomor_bap" => $nomor_bap])
            ->orderBy('data_penindakan_table.id desc')
            ->get()->getRowObject();
    }

    public function getDataPenindakanWithId($id)
    {
        return $this->table($this->table)
            ->select($this->fieldTable)
            ->join('ukpd_table', 'ukpd_table.id = data_penindakan_table.ukpd_id', 'left')
            ->join('bap_table', 'bap_table.id = data_penindakan_table.bap_id')
            ->join('jenis_penindakan_table', 'jenis_penindakan_table.id = bap_table.jenis_penindakan_id', 'left')
            ->join('status_penderekan_table', 'status_penderekan_table.id = bap_table.status_bap_id', 'left')
            ->join('data_kendaraan_table', 'bap_table.id = data_kendaraan_table.bap_id')
            ->join('jenis_kendaraan_table', 'data_kendaraan_table.jenis_kendaraan_id = jenis_kendaraan_table.id', 'left')
            ->join('type_kendaraan_table', 'data_kendaraan_table.type_kendaraan_id = type_kendaraan_table.id', 'left')
            ->join('nomor_spt_table', 'nomor_spt_table.id = data_penindakan_table.spt_id')
            ->join('tempat_penyimpanan_table', 'tempat_penyimpanan_table.id = data_penindakan_table.tempat_penyimpanan_id', 'left')
            ->join('jenis_pelanggaran_table', 'jenis_pelanggaran_table.id = data_penindakan_table.jenis_pelanggaran_id', 'left')
            ->join('unit_regu_table', 'unit_regu_table.id = bap_table.unit_id')
            ->join('data_pelanggar_table', 'data_pelanggar_table.bap_id = data_penindakan_table.bap_id', 'left')
            ->join('kartu_identitas_table', 'kartu_identitas_table.id = data_pelanggar_table.kartu_identitas_id', 'left')
            ->join('petugas_table', 'petugas_table.unit_id = unit_regu_table.id')
            ->join('tanda_tangan_petugas_table', 'tanda_tangan_petugas_table.petugas_id = petugas_table.id')
            ->join('lokasi_penindakan_table', 'lokasi_penindakan_table.bap_id = data_penindakan_table.bap_id', 'left')
            ->join('provinsi', 'provinsi.id = lokasi_penindakan_table.provinsi_id')
            ->join('kota', 'kota.id = lokasi_penindakan_table.kota_id')
            ->join('kecamatan', 'kecamatan.id = lokasi_penindakan_table.kecamatan_id')
            ->join('foto_penindakan_table', 'bap_table.id = foto_penindakan_table.bap_id')
            ->join('surat_pengeluaran_table', 'bap_table.id = surat_pengeluaran_table.bap_id', 'left')
            ->join('jenis_spk_table', 'jenis_spk_table.id = surat_pengeluaran_table.jenis_spk_id', 'left')
            ->where(["data_penindakan_table.id" => $id])
            ->orderBy('data_penindakan_table.id desc')
            ->get()->getRowObject();
    }

    public function totalPenderekan()
    {
        return $this->table($this->table)

            ->where(["bap_table.jenis_penindakan_id" => 1])

            ->countAllResults();
    }

    public function totalPenderekanPerhari($tanggal_pelanggaran)
    {
        return $this->table($this->table)
            ->where(["jenis_penindakan_id" => 1])
            ->where(["tanggal_pelanggaran" => $tanggal_pelanggaran])
            ->countAllResults();
    }

    public function totalPenderekanTerbayarDetail()
    {
        return $this->table($this->table)
            ->select($this->fieldTable)
            ->join('ukpd_table', 'ukpd_table.id = data_penindakan_table.ukpd_id', 'left')
            ->join('bap_table', 'bap_table.id = data_penindakan_table.bap_id')
            ->join('jenis_penindakan_table', 'jenis_penindakan_table.id = bap_table.jenis_penindakan_id', 'left')
            ->join('status_penderekan_table', 'status_penderekan_table.id = bap_table.status_bap_id', 'left')
            ->join('data_kendaraan_table', 'bap_table.id = data_kendaraan_table.bap_id')
            ->join('jenis_kendaraan_table', 'data_kendaraan_table.jenis_kendaraan_id = jenis_kendaraan_table.id', 'left')
            ->join('type_kendaraan_table', 'data_kendaraan_table.type_kendaraan_id = type_kendaraan_table.id', 'left')
            ->join('nomor_spt_table', 'nomor_spt_table.id = data_penindakan_table.spt_id')
            ->join('tempat_penyimpanan_table', 'tempat_penyimpanan_table.id = data_penindakan_table.tempat_penyimpanan_id', 'left')
            ->join('jenis_pelanggaran_table', 'jenis_pelanggaran_table.id = data_penindakan_table.jenis_pelanggaran_id', 'left')
            ->join('unit_regu_table', 'unit_regu_table.id = bap_table.unit_id')
            ->join('data_pelanggar_table', 'data_pelanggar_table.bap_id = data_penindakan_table.bap_id', 'left')
            ->join('kartu_identitas_table', 'kartu_identitas_table.id = data_pelanggar_table.kartu_identitas_id', 'left')
            ->join('petugas_table', 'petugas_table.unit_id = unit_regu_table.id')
            ->join('tanda_tangan_petugas_table', 'tanda_tangan_petugas_table.petugas_id = petugas_table.id')
            ->join('lokasi_penindakan_table', 'lokasi_penindakan_table.bap_id = data_penindakan_table.bap_id', 'left')
            ->join('provinsi', 'provinsi.id = lokasi_penindakan_table.provinsi_id')
            ->join('kota', 'kota.id = lokasi_penindakan_table.kota_id')
            ->join('kecamatan', 'kecamatan.id = lokasi_penindakan_table.kecamatan_id')
            ->join('foto_penindakan_table', 'bap_table.id = foto_penindakan_table.bap_id')
            ->join('surat_pengeluaran_table', 'bap_table.id = surat_pengeluaran_table.bap_id', 'left')
            ->join('jenis_spk_table', 'jenis_spk_table.id = surat_pengeluaran_table.jenis_spk_id', 'left')
            ->where(["bap_table.jenis_penindakan_id" => 1])
            ->where(["bap_table.status_bap_id" => 4])
            ->get()->getResultObject();
    }

    public function totalPenderekanTerbayarDetailPerhari($tanggal_pelanggaran)
    {
        return $this->table($this->table)
            ->select($this->fieldTable)
            ->join('ukpd_table', 'ukpd_table.id = data_penindakan_table.ukpd_id', 'left')
            ->join('bap_table', 'bap_table.id = data_penindakan_table.bap_id')
            ->join('jenis_penindakan_table', 'jenis_penindakan_table.id = bap_table.jenis_penindakan_id', 'left')
            ->join('status_penderekan_table', 'status_penderekan_table.id = bap_table.status_bap_id', 'left')
            ->join('data_kendaraan_table', 'bap_table.id = data_kendaraan_table.bap_id')
            ->join('jenis_kendaraan_table', 'data_kendaraan_table.jenis_kendaraan_id = jenis_kendaraan_table.id', 'left')
            ->join('type_kendaraan_table', 'data_kendaraan_table.type_kendaraan_id = type_kendaraan_table.id', 'left')
            ->join('nomor_spt_table', 'nomor_spt_table.id = data_penindakan_table.spt_id')
            ->join('tempat_penyimpanan_table', 'tempat_penyimpanan_table.id = data_penindakan_table.tempat_penyimpanan_id', 'left')
            ->join('jenis_pelanggaran_table', 'jenis_pelanggaran_table.id = data_penindakan_table.jenis_pelanggaran_id', 'left')
            ->join('unit_regu_table', 'unit_regu_table.id = bap_table.unit_id')
            ->join('data_pelanggar_table', 'data_pelanggar_table.bap_id = data_penindakan_table.bap_id', 'left')
            ->join('kartu_identitas_table', 'kartu_identitas_table.id = data_pelanggar_table.kartu_identitas_id', 'left')
            ->join('petugas_table', 'petugas_table.unit_id = unit_regu_table.id')
            ->join('tanda_tangan_petugas_table', 'tanda_tangan_petugas_table.petugas_id = petugas_table.id')
            ->join('lokasi_penindakan_table', 'lokasi_penindakan_table.bap_id = data_penindakan_table.bap_id', 'left')
            ->join('provinsi', 'provinsi.id = lokasi_penindakan_table.provinsi_id')
            ->join('kota', 'kota.id = lokasi_penindakan_table.kota_id')
            ->join('kecamatan', 'kecamatan.id = lokasi_penindakan_table.kecamatan_id')
            ->join('foto_penindakan_table', 'bap_table.id = foto_penindakan_table.bap_id')
            ->join('surat_pengeluaran_table', 'bap_table.id = surat_pengeluaran_table.bap_id', 'left')
            ->join('jenis_spk_table', 'jenis_spk_table.id = surat_pengeluaran_table.jenis_spk_id', 'left')
            ->where(["bap_table.jenis_penindakan_id" => 1])
            ->where(["bap_table.status_bap_id" => 4])
            ->where(["data_penindakan_table.tanggal_pelanggaran" => $tanggal_pelanggaran])
            ->get()->getResultObject();
    }

    public function totalPenderekanBelumTerbayarDetail()
    {
        return $this->table($this->table)
            ->select($this->fieldTable)
            ->join('ukpd_table', 'ukpd_table.id = data_penindakan_table.ukpd_id', 'left')
            ->join('bap_table', 'bap_table.id = data_penindakan_table.bap_id')
            ->join('jenis_penindakan_table', 'jenis_penindakan_table.id = bap_table.jenis_penindakan_id', 'left')
            ->join('status_penderekan_table', 'status_penderekan_table.id = bap_table.status_bap_id', 'left')
            ->join('data_kendaraan_table', 'bap_table.id = data_kendaraan_table.bap_id')
            ->join('jenis_kendaraan_table', 'data_kendaraan_table.jenis_kendaraan_id = jenis_kendaraan_table.id', 'left')
            ->join('type_kendaraan_table', 'data_kendaraan_table.type_kendaraan_id = type_kendaraan_table.id', 'left')
            ->join('nomor_spt_table', 'nomor_spt_table.id = data_penindakan_table.spt_id')
            ->join('tempat_penyimpanan_table', 'tempat_penyimpanan_table.id = data_penindakan_table.tempat_penyimpanan_id', 'left')
            ->join('jenis_pelanggaran_table', 'jenis_pelanggaran_table.id = data_penindakan_table.jenis_pelanggaran_id', 'left')
            ->join('unit_regu_table', 'unit_regu_table.id = bap_table.unit_id')
            ->join('data_pelanggar_table', 'data_pelanggar_table.bap_id = data_penindakan_table.bap_id', 'left')
            ->join('kartu_identitas_table', 'kartu_identitas_table.id = data_pelanggar_table.kartu_identitas_id', 'left')
            ->join('petugas_table', 'petugas_table.unit_id = unit_regu_table.id')
            ->join('tanda_tangan_petugas_table', 'tanda_tangan_petugas_table.petugas_id = petugas_table.id')
            ->join('lokasi_penindakan_table', 'lokasi_penindakan_table.bap_id = data_penindakan_table.bap_id', 'left')
            ->join('provinsi', 'provinsi.id = lokasi_penindakan_table.provinsi_id')
            ->join('kota', 'kota.id = lokasi_penindakan_table.kota_id')
            ->join('kecamatan', 'kecamatan.id = lokasi_penindakan_table.kecamatan_id')
            ->join('foto_penindakan_table', 'bap_table.id = foto_penindakan_table.bap_id')
            ->join('surat_pengeluaran_table', 'bap_table.id = surat_pengeluaran_table.bap_id', 'left')
            ->join('jenis_spk_table', 'jenis_spk_table.id = surat_pengeluaran_table.jenis_spk_id', 'left')
            ->where(["bap_table.jenis_penindakan_id" => 1])
            ->where(["bap_table.status_bap_id" => 3])
            ->orWhere(["bap_table.status_bap_id" => 2])
            ->get()->getResultObject();
    }

    public function totalPenderekanBelumTerbayarDetailPerhari($tanggal_pelanggaran)
    {
        return $this->table($this->table)
            ->select($this->fieldTable)
            ->join('ukpd_table', 'ukpd_table.id = data_penindakan_table.ukpd_id', 'left')
            ->join('bap_table', 'bap_table.id = data_penindakan_table.bap_id')
            ->join('jenis_penindakan_table', 'jenis_penindakan_table.id = bap_table.jenis_penindakan_id', 'left')
            ->join('status_penderekan_table', 'status_penderekan_table.id = bap_table.status_bap_id', 'left')
            ->join('data_kendaraan_table', 'bap_table.id = data_kendaraan_table.bap_id')
            ->join('jenis_kendaraan_table', 'data_kendaraan_table.jenis_kendaraan_id = jenis_kendaraan_table.id', 'left')
            ->join('type_kendaraan_table', 'data_kendaraan_table.type_kendaraan_id = type_kendaraan_table.id', 'left')
            ->join('nomor_spt_table', 'nomor_spt_table.id = data_penindakan_table.spt_id')
            ->join('tempat_penyimpanan_table', 'tempat_penyimpanan_table.id = data_penindakan_table.tempat_penyimpanan_id', 'left')
            ->join('jenis_pelanggaran_table', 'jenis_pelanggaran_table.id = data_penindakan_table.jenis_pelanggaran_id', 'left')
            ->join('unit_regu_table', 'unit_regu_table.id = bap_table.unit_id')
            ->join('data_pelanggar_table', 'data_pelanggar_table.bap_id = data_penindakan_table.bap_id', 'left')
            ->join('kartu_identitas_table', 'kartu_identitas_table.id = data_pelanggar_table.kartu_identitas_id', 'left')
            ->join('petugas_table', 'petugas_table.unit_id = unit_regu_table.id')
            ->join('tanda_tangan_petugas_table', 'tanda_tangan_petugas_table.petugas_id = petugas_table.id')
            ->join('lokasi_penindakan_table', 'lokasi_penindakan_table.bap_id = data_penindakan_table.bap_id', 'left')
            ->join('provinsi', 'provinsi.id = lokasi_penindakan_table.provinsi_id')
            ->join('kota', 'kota.id = lokasi_penindakan_table.kota_id')
            ->join('kecamatan', 'kecamatan.id = lokasi_penindakan_table.kecamatan_id')
            ->join('foto_penindakan_table', 'bap_table.id = foto_penindakan_table.bap_id')
            ->join('surat_pengeluaran_table', 'bap_table.id = surat_pengeluaran_table.bap_id', 'left')
            ->join('jenis_spk_table', 'jenis_spk_table.id = surat_pengeluaran_table.jenis_spk_id', 'left')
            ->where(["bap_table.jenis_penindakan_id" => 1])
            ->where(["bap_table.status_bap_id" => 3])
            ->orWhere(["bap_table.status_bap_id" => 2])
            ->where(["data_penindakan_table.tanggal_pelanggaran" => $tanggal_pelanggaran])
            ->get()->getResultObject();
    }

    public function totalPenderekanSelesai()
    {
        return $this->table($this->table)
            ->select($this->fieldTable)
            ->join('ukpd_table', 'ukpd_table.id = data_penindakan_table.ukpd_id', 'left')
            ->join('bap_table', 'bap_table.id = data_penindakan_table.bap_id')
            ->join('jenis_penindakan_table', 'jenis_penindakan_table.id = bap_table.jenis_penindakan_id', 'left')
            ->join('status_penderekan_table', 'status_penderekan_table.id = bap_table.status_bap_id', 'left')
            ->join('data_kendaraan_table', 'bap_table.id = data_kendaraan_table.bap_id')
            ->join('jenis_kendaraan_table', 'data_kendaraan_table.jenis_kendaraan_id = jenis_kendaraan_table.id', 'left')
            ->join('type_kendaraan_table', 'data_kendaraan_table.type_kendaraan_id = type_kendaraan_table.id', 'left')
            ->join('nomor_spt_table', 'nomor_spt_table.id = data_penindakan_table.spt_id')
            ->join('tempat_penyimpanan_table', 'tempat_penyimpanan_table.id = data_penindakan_table.tempat_penyimpanan_id', 'left')
            ->join('jenis_pelanggaran_table', 'jenis_pelanggaran_table.id = data_penindakan_table.jenis_pelanggaran_id', 'left')
            ->join('unit_regu_table', 'unit_regu_table.id = bap_table.unit_id')
            ->join('data_pelanggar_table', 'data_pelanggar_table.bap_id = data_penindakan_table.bap_id', 'left')
            ->join('kartu_identitas_table', 'kartu_identitas_table.id = data_pelanggar_table.kartu_identitas_id', 'left')
            ->join('petugas_table', 'petugas_table.unit_id = unit_regu_table.id')
            ->join('tanda_tangan_petugas_table', 'tanda_tangan_petugas_table.petugas_id = petugas_table.id')
            ->join('lokasi_penindakan_table', 'lokasi_penindakan_table.bap_id = data_penindakan_table.bap_id', 'left')
            ->join('provinsi', 'provinsi.id = lokasi_penindakan_table.provinsi_id')
            ->join('kota', 'kota.id = lokasi_penindakan_table.kota_id')
            ->join('kecamatan', 'kecamatan.id = lokasi_penindakan_table.kecamatan_id')
            ->join('foto_penindakan_table', 'bap_table.id = foto_penindakan_table.bap_id')
            ->join('surat_pengeluaran_table', 'bap_table.id = surat_pengeluaran_table.bap_id', 'left')
            ->join('jenis_spk_table', 'jenis_spk_table.id = surat_pengeluaran_table.jenis_spk_id', 'left')
            ->where(["bap_table.jenis_penindakan_id" => 1])
            ->where(["bap_table.status_bap_id" => 5])
            ->get()->getResultObject();
    }

    public function totalPenderekanSelesaiPerhari($tanggal_pelanggaran)
    {
        return $this->table($this->table)
            ->select($this->fieldTable)
            ->join('ukpd_table', 'ukpd_table.id = data_penindakan_table.ukpd_id', 'left')
            ->join('bap_table', 'bap_table.id = data_penindakan_table.bap_id')
            ->join('jenis_penindakan_table', 'jenis_penindakan_table.id = bap_table.jenis_penindakan_id', 'left')
            ->join('status_penderekan_table', 'status_penderekan_table.id = bap_table.status_bap_id', 'left')
            ->join('data_kendaraan_table', 'bap_table.id = data_kendaraan_table.bap_id')
            ->join('jenis_kendaraan_table', 'data_kendaraan_table.jenis_kendaraan_id = jenis_kendaraan_table.id', 'left')
            ->join('type_kendaraan_table', 'data_kendaraan_table.type_kendaraan_id = type_kendaraan_table.id', 'left')
            ->join('nomor_spt_table', 'nomor_spt_table.id = data_penindakan_table.spt_id')
            ->join('tempat_penyimpanan_table', 'tempat_penyimpanan_table.id = data_penindakan_table.tempat_penyimpanan_id', 'left')
            ->join('jenis_pelanggaran_table', 'jenis_pelanggaran_table.id = data_penindakan_table.jenis_pelanggaran_id', 'left')
            ->join('unit_regu_table', 'unit_regu_table.id = bap_table.unit_id')
            ->join('data_pelanggar_table', 'data_pelanggar_table.bap_id = data_penindakan_table.bap_id', 'left')
            ->join('kartu_identitas_table', 'kartu_identitas_table.id = data_pelanggar_table.kartu_identitas_id', 'left')
            ->join('petugas_table', 'petugas_table.unit_id = unit_regu_table.id')
            ->join('tanda_tangan_petugas_table', 'tanda_tangan_petugas_table.petugas_id = petugas_table.id')
            ->join('lokasi_penindakan_table', 'lokasi_penindakan_table.bap_id = data_penindakan_table.bap_id', 'left')
            ->join('provinsi', 'provinsi.id = lokasi_penindakan_table.provinsi_id')
            ->join('kota', 'kota.id = lokasi_penindakan_table.kota_id')
            ->join('kecamatan', 'kecamatan.id = lokasi_penindakan_table.kecamatan_id')
            ->join('foto_penindakan_table', 'bap_table.id = foto_penindakan_table.bap_id')
            ->join('surat_pengeluaran_table', 'bap_table.id = surat_pengeluaran_table.bap_id', 'left')
            ->join('jenis_spk_table', 'jenis_spk_table.id = surat_pengeluaran_table.jenis_spk_id', 'left')
            ->where(["bap_table.jenis_penindakan_id" => 1])
            ->where(["bap_table.status_bap_id" => 5])
            ->where(["data_penindakan_table.tanggal_pelanggaran" => $tanggal_pelanggaran])
            ->get()->getResultObject();
    }

    // public function totalAngkutMotor()
    // {
    //     return $this->table($this->table)
    //         ->where(["jenis_penindakan_id" => 5])
    //         ->countAllResults();
    // }
}
