<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\JenisSPKModel;

class JenisSpk extends BaseController
{
    protected $jenisSPKModel;
    protected $validation;

    public function __construct()
    {
        $this->jenisSPKModel = new JenisSPKModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $data = [
            'jenis_spk' => $this->jenisSPKModel->getJenisSPK(),
            'title' => 'Jenis Surat Pengeluaran',
        ];

        return view('admin/jenis_spk', $data);
    }

    public function insert()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'jenis_spk' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jenis SPK Tidak Boleh Kosong !'
                    ]
                ],
            ])) {
                $alert = [
                    'error' => [
                        'jenis_spk' => $this->validation->getError('jenis_spk'),
                    ]
                ];
            } else {

                $jenis_spk = $this->request->getPost('jenis_spk');

                $this->jenisSPKModel->save([
                    'jenis_spk' => strtolower($jenis_spk),

                ]);

                $alert = [
                    'success' => 'Jenis SPK Berhasil di Simpan !'
                ];
            }

            return json_encode($alert);
        }
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $jenis_spk = $this->jenisSPKModel->where(["id" => $id])->first();

            return json_encode($jenis_spk);
        }
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $jenis_spk = $this->jenisSPKModel->where(["id" => $id])->first();

            $this->jenisSPKModel->delete($jenis_spk["id"]);

            $alert = [
                'success' => 'Jenis SPK Berhasil di Hapus !'
            ];

            return json_encode($alert);
        }
    }

    public function update()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([

                'jenis_spk' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'jenis_spk Tidak Boleh Kosong !'
                    ]
                ],
            ])) {
                $alert = [
                    'error' => [
                        'jenis_spk' => $this->validation->getError('jenis_spk'),

                    ]
                ];
            } else {

                $id = $this->request->getPost('id');
                $jenis_spk = $this->request->getPost('jenis_spk');

                $this->jenisSPKModel->update($id, [
                    'jenis_spk' => strtolower($jenis_spk),
                ]);

                $alert = [
                    'success' => 'Jenis SPK Berhasil di Ubah !'
                ];
            }

            return json_encode($alert);
        }
    }
}
