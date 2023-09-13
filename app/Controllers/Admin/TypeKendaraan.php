<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\JenisKendaraanModel;
use App\Models\Admin\TypeKendaraanModel;

class TypeKendaraan extends BaseController
{
    protected $jenisKendaraanModel;
    protected $typeKendaraanModel;
    protected $validation;

    public function __construct()
    {
        $this->jenisKendaraanModel = new JenisKendaraanModel();
        $this->typeKendaraanModel = new TypeKendaraanModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $data = [
            'jenis_kendaraan' => $this->jenisKendaraanModel->getJenisKendaraan(),
            'type_kendaraan' => $this->typeKendaraanModel->getTypeKendaraan(),
            'title' => 'Type Kendaraan',
        ];

        return view('admin/type_kendaraan', $data);
    }

    public function insert()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'jenis_kendaraan_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jenis Kendaraan Tidak Boleh Kosong !'
                    ]
                ],
                'type_kendaraan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Type Kendaraan Tidak Boleh Kosong !'
                    ]
                ],
            ])) {
                $alert = [
                    'error' => [
                        'jenis_kendaraan_id' => $this->validation->getError('jenis_kendaraan_id'),
                        'type_kendaraan' => $this->validation->getError('type_kendaraan'),
                    ]
                ];
            } else {

                $jenis_kendaraan_id = $this->request->getPost('jenis_kendaraan_id');
                $type_kendaraan = $this->request->getPost('type_kendaraan');

                $this->typeKendaraanModel->save([
                    'jenis_kendaraan_id' => strtolower($jenis_kendaraan_id),
                    'type_kendaraan' => strtolower($type_kendaraan),

                ]);

                $alert = [
                    'success' => 'Type Kendaraan Berhasil di Simpan !'
                ];
            }

            return json_encode($alert);
        }
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $type_kendaraan = $this->typeKendaraanModel->where(["id" => $id])->first();
            $jenis_kendaraan = $this->jenisKendaraanModel->getJenisKendaraan();

            $data = [
                'type_kendaraan' => $type_kendaraan,
                'jenis_kendaraan' => $jenis_kendaraan,
            ];

            return json_encode($data);
        }
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $type_kendaraan = $this->typeKendaraanModel->where(["id" => $id])->first();

            $this->typeKendaraanModel->delete($type_kendaraan["id"]);

            $alert = [
                'success' => 'Type Kendaraan Berhasil di Hapus!'
            ];

            return json_encode($alert);
        }
    }

    public function update()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([

                'jenis_kendaraan_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jenis Kendaraan Tidak Boleh Kosong !'
                    ]
                ],
                'type_kendaraan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Type Kendaraan Tidak Boleh Kosong !'
                    ]
                ],

            ])) {
                $alert = [
                    'error' => [
                        'jenis_kendaraan_id' => $this->validation->getError('jenis_kendaraan_id'),
                        'type_kendaraan' => $this->validation->getError('type_kendaraan'),
                    ]
                ];
            } else {

                $id = $this->request->getPost('id');
                $jenis_kendaraan_id = $this->request->getPost('jenis_kendaraan_id');
                $type_kendaraan = $this->request->getPost('type_kendaraan');



                $this->typeKendaraanModel->update($id, [
                    'jenis_kendaraan_id' => strtolower($jenis_kendaraan_id),
                    'type_kendaraan' => strtolower($type_kendaraan),
                ]);

                $alert = [
                    'success' => 'Type Kendaraan Berhasil di Ubah !'
                ];
            }

            return json_encode($alert);
        }
    }
}
