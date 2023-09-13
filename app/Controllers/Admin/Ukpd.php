<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\UkpdModel;

class Ukpd extends BaseController
{
    protected $validation;
    protected $ukpdModel;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->ukpdModel = new UkpdModel();
    }

    public function index()
    {
        $data = [
            'ukpd' => $this->ukpdModel->getUkpd(),
            'title' => 'Unit Kerja Pemerintah Daerah',
        ];

        return view('admin/ukpd', $data);
    }

    public function insert()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'ukpd' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'UKPD Tidak Boleh Kosong !'
                    ]
                ],
                'nama_dinas' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Intansi Tidak Boleh Kosong !'
                    ]
                ],
            ])) {
                $alert = [
                    'error' => [
                        'ukpd' => $this->validation->getError('ukpd'),
                        'nama_dinas' => $this->validation->getError('nama_dinas')
                    ]
                ];
            } else {

                $ukpd = $this->request->getPost('ukpd');
                $nama_dinas = $this->request->getPost('nama_dinas');

                $this->ukpdModel->save([
                    'ukpd' => strtolower($ukpd),
                    'nama_dinas' => strtolower($nama_dinas)
                ]);

                $alert = [
                    'success' => 'UKPD Berhasil di Simpan !'
                ];
            }

            return json_encode($alert);
        }
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $ukpd = $this->ukpdModel->where(["id" => $id])->first();
            // dd($ukpd);

            return json_encode($ukpd);
        }
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $ukpd = $this->ukpdModel->where(["id" => $id])->first();

            $this->ukpdModel->delete($ukpd["id"]);

            $alert = [
                'success' => 'UKPD Berhasil di Hapus'
            ];

            return json_encode($alert);
        }
    }

    public function update()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'ukpd' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'UKPD Tidak Boleh Kosong !'
                    ]
                ],
                'nama_dinas' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Intansi Tidak Boleh Kosong !'
                    ]
                ],
            ])) {
                $alert = [
                    'error' => [
                        'ukpd' => $this->validation->getError('ukpd'),
                        'nama_dinas' => $this->validation->getError('nama_dinas')
                    ]
                ];
            } else {
                $id = $this->request->getPost('id');
                $ukpd = $this->request->getPost('ukpd');
                $nama_dinas = $this->request->getPost('nama_dinas');



                $this->ukpdModel->update($id, [
                    'ukpd' => strtolower($ukpd),
                    'nama_dinas' => strtolower($nama_dinas)
                ]);

                $alert = [
                    'success' => 'UKPD Berhasil di Ubah !'
                ];
            }

            return json_encode($alert);
        }
    }
}
