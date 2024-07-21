<?php

namespace App\Controllers\Petugas;

use App\Controllers\BaseController;
use App\Models\Admin\BAPModel;
use App\Models\Admin\DataKendaraanModel;
use App\Models\Admin\DataPelanggarModel;
use App\Models\Admin\FotoPenindakanModel;
use App\Models\Admin\JenisKendaraanModel;
use App\Models\Admin\JenisPelanggaranModel;
use App\Models\Admin\JenisPenindakanModel;
use App\Models\Admin\KartuIdentitasModel;
use App\Models\Admin\KecamatanModel;
use App\Models\Admin\KotaModel;
use App\Models\Admin\LokasiPenindakanModel;
use App\Models\Admin\PetugasModel;
use App\Models\Admin\ProvinsiModel;
use App\Models\Admin\SPTModel;
use App\Models\Admin\SuratPengeluaranModel;
use App\Models\Admin\TempatPenyimpananModel;
use App\Models\Admin\TypeKendaraanModel;
use App\Models\Admin\UkpdModel;
use App\Models\Admin\UnitReguModel;
use App\Models\Petugas\DataPenindakanModel;

class DataPenindakan extends BaseController
{
    protected $ukpdModel;
    protected $petugasModel;
    protected $sptModel;
    protected $unitReguModel;
    protected $jenisPenindakanModel;
    protected $bapModel;
    protected $tempatPenyimpananModel;
    protected $jenisKendaraanModel;
    protected $typeKendaraanModel;
    protected $jenisPelanggaranModel;
    protected $kartuIdentitasModel;
    protected $provinsiModel;
    protected $kotaModel;
    protected $kecamatanModel;
    protected $validation;
    protected $dataPenindakanModel;
    protected $dataKendaraanModel;
    protected $lokasiPenindakanModel;
    protected $dataPelanggarModel;
    protected $fotoPenindakanModel;
    protected $suratPengeluaranModel;


    public function __construct()
    {
        $this->ukpdModel = new UkpdModel();
        $this->petugasModel = new PetugasModel();
        $this->sptModel = new SPTModel();
        $this->unitReguModel = new UnitReguModel();
        $this->jenisPenindakanModel = new JenisPenindakanModel();
        $this->bapModel = new BAPModel();
        $this->tempatPenyimpananModel = new TempatPenyimpananModel();
        $this->jenisKendaraanModel = new JenisKendaraanModel();
        $this->typeKendaraanModel = new TypeKendaraanModel();
        $this->jenisPelanggaranModel = new JenisPelanggaranModel();
        $this->kartuIdentitasModel = new KartuIdentitasModel();
        $this->provinsiModel = new ProvinsiModel();
        $this->kotaModel = new KotaModel();
        $this->kecamatanModel = new KecamatanModel();
        $this->dataPenindakanModel = new DataPenindakanModel();
        $this->dataKendaraanModel = new DataKendaraanModel();
        $this->lokasiPenindakanModel = new LokasiPenindakanModel();
        $this->dataPelanggarModel = new DataPelanggarModel();
        $this->fotoPenindakanModel = new FotoPenindakanModel();
        $this->suratPengeluaranModel = new SuratPengeluaranModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        // dd(session()->get('unit_id'));
        $data_penindakan = $this->dataPenindakanModel->getDataPenindakanPenderekan(session()->get('ukpd_id'), session()->get('unit_id'));

        $data = [
            'title' => 'DATA PENINDAKAN',
            'data_penindakan' => $data_penindakan
        ];

        // dd($data["data_penindakan"]);
        return view('petugas/data_penindakan', $data);
    }

