<?php

namespace App\Controllers\Petugas;

use App\Controllers\BaseController;
use App\Models\Admin\JenisPenindakanModel;
use App\Models\Admin\KecamatanModel;
use App\Models\Admin\KotaModel;
use App\Models\Admin\OcpModel;
use App\Models\Admin\ProvinsiModel;
use App\Models\Admin\UkpdModel;
use App\Models\Admin\UnitReguModel;

class Ocp extends BaseController
{
    protected $ocpModel;
    protected $ukpdModel;
    protected $jenisPenindakanModel;
    protected $provinsiModel;
    protected $kotaModel;
    protected $kecamatanModel;
    protected $unitReguModel;
    protected $validation;

    public function __construct()
    {
        $this->ocpModel = new OcpModel();
        $this->ukpdModel = new UkpdModel();
        $this->jenisPenindakanModel = new JenisPenindakanModel();
        $this->provinsiModel = new ProvinsiModel();
        $this->kotaModel = new KotaModel();
        $this->kecamatanModel = new KecamatanModel();
        $this->unitReguModel = new UnitReguModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $data = [
            'ocp' => $this->ocpModel->getDataOcpWithUnit(session()->get('ukpd_id'), session()->get('unit_id')),
            'jenis_penindakan' => $this->jenisPenindakanModel->where("id", 2)->orWhere(["id" => 3])->orWhere(["id" => 4])->get()->getResultObject(),
            'title' => 'OPS CABUT PENTIL',
            'ukpd' => $this->ukpdModel->getUkpd(),
            'provinsi' => $this->provinsiModel->getProvinsi(),
            'kota' => $this->kotaModel->getKota(),
            'kecamatan' => $this->kecamatanModel->getKecamatan(),
            'unit_regu' => $this->unitReguModel->getUnit()
        ];

        return view('petugas/ocp', $data);
    }

    public function detail($id)
    {

        $detail_ocp = $this->ocpModel->getDataOcpWithID($id);

        $data = [
            'title' => 'DETAIL DATA PENINDAKAN',
            'detail_ocp' => $detail_ocp
        ];

        return view('petugas/detail_ocp', $data);
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
                'nomor_kendaraan_ocp' => [
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
                'lokasi_penindakan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Lokasi Penindakan Tidak Boleh Kosong !'
                    ]
                ],
                'foto_penindakan' => [
                    'rules' => 'uploaded[foto_penindakan]|is_image[foto_penindakan]|max_size[foto_penindakan,2048]',
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
                        'nomor_kendaraan_ocp' => $this->validation->getError('nomor_kendaraan_ocp'),
                        'provinsi_id' => $this->validation->getError('provinsi_id'),
                        'kota_id' => $this->validation->getError('kota_id'),
                        'kecamatan_id' => $this->validation->getError('kecamatan_id'),
                        'lokasi_penindakan' => $this->validation->getError('lokasi_penindakan'),
                        'foto_penindakan' => $this->validation->getError('foto_penindakan'),
                    ]
                ];
            } else {

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

                $namaFile = $foto_penindakan->getRandomName();

                $this->ocpModel->save([
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
                    'success' => 'OPS Cabut Pentil Berhasil di Simpan !'
                ];

                $foto_penindakan->move('ocp_data_penindakan', $namaFile);
            }

            return json_encode($alert);
        }
    }
}
