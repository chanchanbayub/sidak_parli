<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\AngkutMotorModel;
use App\Models\Admin\JenisPenindakanModel;
use App\Models\Admin\KecamatanModel;
use App\Models\Admin\KotaModel;
use App\Models\Admin\ProvinsiModel;
use App\Models\Admin\TempatPenyimpananModel;
use App\Models\Admin\UkpdModel;
use App\Models\Admin\UnitReguModel;

class AngkutMotor extends BaseController
{

    protected $ukpdModel;
    protected $unitReguModel;
    protected $provinsiModel;
    protected $kotaModel;
    protected $kecamatanModel;
    protected $jenisPenindakanModel;
    protected $angkutMotorModel;
    protected $validation;
    protected $tempatPenyimpananModel;

    public function __construct()
    {
        $this->ukpdModel = new UkpdModel();
        $this->unitReguModel = new UnitReguModel();
        $this->provinsiModel = new ProvinsiModel();
        $this->kotaModel = new KotaModel();
        $this->kecamatanModel = new KecamatanModel();
        $this->jenisPenindakanModel = new JenisPenindakanModel();
        $this->angkutMotorModel = new AngkutMotorModel();
        $this->tempatPenyimpananModel = new TempatPenyimpananModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {

        if (session()->get('role_id') == 2) {
            $angkut_motor = $this->angkutMotorModel->getAngkutMotor(session()->get('ukpd_id'));
        } else {
            $angkut_motor = $this->angkutMotorModel->getAngkutMotor("");
        }

        $data = [
            'angkut_motor' => $angkut_motor,
            'jenis_penindakan' => $this->jenisPenindakanModel->where("id", 5)->get()->getResultObject(),
            'title' => 'Angkut Motor',
            'ukpd' => $this->ukpdModel->getUkpd(),
            'provinsi' => $this->provinsiModel->getProvinsi(),
            'kota' => $this->kotaModel->getKota(),
            'kecamatan' => $this->kecamatanModel->getKecamatan(),
            'unit_regu' => $this->unitReguModel->getUnit(),
            'tempat_penyimpanan' => $this->tempatPenyimpananModel->getTempatPenyimpanan()
        ];

        return view('admin/angkut_motor', $data);
    }

    public function detail($id)
    {
        $detail_ocp = $this->ocpModel->getDataOcpWithID($id);


        $data = [
            'title' => 'DETAIL DATA PENINDAKAN',
            'detail_ocp' => $detail_ocp
        ];

        return view('admin/detail_ocp', $data);
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

    public function getUnit()
    {
        if ($this->request->isAJAX()) {

            $ukpd_id = $this->request->getVar('ukpd_id');

            $unit_regu = $this->unitReguModel->where(["ukpd_id" => $ukpd_id])->get()->getResultObject();
            $tempat_penyimpanan = $this->tempatPenyimpananModel->getTempatPenyimpananWhereUKPD($ukpd_id);

            $data = [
                'unit' => $unit_regu,
                'tempat_penyimpanan' => $tempat_penyimpanan,
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
                'ukpd_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'UKPD Tidak Boleh Kosong !'
                    ]
                ],
                'jenis_penindakan_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jenis Penindakan Tidak Boleh Kosong !'
                    ]
                ],
                'unit_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Unit / Regu Tidak Boleh Kosong !'
                    ]
                ],
                'nopol' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nomor Kendaraan Tidak Boleh Kosong !'
                    ]
                ],
                'provinsi_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Provinsi Tidak Boleh Kosong !'
                    ]
                ],
                'kota_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kota Tidak Boleh Kosong !'
                    ]
                ],
                'kecamatan_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'kecamatan Tidak Boleh Kosong !'
                    ]
                ],
                'lokasi_angkut' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Lokasi Penindakan Tidak Boleh Kosong !'
                    ]
                ],
                'tempat_penyimpanan_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tempat Penyimpanan Tidak Boleh Kosong !'
                    ]
                ],
                'foto_kendaraan_angkut' => [
                    'rules' => 'uploaded[foto_kendaraan_angkut]|is_image[foto_kendaraan_angkut]|max_size[foto_kendaraan_angkut,4048]',
                    'errors' => [
                        'uploaded' => 'Foto Kendaraan Tidak Boleh Kosong!',
                        'is_image' => 'Yang Anda Upload Bukan Foto!',
                        'max_size' => 'Ukuran Foto Terlalu Besar',
                    ]
                ],

            ])) {
                $alert = [
                    'error' => [
                        'ukpd_id' => $this->validation->getError('ukpd_id'),
                        'jenis_penindakan_id' => $this->validation->getError('jenis_penindakan_id'),
                        'unit_id' => $this->validation->getError('unit_id'),
                        'nopol' => $this->validation->getError('nopol'),
                        'provinsi_id' => $this->validation->getError('provinsi_id'),
                        'kota_id' => $this->validation->getError('kota_id'),
                        'kecamatan_id' => $this->validation->getError('kecamatan_id'),
                        'lokasi_angkut' => $this->validation->getError('lokasi_angkut'),
                        'tempat_penyimpanan_id' => $this->validation->getError('tempat_penyimpanan_id'),
                        'foto_kendaraan_angkut' => $this->validation->getError('foto_kendaraan_angkut'),
                    ]
                ];
            } else {

                $ukpd_id = $this->request->getPost('ukpd_id');
                $unit_id = $this->request->getPost('unit_id');
                $jenis_penindakan_id = $this->request->getPost('jenis_penindakan_id');
                $nopol = $this->request->getPost('nopol');
                $warna_kendaraan = $this->request->getPost('warna_kendaraan');
                $merk_kendaraan = $this->request->getPost('merk_kendaraan');
                $provinsi_id = $this->request->getPost('provinsi_id');
                $kota_id = $this->request->getPost('kota_id');
                $kecamatan_id = $this->request->getPost('kecamatan_id');
                $tanggal_pelanggaran_angkut = $this->request->getPost('tanggal_pelanggaran_angkut');
                $jam_pelanggaran_angkut = $this->request->getPost('jam_pelanggaran_angkut');
                $lokasi_angkut = $this->request->getPost('lokasi_angkut');
                $nama_pengemudi = $this->request->getPost('nama_pengemudi');
                $alamat_pengemudi = $this->request->getPost('alamat_pengemudi');

                $tempat_penyimpanan_id = $this->request->getPost('tempat_penyimpanan_id');

                $foto_kendaraan_angkut = $this->request->getFile('foto_kendaraan_angkut');

                $namaFile = $foto_kendaraan_angkut->getRandomName();

                $this->angkutMotorModel->save([
                    'ukpd_id' => $ukpd_id,
                    'jenis_penindakan_id' => $jenis_penindakan_id,
                    'unit_id' => $unit_id,
                    'nopol' => strtolower($nopol),
                    'warna_kendaraan' => strtolower($warna_kendaraan),
                    'merk_kendaraan' => strtolower($merk_kendaraan),
                    'provinsi_id' => $provinsi_id,
                    'kota_id' => $kota_id,
                    'tanggal_pelanggaran_angkut' => $tanggal_pelanggaran_angkut,
                    'jam_pelanggaran_angkut' => $jam_pelanggaran_angkut,
                    'kota_id' => $kota_id,
                    'kecamatan_id' => $kecamatan_id,
                    'lokasi_angkut' => strtolower($lokasi_angkut),
                    'nama_pengemudi' => strtolower($nama_pengemudi),
                    'alamat_pengemudi' => strtolower($alamat_pengemudi),
                    'tempat_penyimpanan_id' => $tempat_penyimpanan_id,
                    'foto_kendaraan_angkut' =>  $namaFile,

                ]);

                $alert = [
                    'success' => 'Angkut Motor Berhasil di Simpan !'
                ];

                $foto_kendaraan_angkut->move('angkut_motor', $namaFile);
            }

            return json_encode($alert);
        }
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $angkut_motor = $this->angkutMotorModel->where(["id" => $id])->get()->getRowObject();

            $kecamatan = $this->kecamatanModel->where("kabkot_id", $angkut_motor->kota_id)->get()->getResultObject();

            $data = [
                'ukpd' => $this->ukpdModel->getUkpd(),
                'angkut_motor' => $angkut_motor,
                'jenis_penindakan' => $this->jenisPenindakanModel->where(["id" => 2])->orWhere(["id" => 3])->orWhere(["id" => 4])->get()->getResultObject(),
                'provinsi' => $this->provinsiModel->get()->getRowObject(),
                'kota' => $this->kotaModel->getKota(),
                'kecamatan' => $kecamatan,
                'unit_regu' => $this->unitReguModel->getUnit(),
            ];

            return json_encode($data);
        }
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');

            $angkut_motor = $this->angkutMotorModel->where(["id" => $id])->first();

            $path_foto_angkut = 'angkut_motor/' . $angkut_motor["foto_kendaraan_angkut"];

            if ($path_foto_angkut != null) {
                unlink($path_foto_angkut);
            }

            $this->angkutMotorModel->delete($angkut_motor["id"]);

            $alert = [
                'success' => 'Data Angkut Motor Berhasil di Hapus!'
            ];

            return json_encode($alert);
            // return json_encode($alert);
        }
    }

    public function update()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getPost('id');
            $foto_lama = $this->request->getPost('foto_lama');
            $ukpd_id = $this->request->getPost('ukpd_id');
            $unit_id = $this->request->getPost('unit_id');
            $jenis_penindakan_id = $this->request->getPost('jenis_penindakan_id');
            $nomor_kendaraan_ocp = $this->request->getPost('nomor_kendaraan_ocp');
            $provinsi_id = $this->request->getPost('provinsi_id');
            $kota_id = $this->request->getPost('kota_id');
            $kecamatan_id = $this->request->getPost('kecamatan_id');
            $tanggal_ocp = $this->request->getPost('tanggal_ocp');
            $jam_ocp = $this->request->getPost('jam_ocp');
            $lokasi_penindakan = $this->request->getPost('lokasi_penindakan');
            $foto_penindakan = $this->request->getFile('foto_penindakan');

            if ($foto_penindakan->getError() == 4) {
                $namaFile = $foto_lama;
            } else {
                $namaFile = $foto_penindakan->getRandomName();
                $path_foto_lama = 'ocp_data_penindakan/' . $foto_lama;
                if (file_exists($path_foto_lama)) {
                    unlink($path_foto_lama);
                }
                $foto_penindakan->move('ocp_data_penindakan', $namaFile);
            }

            $this->ocpModel->update($id, [
                'ukpd_id' => $ukpd_id,
                'jenis_penindakan_id' => $jenis_penindakan_id,
                'unit_id' => $unit_id,
                'nomor_kendaraan_ocp' => strtolower($nomor_kendaraan_ocp),
                'provinsi_id' => $provinsi_id,
                'kota_id' => $kota_id,
                'tanggal_ocp' => $tanggal_ocp,
                'jam_ocp' => $jam_ocp,
                'kota_id' => $kota_id,
                'kecamatan_id' => $kecamatan_id,
                'lokasi_penindakan' => strtolower($lokasi_penindakan),
                'foto_penindakan' =>  $namaFile,

            ]);

            $alert = [
                'success' => 'OPS Cabut Pentil Berhasil di Ubah !'
            ];



            return json_encode($alert);
        }
    }
}