    public function tambah_penindakan()
    {
        $ppns = $this->petugasModel->getPPNS(session()->get('ukpd_id'));
        // dd($ppns);
        $data = [
            'title' => 'TAMBAH DATA PENINDAKAN',
            'ukpd' => $this->ukpdModel->getUkpd(),
            'jenis_penindakan' => $this->jenisPenindakanModel->where(["id" => 1])->orWhere(["id" => 5])->get()->getResultObject(),
            'jenis_kendaraan' => $this->jenisKendaraanModel->getJenisKendaraan(),
            'jenis_pelanggaran' => $this->jenisPelanggaranModel->getPelanggaran(),
            'kartu_identitas' => $this->kartuIdentitasModel->getKartuIdentitas(),
            'type_kendaraan' => $this->typeKendaraanModel->getTypeKendaraan(),
            'provinsi' => $this->provinsiModel->get()->getRowObject(),
            'ppns' => $this->petugasModel->getPPNS(session()->get('ukpd_id')),
            'spt' => $this->sptModel->getNewSPT(session()->get('ukpd_id')),
            'unit_regu' => $this->unitReguModel->getUnitWhereUKPD(session()->get('ukpd_id')),
            'nomor_bap' => $this->bapModel->where(["unit_id" => session()->get('unit_id')])->where(["status_bap_id" => 1])->get()->getResultObject(),
            'tempat_penyimpanan' => $this->tempatPenyimpananModel->getTempatPenyimpananWhereUKPD(session()->get('ukpd_id'))
        ];


        return view('petugas/tambah_penindakan', $data);
    }

    public function getTypeKendaraan()
    {
        if ($this->request->isAJAX()) {

            $jenis_kendaraan_id = $this->request->getVar('jenis_kendaraan_id');

            $type_kendaraan = $this->typeKendaraanModel->getTypeKendaraanWhereJenisKendaraan($jenis_kendaraan_id);

            $data = [
                'type_kendaraan' => $type_kendaraan
            ];

            return json_encode($data);
        }
    }

    public function getKota()
    {
        if ($this->request->isAJAX()) {

            $provinsi_id = $this->request->getVar('provinsi_id');

            $kota = $this->kotaModel->getKotaWithProvinsi($provinsi_id);

            $data = [
                'kota' => $kota
            ];

            return json_encode($data);
        }
    }

    public function getKecamatan()
    {
        if ($this->request->isAJAX()) {

            $kota_id = $this->request->getVar('kota_id');

            $kecamatan = $this->kecamatanModel->getKecamatanWithKota($kota_id);

            $data = [
                'kecamatan' => $kecamatan
            ];

            return json_encode($data);
        }
    }

