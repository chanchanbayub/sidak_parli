<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\StatusPetugasModel;

class StatusPetugas extends BaseController
{
    protected $statusPetugasModel;
    protected $validation;

    public function __construct()
    {
        $this->statusPetugasModel = new StatusPetugasModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $data = [
            'status_petugas' => $this->statusPetugasModel->getStatusPetugas(),
            'title' => 'Status Petugas',
        ];

        return view('admin/status_petugas', $data);
    }

    public function insert()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'status_petugas' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Status Petugas Tidak Boleh Kosong !'
                    ]
                ],
            ])) {
                $alert = [
                    'error' => [
                        'status_petugas' => $this->validation->getError('status_petugas'),
                    ]
                ];
            } else {

                $status_petugas = $this->request->getPost('status_petugas');

                $this->statusPetugasModel->save([
                    'status_petugas' => strtolower($status_petugas),

                ]);

                $alert = [
                    'success' => 'Status Petugas Berhasil di Simpan !'
                ];
            }

            return json_encode($alert);
        }
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $status_petugas = $this->statusPetugasModel->where(["id" => $id])->first();

            return json_encode($status_petugas);
        }
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $status_petugas = $this->statusPetugasModel->where(["id" => $id])->first();

            $this->statusPetugasModel->delete($status_petugas["id"]);

            $alert = [
                'success' => 'Status Petugas Berhasil di Hapus !'
            ];

            return json_encode($alert);
        }
    }

    public function update()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([

                'status_petugas' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'status_petugas Tidak Boleh Kosong !'
                    ]
                ],
            ])) {
                $alert = [
                    'error' => [
                        'status_petugas' => $this->validation->getError('status_petugas'),

                    ]
                ];
            } else {

                $id = $this->request->getPost('id');
                $status_petugas = $this->request->getPost('status_petugas');

                $this->statusPetugasModel->update($id, [
                    'status_petugas' => strtolower($status_petugas),
                ]);

                $alert = [
                    'success' => 'Status Berhasil di Ubah !'
                ];
            }

            return json_encode($alert);
        }
    }
}
