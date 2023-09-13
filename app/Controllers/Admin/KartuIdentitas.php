<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\KartuIdentitasModel;

class KartuIdentitas extends BaseController
{
    protected $kartuIdentitasModel;
    protected $validation;

    public function __construct()
    {
        $this->kartuIdentitasModel = new KartuIdentitasModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $data = [
            'kartu_identitas' => $this->kartuIdentitasModel->getKartuIdentitas(),
            'title' => 'KARTU IDENTITAS',
        ];

        return view('admin/kartu_identitas', $data);
    }

    public function insert()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'kartu_identitas' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kartu Identitas Tidak Boleh Kosong !'
                    ]
                ],

            ])) {
                $alert = [
                    'error' => [
                        'kartu_identitas' => $this->validation->getError('kartu_identitas'),
                    ]
                ];
            } else {

                $kartu_identitas = $this->request->getPost('kartu_identitas');


                $this->kartuIdentitasModel->save([
                    'kartu_identitas' => strtolower($kartu_identitas),
                ]);

                $alert = [
                    'success' => 'Kartu Identitas Berhasil di Simpan !'
                ];
            }

            return json_encode($alert);
        }
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $kartu_identitas = $this->kartuIdentitasModel->where(["id" => $id])->first();


            return json_encode($kartu_identitas);
        }
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $kartu_identitas = $this->kartuIdentitasModel->where(["id" => $id])->first();

            $this->kartuIdentitasModel->delete($kartu_identitas["id"]);

            $alert = [
                'success' => 'Kartu Identitas Berhasil di Hapus!'
            ];


            return json_encode($alert);
        }
    }

    public function update()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'kartu_identitas' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Status Penderekan Tidak Boleh Kosong !'
                    ]
                ],

            ])) {
                $alert = [
                    'error' => [
                        'kartu_identitas' => $this->validation->getError('kartu_identitas'),

                    ]
                ];
            } else {
                $id = $this->request->getPost('id');
                $kartu_identitas = $this->request->getPost('kartu_identitas');


                $this->kartuIdentitasModel->update($id, [
                    'kartu_identitas' => strtolower($kartu_identitas)
                ]);

                $alert = [
                    'success' => 'Kartu Identitas Berhasil di Ubah !'
                ];
            }

            return json_encode($alert);
        }
    }
}