    public function insert()
    {
        if ($this->request->isAJAX()) {
            if (!$this->validate([
                // table penderekan
                'ukpd_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'UKPD Tidak Boleh Kosong!'
                    ]
                ],
                'ppns_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'PPNS Tidak Boleh Kosong!'
                    ]
                ],
                'spt_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Surat Tugas Tidak Boleh Kosong!'
                    ]
                ],
                'unit_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Unit / Regu Tidak Boleh Kosong!'
                    ]
                ],
                'jenis_penindakan_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jenis Penindakan Tidak Boleh Kosong!'
                    ]
                ],
                'bap_id' => [
                    'rules' => 'required|is_unique[data_penindakan_table.bap_id]',
                    'errors' => [
                        'required' => 'Nomor BAP Tidak Boleh Kosong!',
                        'is_unique' => 'Nomor BAP Telah Digunakan, Silahkan Pilih BAP Baru'
                    ]
                ],
                'jenis_pelanggaran_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jenis Pelanggaran Tidak Boleh Kosong!'
                    ]
                ],
                'tempat_penyimpanan_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tempat Penyimpanan Tidak Boleh Kosong!'
                    ]
                ],
                'foto_penindakan_1' => [
                    'rules' => 'uploaded[foto_penindakan_1]|is_image[foto_penindakan_1]|max_size[foto_penindakan_1,5120]',
                    'errors' => [
                        'uploaded' => 'Foto Kendaraan Tidak Boleh Kosong!',
                        'is_image' => 'Yang Anda Upload Bukan Foto!',
                        'max_size' => 'Ukuran Foto Terlalu Besar',
                    ]
                ],
                'foto_penindakan_2' => [
                    'rules' => 'uploaded[foto_penindakan_2]|is_image[foto_penindakan_2]|max_size[foto_penindakan_2,5120]',
                    'errors' => [
                        'uploaded' => 'Foto Kendaraan Tidak Boleh Kosong!',
                        'is_image' => 'Yang Anda Upload Bukan Foto!',
                        'max_size' => 'Ukuran Foto Terlalu Besar',
                    ]
                ],

                // // table kendaraan
                'jenis_kendaraan_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jenis Kendaraan Tidak Boleh Kosong!'
                    ]
                ],
                'type_kendaraan_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Type Kendaraan Tidak Boleh Kosong!'
                    ]
                ],
                'merk_kendaraan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Merk Kendaraan Tidak Boleh Kosong!'
                    ]
                ],
                'nomor_kendaraan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nomor Kendaraan Tidak Boleh Kosong!'
                    ]
                ],

                // lokasi penertiban
                'provinsi_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Provinsi Tidak Boleh Kosong!'
                    ]
                ],
                'kota_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kota Tidak Boleh Kosong!'
                    ]
                ],
                'kecamatan_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kecamatan Tidak Boleh Kosong!'
                    ]
                ],
                'nama_jalan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Jalan Tidak Boleh Kosong!'
                    ]
                ],

            ])) {
                $alert = [
                    'error' => [
                        // table penderekan
                        'ukpd_id' => $this->validation->getError('ukpd_id'),
                        'ppns_id' => $this->validation->getError('ppns_id'),
                        'spt_id' => $this->validation->getError('spt_id'),
                        'unit_id' => $this->validation->getError('unit_id'),
                        'jenis_penindakan_id' => $this->validation->getError('jenis_penindakan_id'),
                        'bap_id' => $this->validation->getError('bap_id'),
                        'jenis_pelanggaran_id' => $this->validation->getError('jenis_pelanggaran_id'),
                        'tempat_penyimpanan_id' => $this->validation->getError('tempat_penyimpanan_id'),
                        'foto_penindakan_1' => $this->validation->getError('foto_penindakan_1'),
                        'foto_penindakan_2' => $this->validation->getError('foto_penindakan_2'),
                        // table kendaraan
                        'jenis_kendaraan_id' => $this->validation->getError('jenis_kendaraan_id'),
                        'type_kendaraan_id' => $this->validation->getError('type_kendaraan_id'),
                        'merk_kendaraan' => $this->validation->getError('merk_kendaraan'),
                        'nomor_kendaraan' => $this->validation->getError('nomor_kendaraan'),
                        // lokasi Penertiban
                        'provinsi_id' => $this->validation->getError('provinsi_id'),
                        'kota_id' => $this->validation->getError('kota_id'),
                        'kecamatan_id' => $this->validation->getError('kecamatan_id'),
                        'nama_jalan' => $this->validation->getError('nama_jalan'),

                    ]
                ];
            } else {

                $ukpd_id = $this->request->getVar('ukpd_id');
                $ppns_id = $this->request->getVar('ppns_id');
                $spt_id = $this->request->getVar('spt_id');
                $unit_id = $this->request->getVar('unit_id');
                $jenis_penindakan_id = $this->request->getVar('jenis_penindakan_id');
                $bap_id = $this->request->getVar('bap_id');
                $jenis_pelanggaran_id = $this->request->getVar('jenis_pelanggaran_id');
                $tanggal_pelanggaran = $this->request->getVar('tanggal_pelanggaran');
                $jam_pelanggaran = $this->request->getVar('jam_pelanggaran');
                $tempat_penyimpanan_id = $this->request->getVar('tempat_penyimpanan_id');
                $foto_penindakan_1 = $this->request->getFile('foto_penindakan_1');
                $foto_penindakan_2 = $this->request->getFile('foto_penindakan_2');

                $namaFile1 = $foto_penindakan_1->getRandomName();
                $namaFile2 = $foto_penindakan_2->getRandomName();

                // table Kendaraan
                $jenis_kendaraan_id = $this->request->getVar('jenis_kendaraan_id');
                $type_kendaraan_id = $this->request->getVar('type_kendaraan_id');
                $merk_kendaraan = $this->request->getVar('merk_kendaraan');
                $nomor_kendaraan = $this->request->getVar('nomor_kendaraan');
                $warna_kendaraan = $this->request->getVar('warna_kendaraan');

                //table lokasi_penindakan
                $provinsi_id = $this->request->getVar('provinsi_id');
                $kota_id = $this->request->getVar('kota_id');
                $kecamatan_id = $this->request->getVar('kecamatan_id');
                $nama_jalan = $this->request->getVar('nama_jalan');
                $nama_gedung = $this->request->getVar('nama_gedung');

                // table identitas pengemudi
                $kartu_identitas_id = $this->request->getVar('kartu_identitas_id');
                $nomor_identitas = $this->request->getVar('nomor_identitas');
                $nama_pengemudi = $this->request->getVar('nama_pengemudi');
                $alamat_pengemudi = $this->request->getVar('alamat_pengemudi');
                $nomor_hp = $this->request->getVar('nomor_hp');

                $tanda_tangan_pelanggar = $this->request->getVar('tanda_tangan_pelanggar');

                if ($tanda_tangan_pelanggar != null) {
                    $direktori = "ttd_pelanggar/";
                    $signatureImage = explode(";base64,", $tanda_tangan_pelanggar);

                    $getTypeImage = explode("image/", $signatureImage[0]);

                    $typeImage = $getTypeImage[1];

                    $decodeImage = base64_decode($signatureImage[1]);

                    $createRandomImage = $direktori . uniqid() . '.' . $typeImage;

                    file_put_contents($createRandomImage, $decodeImage);
                    // End Foto Pelanggar
                    $this->dataPelanggarModel->save([
                        'bap_id' => $bap_id,
                        'kartu_identitas_id' => $kartu_identitas_id,
                        'nomor_identitas' => $nomor_identitas,
                        'nama_pengemudi' => strtolower($nama_pengemudi),
                        'alamat_pengemudi' => strtolower($alamat_pengemudi),
                        'nomor_hp' => $nomor_hp,
                        'tanda_tangan_pelanggar' => $createRandomImage,
                    ]);
                } else {
                    $this->dataPelanggarModel->save([
                        'bap_id' => $bap_id,
                        'kartu_identitas_id' => $kartu_identitas_id,
                        'nomor_identitas' => $nomor_identitas,
                        'nama_pengemudi' => strtolower($nama_pengemudi),
                        'alamat_pengemudi' => strtolower($alamat_pengemudi),
                        'nomor_hp' => $nomor_hp,
                    ]);
                }

                $this->dataPenindakanModel->save([
                    'ukpd_id' => $ukpd_id,
                    'ppns_id' => $ppns_id,
                    'spt_id' => $spt_id,
                    'bap_id' => $bap_id,
                    'jenis_pelanggaran_id' => $jenis_pelanggaran_id,
                    'tanggal_pelanggaran' => $tanggal_pelanggaran,
                    'jam_pelanggaran' => $jam_pelanggaran,
                    'tempat_penyimpanan_id' => $tempat_penyimpanan_id,
                ]);

                $this->fotoPenindakanModel->save([
                    'bap_id' => $bap_id,
                    'foto_penindakan_1' => $namaFile1,
                    'foto_penindakan_2' => $namaFile2,
                ]);

                $foto_penindakan_1->move('data_penindakan', $namaFile1);
                $foto_penindakan_2->move('data_penindakan', $namaFile2);

                $this->dataKendaraanModel->save([
                    'bap_id' => $bap_id,
                    'jenis_kendaraan_id' => $jenis_kendaraan_id,
                    'type_kendaraan_id' => $type_kendaraan_id,
                    'merk_kendaraan' => strtolower($merk_kendaraan),
                    'nomor_kendaraan' => strtolower($nomor_kendaraan),
                    'warna_kendaraan' => strtolower($warna_kendaraan),
                ]);

                $this->lokasiPenindakanModel->save([
                    'bap_id' => $bap_id,
                    'provinsi_id' => $provinsi_id,
                    'kota_id' => $kota_id,
                    'kecamatan_id' => $kecamatan_id,
                    'nama_jalan' => strtolower($nama_jalan),
                    'nama_gedung' => strtolower($nama_gedung),
                ]);

                $noBap = $this->bapModel->where(["id" => $bap_id])->get()->getRowObject();

                if ($nama_pengemudi != null || $alamat_pengemudi != null || $nomor_hp != null || $nomor_identitas != null) {
                    $this->bapModel->update($noBap->id, [
                        'id' => $noBap->id,
                        'bap_id' => $bap_id,
                        'status_bap_id' => 5
                    ]);
                } else {
                    $this->bapModel->update($noBap->id, [
                        'id' => $noBap->id,
                        'bap_id' => $bap_id,
                        'status_bap_id' => 2
                    ]);
                }

                $alert = [
                    'success' => 'Data Penindakan Berhasil diSimpan!'
                ];
            }
            return json_encode($alert);
        }
    }

    public function detail($nomor_bap)
    {
        // dd(session()->get('role_id'));
        $detail_data_penindakan = $this->dataPenindakanModel->getDataPenindakanWithNomorBAP($nomor_bap);
        // dd($detail_data_penindakan);

        $data = [
            'title' => 'DETAIL DATA PENINDAKAN',
            'detail_data' => $detail_data_penindakan
        ];

        return view('petugas/detail_penindakan', $data);
    }

    public function edit_data($nomor_bap)
    {
        $detail_data_penindakan = $this->dataPenindakanModel->getDataPenindakanWithNomorBAP($nomor_bap);
        // dd($nomor_bap);

        // dd($detail_data_penindakan);
        if ($detail_data_penindakan == null) {
            return redirect()->back();
        } else {
            $data = [
                'title' => 'Edit Data Penindakan',
                'data_penindakan' => $detail_data_penindakan,
                'ukpd' => $this->ukpdModel->getUkpd(),
                'jenis_penindakan' => $this->jenisPenindakanModel->where(["id" => 1])->orWhere(["id" => 5])->get()->getResultObject(),
                'jenis_kendaraan' => $this->jenisKendaraanModel->getJenisKendaraan(),
                'jenis_pelanggaran' => $this->jenisPelanggaranModel->getPelanggaran(),
                'kartu_identitas' => $this->kartuIdentitasModel->getKartuIdentitas(),
                'provinsi' => $this->provinsiModel->get()->getRowObject(),
                'ppns' => $this->petugasModel->getPPNS($detail_data_penindakan->ukpd_id),
                'spt' => $this->sptModel->getNewSPT($detail_data_penindakan->ukpd_id),
                'unit_regu' => $this->unitReguModel->getUnitWhereUKPD($detail_data_penindakan->ukpd_id),
                'tempat_penyimpanan' => $this->tempatPenyimpananModel->getTempatPenyimpananWhereUKPD($detail_data_penindakan->ukpd_id),
                'type_kendaraan' => $this->typeKendaraanModel->getTypeKendaraan(),
                'kota' => $this->kotaModel->getKotaWithProvinsi($detail_data_penindakan->provinsi_id),
                'kecamatan' => $this->kecamatanModel->getKecamatanWithKota($detail_data_penindakan->kota_id),
            ];
        }

        return view('petugas/edit_penindakan', $data);
    }

    public function update_data()
    {
        if ($this->request->isAJAX()) {
            if (!$this->validate([
                // table penderekan
                'ukpd_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'UKPD Tidak Boleh Kosong!'
                    ]
                ],
                'ppns_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'PPNS Tidak Boleh Kosong!'
                    ]
                ],
                'spt_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Surat Tugas Tidak Boleh Kosong!'
                    ]
                ],
                'unit_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Unit / Regu Tidak Boleh Kosong!'
                    ]
                ],
                'jenis_penindakan_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jenis Penindakan Tidak Boleh Kosong!'
                    ]
                ],
                'bap_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nomor BAP Tidak Boleh Kosong!'
                    ]
                ],
                'jenis_pelanggaran_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jenis Pelanggaran Tidak Boleh Kosong!'
                    ]
                ],
                'tempat_penyimpanan_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tempat Penyimpanan Tidak Boleh Kosong!'
                    ]
                ],

                // // table kendaraan
                'jenis_kendaraan_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jenis Kendaraan Tidak Boleh Kosong!'
                    ]
                ],
                'type_kendaraan_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Type Kendaraan Tidak Boleh Kosong!'
                    ]
                ],
                'merk_kendaraan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Merk Kendaraan Tidak Boleh Kosong!'
                    ]
                ],
                'nomor_kendaraan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nomor Kendaraan Tidak Boleh Kosong!'
                    ]
                ],

                // lokasi penertiban
                'provinsi_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Provinsi Tidak Boleh Kosong!'
                    ]
                ],
                'kota_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kota Tidak Boleh Kosong!'
                    ]
                ],
                'kecamatan_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kecamatan Tidak Boleh Kosong!'
                    ]
                ],
                'nama_jalan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Jalan Tidak Boleh Kosong!'
                    ]
                ],

            ])) {
                $alert = [
                    'error' => [
                        // table penderekan
                        'ukpd_id' => $this->validation->getError('ukpd_id'),
                        'ppns_id' => $this->validation->getError('ppns_id'),
                        'spt_id' => $this->validation->getError('spt_id'),
                        'unit_id' => $this->validation->getError('unit_id'),
                        'jenis_penindakan_id' => $this->validation->getError('jenis_penindakan_id'),
                        'bap_id' => $this->validation->getError('bap_id'),
                        'jenis_pelanggaran_id' => $this->validation->getError('jenis_pelanggaran_id'),
                        'tempat_penyimpanan_id' => $this->validation->getError('tempat_penyimpanan_id'),
                        'foto' => $this->validation->getError('foto'),
                        // table kendaraan
                        'jenis_kendaraan_id' => $this->validation->getError('jenis_kendaraan_id'),
                        'type_kendaraan_id' => $this->validation->getError('type_kendaraan_id'),
                        'merk_kendaraan' => $this->validation->getError('merk_kendaraan'),
                        'nomor_kendaraan' => $this->validation->getError('nomor_kendaraan'),
                        // lokasi Penertiban
                        'provinsi_id' => $this->validation->getError('provinsi_id'),
                        'kota_id' => $this->validation->getError('kota_id'),
                        'kecamatan_id' => $this->validation->getError('kecamatan_id'),
                        'nama_jalan' => $this->validation->getError('nama_jalan'),

                    ]
                ];
            } else {

                $id = $this->request->getVar('id');
                $ukpd_id = $this->request->getVar('ukpd_id');
                $ppns_id = $this->request->getVar('ppns_id');
                $spt_id = $this->request->getVar('spt_id');

                $bap_id = $this->request->getVar('bap_id');
                $jenis_pelanggaran_id = $this->request->getVar('jenis_pelanggaran_id');
                $tanggal_pelanggaran = $this->request->getVar('tanggal_pelanggaran');
                $jam_pelanggaran = $this->request->getVar('jam_pelanggaran');
                $tempat_penyimpanan_id = $this->request->getVar('tempat_penyimpanan_id');
                $foto_lama = $this->request->getVar('foto_lama');
                $foto_lama_2 = $this->request->getVar('foto_lama_2');
                $foto_penindakan_1 = $this->request->getFile('foto_penindakan_1');
                $foto_penindakan_2 = $this->request->getFile('foto_penindakan_2');

                if ($foto_penindakan_1->getError() == 4 && $foto_penindakan_2->getError() == 4) {
                    $namaFile1 = $foto_lama;
                    $namaFile2 = $foto_lama_2;
                } else {
                    $namaFile1 = $foto_penindakan_1->getRandomName();
                    $namaFile2 = $foto_penindakan_2->getRandomName();
                    unlink('data_penindakan/' . $foto_lama);
                    unlink('data_penindakan/' . $foto_lama_2);
                    $foto_penindakan_1->move('data_penindakan', $namaFile1);
                    $foto_penindakan_2->move('data_penindakan', $namaFile2);
                }
                // table Kendaraan
                $jenis_kendaraan_id = $this->request->getVar('jenis_kendaraan_id');
                $type_kendaraan_id = $this->request->getVar('type_kendaraan_id');
                $merk_kendaraan = $this->request->getVar('merk_kendaraan');
                $nomor_kendaraan = $this->request->getVar('nomor_kendaraan');
                $warna_kendaraan = $this->request->getVar('warna_kendaraan');

                //table lokasi_penindakan
                $provinsi_id = $this->request->getVar('provinsi_id');
                $kota_id = $this->request->getVar('kota_id');
                $kecamatan_id = $this->request->getVar('kecamatan_id');
                $nama_jalan = $this->request->getVar('nama_jalan');
                $nama_gedung = $this->request->getVar('nama_gedung');

                // table identitas pengemudi
                $kartu_identitas_id = $this->request->getVar('kartu_identitas_id');
                $nomor_identitas = $this->request->getVar('nomor_identitas');
                $nama_pengemudi = $this->request->getVar('nama_pengemudi');

                $alamat_pengemudi = $this->request->getVar('alamat_pengemudi');
                $nomor_hp = $this->request->getVar('nomor_hp');

                $tanda_tangan_pelanggar = $this->request->getVar('tanda_tangan_pelanggar');
                $tanda_tangan_pelanggar_lama = $this->request->getVar('tanda_tangan_pelanggar_lama');

                $data_pelanggar = $this->dataPelanggarModel->where(["bap_id" => $bap_id])->get()->getRowObject();

                if ($data_pelanggar->tanda_tangan_pelanggar == null) {

                    $direktori = "ttd_pelanggar/";

                    $signatureImage = explode(";base64,", $tanda_tangan_pelanggar);

                    $getTypeImage = explode("image/", $signatureImage[0]);

                    $typeImage = $getTypeImage[1];

                    $decodeImage = base64_decode($signatureImage[1]);

                    $createRandomImage = $direktori . uniqid() . '.' . $typeImage;

                    file_put_contents($createRandomImage, $decodeImage);
                    // End Foto Pelanggar
                    $this->dataPelanggarModel->update($data_pelanggar->id, [
                        'id' => $data_pelanggar->id,
                        'bap_id' => $bap_id,
                        'kartu_identitas_id' => $kartu_identitas_id,
                        'nomor_identitas' => $nomor_identitas,
                        'nama_pengemudi' => strtolower($nama_pengemudi),
                        'alamat_pengemudi' => strtolower($alamat_pengemudi),
                        'nomor_hp' => $nomor_hp,
                        'tanda_tangan_pelanggar' => $createRandomImage
                    ]);
                } else {

                    $this->dataPelanggarModel->update($data_pelanggar->id, [
                        'id' => $data_pelanggar->id,
                        'bap_id' => $bap_id,
                        'kartu_identitas_id' => $kartu_identitas_id,
                        'nomor_identitas' => $nomor_identitas,
                        'nama_pengemudi' => strtolower($nama_pengemudi),
                        'alamat_pengemudi' => strtolower($alamat_pengemudi),
                        'nomor_hp' => $nomor_hp,
                        'tanda_tangan_pelanggar' => $tanda_tangan_pelanggar_lama
                    ]);
                }

                $data = $this->dataPenindakanModel->where(["bap_id" => $bap_id])->get()->getRowObject();

                $this->dataPenindakanModel->update($data->id, [
                    'id' => $data->id,
                    'ukpd_id' => $ukpd_id,
                    'ppns_id' => $ppns_id,
                    'spt_id' => $spt_id,
                    'bap_id' => $bap_id,
                    'jenis_pelanggaran_id' => $jenis_pelanggaran_id,
                    'tanggal_pelanggaran' => $tanggal_pelanggaran,
                    'jam_pelanggaran' => $jam_pelanggaran,
                    'tempat_penyimpanan_id' => $tempat_penyimpanan_id,
                ]);

                $foto_penindakan = $this->fotoPenindakanModel->where(["bap_id" => $bap_id])->get()->getRowObject();

                $this->fotoPenindakanModel->update($foto_penindakan->id, [
                    'id' => $foto_penindakan->id,
                    'bap_id' => $foto_penindakan->bap_id,
                    'foto_penindakan_1' => $namaFile1,
                    'foto_penindakan_2' => $namaFile2,
                ]);

                $data_kendaraan = $this->dataKendaraanModel->where(["bap_id" => $bap_id])->get()->getRowObject();

                $this->dataKendaraanModel->update($data_kendaraan->id, [
                    'id' => $data_kendaraan->id,
                    'bap_id' => $bap_id,
                    'jenis_kendaraan_id' => $jenis_kendaraan_id,
                    'type_kendaraan_id' => $type_kendaraan_id,
                    'merk_kendaraan' => strtolower($merk_kendaraan),
                    'nomor_kendaraan' => strtolower($nomor_kendaraan),
                    'warna_kendaraan' => strtolower($warna_kendaraan),
                ]);

                $lokasi_penindakan = $this->lokasiPenindakanModel->where(["bap_id" => $bap_id])->get()->getRowObject();

                $this->lokasiPenindakanModel->update($lokasi_penindakan->id, [
                    'id' => $lokasi_penindakan->id,
                    'bap_id' => $bap_id,
                    'provinsi_id' => $provinsi_id,
                    'kota_id' => $kota_id,
                    'kecamatan_id' => $kecamatan_id,
                    'nama_jalan' => strtolower($nama_jalan),
                    'nama_gedung' => strtolower($nama_gedung),

                ]);
                $noBap = $this->bapModel->where(["id" => $bap_id])->get()->getRowObject();

                $spk = $this->suratPengeluaranModel->where(["bap_id" => $noBap->id])->get()->getRowObject();

                if (!empty($nama_pengemudi)) {
                    if ($spk != null) {
                        if ($spk->jenis_spk_id == 1) {
                            $this->bapModel->update($noBap->id, [
                                'id' => $noBap->id,
                                'bap_id' => $bap_id,
                                'status_bap_id' => 5
                            ]);
                        } else {
                            $this->bapModel->update($noBap->id, [
                                'id' => $noBap->id,
                                'bap_id' => $bap_id,
                                'status_bap_id' => 5
                            ]);
                        }
                    } else {
                        $this->bapModel->update($noBap->id, [
                            'id' => $noBap->id,
                            'bap_id' => $bap_id,
                            'status_bap_id' => 5
                        ]);
                    }
                } else {
                    $this->bapModel->update($noBap->id, [
                        'id' => $noBap->id,
                        'bap_id' => $bap_id,
                        'status_bap_id' => 2
                    ]);
                }

                $alert = [
                    'success' => 'Data Penindakan Berhasil Ubah!'
                ];
            }
            return json_encode($alert);
        }
    }
}
