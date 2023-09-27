<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\KendaraanDinasModel;
use App\Models\Admin\UkpdModel;
use App\Models\Admin\UnitReguModel;

class KendaraanDinas extends BaseController
{
    protected $kendaraanDinasModel;
    protected $ukpdModel;
    protected $unitReguModel;
    protected $validation;
    protected $sessionRole;

    public function __construct()
    {
        $this->kendaraanDinasModel = new KendaraanDinasModel();
        $this->ukpdModel = new UkpdModel();
        $this->unitReguModel = new UnitReguModel();
        $this->validation = \Config\Services::validation();
        $this->sessionRole = session()->get('role_id');
    }

    public function index()
    {
        if ($this->sessionRole == 2) {
            $kdo = $this->kendaraanDinasModel->getKendaraanDinas(session()->get('ukpd_id'));
            $unit_regu = $this->unitReguModel->getUnitWhereUKPD(session()->get('ukpd_id'));
        } else {
            $kdo = $this->kendaraanDinasModel->getKendaraanDinas();
            $unit_regu = $this->unitReguModel->getUnit();
        }

        $data = [
            'kendaraan_dinas' => $kdo,
            'title' => 'Kendaraan Dinas Operasional Derek',
            'ukpd' => $this->ukpdModel->getUkpd(),
            'unit_regu' => $unit_regu
        ];

        return view('admin/kendaraan_dinas', $data);
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
                'nomor_kendaraan_dinas' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nomor Kendaraan Tidak Boleh Kosong !'
                    ]
                ],
                'merk_kendaraan_dinas' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nomor Kendaraan Tidak Boleh Kosong !'
                    ]
                ],
                'unit_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Unit Regu Tidak Boleh Kosong !'
                    ]
                ],
                'foto_kendaraan_dinas' => [
                    'rules' => 'uploaded[foto_kendaraan_dinas]|is_image[foto_kendaraan_dinas]|max_size[foto_kendaraan_dinas,2048]',
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
                        'nomor_kendaraan_dinas' => $this->validation->getError('nomor_kendaraan_dinas'),
                        'merk_kendaraan_dinas' => $this->validation->getError('merk_kendaraan_dinas'),
                        'unit_id' => $this->validation->getError('unit_id'),
                        'foto_kendaraan_dinas' => $this->validation->getError('foto_kendaraan_dinas'),
                    ]
                ];
            } else {

                $ukpd_id = $this->request->getPost('ukpd_id');
                $nomor_kendaraan_dinas = $this->request->getPost('nomor_kendaraan_dinas');
                $merk_kendaraan_dinas = $this->request->getPost('merk_kendaraan_dinas');
                $unit_id = $this->request->getPost('unit_id');
                $foto_kendaraan_dinas = $this->request->getFile('foto_kendaraan_dinas');

                $namaFile = $foto_kendaraan_dinas->getRandomName();

                $this->kendaraanDinasModel->save([
                    'ukpd_id' => $ukpd_id,
                    'nomor_kendaraan_dinas' => $nomor_kendaraan_dinas,
                    'merk_kendaraan_dinas' => $merk_kendaraan_dinas,
                    'unit_id' => $unit_id,
                    'foto_kendaraan_dinas' => $namaFile,

                ]);

                $foto_kendaraan_dinas->move('kdo', $namaFile);

                $alert = [
                    'success' => 'Kendaraan Dinas Berhasil di Simpan !'
                ];
            }

            return json_encode($alert);
        }
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $data = [
                'kdo' => $this->kendaraanDinasModel->where(["id" => $id])->first(),
                'ukpd' => $this->ukpdModel->getUkpd(),
                'unit_regu' => $this->unitReguModel->getUnit()
            ];

            return json_encode($data);
        }
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $kdo = $this->kendaraanDinasModel->where(["id" => $id])->first();

            $path_foto_kdo = 'kdo/' . $kdo["foto_kendaraan_dinas"];

            if ($path_foto_kdo != null) {
                unlink($path_foto_kdo);
            };

            $this->kendaraanDinasModel->delete($kdo["id"]);

            $alert = [
                'success' => 'Kendaraan Dinas Berhasil di Hapus !'
            ];

            return json_encode($alert);
        }
    }

    public function update()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'ukpd_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'UKPD Tidak Boleh Kosong !'
                    ]
                ],
                'nomor_kendaraan_dinas' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nomor Kendaraan Tidak Boleh Kosong !'
                    ]
                ],
                'merk_kendaraan_dinas' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nomor Kendaraan Tidak Boleh Kosong !'
                    ]
                ],
                'unit_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Unit Regu Tidak Boleh Kosong !'
                    ]
                ],

            ])) {
                $alert = [
                    'error' => [
                        'ukpd_id' => $this->validation->getError('ukpd_id'),
                        'nomor_kendaraan_dinas' => $this->validation->getError('nomor_kendaraan_dinas'),
                        'merk_kendaraan_dinas' => $this->validation->getError('merk_kendaraan_dinas'),
                        'unit_id' => $this->validation->getError('unit_id'),
                        'foto_kendaraan_dinas' => $this->validation->getError('foto_kendaraan_dinas'),
                    ]
                ];
            } else {

                $id = $this->request->getVar('id');
                $foto_lama = $this->request->getVar('foto_lama');
                $ukpd_id = $this->request->getPost('ukpd_id');
                $nomor_kendaraan_dinas = $this->request->getPost('nomor_kendaraan_dinas');
                $merk_kendaraan_dinas = $this->request->getPost('merk_kendaraan_dinas');
                $unit_id = $this->request->getPost('unit_id');
                $foto_kendaraan_dinas = $this->request->getFile('foto_kendaraan_dinas');

                if ($foto_kendaraan_dinas->getError() == 4) {
                    $namaFile = $foto_lama;
                } else {
                    $namaFile = $foto_kendaraan_dinas->getRandomName();
                    $foto_kendaraan_dinas->move('kdo', $namaFile);
                    $path_foto_kdo = 'kdo/' . $foto_lama;

                    if ($path_foto_kdo != null) {
                        unlink($path_foto_kdo);
                    }
                }

                $this->kendaraanDinasModel->update($id, [
                    'id' => $id,
                    'ukpd_id' => $ukpd_id,
                    'nomor_kendaraan_dinas' => $nomor_kendaraan_dinas,
                    'merk_kendaraan_dinas' => $merk_kendaraan_dinas,
                    'unit_id' => $unit_id,
                    'foto_kendaraan_dinas' => $namaFile,

                ]);

                $alert = [
                    'success' => 'Kendaraan Dinas Berhasil di Ubah !'
                ];
            }

            return json_encode($alert);
        }
    }

    public function detail($id)
    {

        $kdo = $this->kendaraanDinasModel->getKDOWithId($id);

        // dd($kdo);

        $data = [
            'kendaraan_dinas' => $kdo,
            'title' => 'Kendaraan Dinas Operasional Derek',
            'ukpd' => $this->ukpdModel->getUkpd(),
            'unit_regu' => $this->unitReguModel->getUnit()
        ];

        return view('admin/detail_kendaraan_dinas', $data);
    }
}
