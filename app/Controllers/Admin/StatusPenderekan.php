<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\StatusPenderekanModel;

class StatusPenderekan extends BaseController
{
    protected $statusPenderekanModel;
    protected $validation;

    public function __construct()
    {
        $this->statusPenderekanModel = new StatusPenderekanModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $data = [
            'status_penderekan' => $this->statusPenderekanModel->getStatusPenderekan(),
            'title' => 'Status Pembayaran',
        ];

        return view('admin/status_penderekan', $data);
    }

    public function insert()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'status_penderekan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Status Penderekan Tidak Boleh Kosong !'
                    ]
                ],

            ])) {
                $alert = [
                    'error' => [
                        'status_penderekan' => $this->validation->getError('status_penderekan'),
                    ]
                ];
            } else {

                $status_penderekan = $this->request->getPost('status_penderekan');


                $this->statusPenderekanModel->save([
                    'status_penderekan' => strtolower($status_penderekan),
                ]);

                $alert = [
                    'success' => 'Status Penderekan Berhasil di Simpan !'
                ];
            }

            return json_encode($alert);
        }
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $status_penderekan = $this->statusPenderekanModel->where(["id" => $id])->first();


            return json_encode($status_penderekan);
        }
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $status_penderekan = $this->statusPenderekanModel->where(["id" => $id])->first();

            $this->statusPenderekanModel->delete($status_penderekan["id"]);

            $alert = [
                'success' => 'Status Penderekan Berhasil di Hapus!'
            ];


            return json_encode($alert);
        }
    }

    public function update()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'status_penderekan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Status Penderekan Tidak Boleh Kosong !'
                    ]
                ],

            ])) {
                $alert = [
                    'error' => [
                        'status_penderekan' => $this->validation->getError('status_penderekan'),

                    ]
                ];
            } else {
                $id = $this->request->getPost('id');
                $status_penderekan = $this->request->getPost('status_penderekan');


                $this->statusPenderekanModel->update($id, [
                    'status_penderekan' => strtolower($status_penderekan)
                ]);

                $alert = [
                    'success' => 'Status Penderekan Berhasil di Ubah !'
                ];
            }

            return json_encode($alert);
        }
    }
}
