<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\JabatanModel;

class Jabatan extends BaseController
{
    protected $jabatanModel;
    protected $validation;

    public function __construct()
    {
        $this->jabatanModel = new JabatanModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $data = [
            'jabatan' => $this->jabatanModel->getJabatan(),
            'title' => 'Jabatan',
        ];

        return view('admin/jabatan', $data);
    }

    public function insert()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'jabatan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jenis Kendaraan Tidak Boleh Kosong !'
                    ]
                ],
            ])) {
                $alert = [
                    'error' => [
                        'jabatan' => $this->validation->getError('jabatan'),
                    ]
                ];
            } else {

                $jabatan = $this->request->getPost('jabatan');

                $this->jabatanModel->save([
                    'jabatan' => strtolower($jabatan),

                ]);

                $alert = [
                    'success' => 'Jabatan Berhasil di Simpan !'
                ];
            }

            return json_encode($alert);
        }
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $jabatan = $this->jabatanModel->where(["id" => $id])->first();

            return json_encode($jabatan);
        }
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $jabatan = $this->jabatanModel->where(["id" => $id])->first();

            $this->jabatanModel->delete($jabatan["id"]);

            $alert = [
                'success' => 'Jabatan Berhasil di Hapus !'
            ];

            return json_encode($alert);
        }
    }

    public function update()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([

                'jabatan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jabatan Tidak Boleh Kosong !'
                    ]
                ],
            ])) {
                $alert = [
                    'error' => [
                        'jabatan' => $this->validation->getError('jabatan'),

                    ]
                ];
            } else {

                $id = $this->request->getPost('id');
                $jabatan = $this->request->getPost('jabatan');

                $this->jabatanModel->update($id, [
                    'jabatan' => strtolower($jabatan),
                ]);

                $alert = [
                    'success' => 'Jabatan Berhasil di Ubah !'
                ];
            }

            return json_encode($alert);
        }
    }
}
