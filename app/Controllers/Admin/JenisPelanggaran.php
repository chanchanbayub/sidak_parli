<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\JenisPelanggaranModel;

class JenisPelanggaran extends BaseController
{
    protected $jenisPelanggaranModel;
    protected $validation;

    public function __construct()
    {
        $this->jenisPelanggaranModel = new JenisPelanggaranModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $data = [
            'jenis_pelanggaran' => $this->jenisPelanggaranModel->getPelanggaran(),
            'title' => 'Jenis Pelanggaran',
        ];

        return view('admin/jenis_pelanggaran', $data);
    }

    public function insert()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'jenis_pelanggaran' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jenis pelanggaran Tidak Boleh Kosong !'
                    ]
                ],

            ])) {
                $alert = [
                    'error' => [
                        'jenis_pelanggaran' => $this->validation->getError('jenis_pelanggaran'),
                    ]
                ];
            } else {

                $jenis_pelanggaran = $this->request->getPost('jenis_pelanggaran');


                $this->jenisPelanggaranModel->save([
                    'jenis_pelanggaran' => strtolower($jenis_pelanggaran),
                ]);

                $alert = [
                    'success' => 'Jenis Pelanggaran Berhasil di Simpan !'
                ];
            }

            return json_encode($alert);
        }
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $jenis_pelanggaran = $this->jenisPelanggaranModel->where(["id" => $id])->first();


            return json_encode($jenis_pelanggaran);
        }
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $jenis_pelanggaran = $this->jenisPelanggaranModel->where(["id" => $id])->first();

            $this->jenisPelanggaranModel->delete($jenis_pelanggaran["id"]);

            $alert = [
                'success' => 'Jenis Pelanggaran Berhasil di Hapus !'
            ];


            return json_encode($alert);
        }
    }

    public function update()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'jenis_pelanggaran' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jenis Pelanggaran Tidak Boleh Kosong !'
                    ]
                ],

            ])) {
                $alert = [
                    'error' => [
                        'jenis_pelanggaran' => $this->validation->getError('jenis_pelanggaran'),

                    ]
                ];
            } else {
                $id = $this->request->getPost('id');
                $jenis_pelanggaran = $this->request->getPost('jenis_pelanggaran');


                $this->jenisPelanggaranModel->update($id, [
                    'jenis_pelanggaran' => strtolower($jenis_pelanggaran)
                ]);

                $alert = [
                    'success' => 'Jenis Pelanggaran Berhasil di Ubah !'
                ];
            }

            return json_encode($alert);
        }
    }
}
