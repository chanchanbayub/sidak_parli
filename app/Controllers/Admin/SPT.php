<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\SPTModel;
use App\Models\Admin\UkpdModel;

class SPT extends BaseController
{
    protected $sptModel;
    protected $ukpdModel;
    protected $validation;

    public function __construct()
    {
        $this->sptModel = new SPTModel();
        $this->ukpdModel = new UkpdModel();
        $this->validation = \Config\Services::validation();
        helper(["format"]);
    }

    public function index()
    {
        $data = [
            'spt' => $this->sptModel->getSPT(),
            'title' => 'SURAT PENUGASAN ANGGOTA',
            'ukpd' => $this->ukpdModel->getUkpd()
        ];

        return view('admin/spt', $data);
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
                'nomor_surat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nomor Surat Tidak Boleh Kosong !'
                    ]
                ],
                'tanggal_surat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tanggal Surat Tidak Boleh Kosong !'
                    ]
                ],

            ])) {
                $alert = [
                    'error' => [
                        'ukpd_id' => $this->validation->getError('ukpd_id'),
                        'nomor_surat' => $this->validation->getError('nomor_surat'),
                        'tanggal_surat' => $this->validation->getError('tanggal_surat'),
                    ]
                ];
            } else {

                $ukpd_id = $this->request->getPost('ukpd_id');
                $nomor_surat = $this->request->getPost('nomor_surat');
                $tanggal_surat = $this->request->getPost('tanggal_surat');


                $this->sptModel->save([
                    'ukpd_id' => strtolower($ukpd_id),
                    'nomor_surat' => strtolower($nomor_surat),
                    'tanggal_surat' => strtolower($tanggal_surat),

                ]);

                $alert = [
                    'success' => 'SPT Berhasil di Simpan !'
                ];
            }

            return json_encode($alert);
        }
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $ukpd = $this->ukpdModel->getUkpd();

            $spt = $this->sptModel->where(["id" => $id])->first();

            $data = [
                'ukpd' => $ukpd,
                'spt'  => $spt
            ];

            return json_encode($data);
        }
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $spt = $this->sptModel->where(["id" => $id])->first();

            $this->sptModel->delete($spt["id"]);

            $alert = [
                'success' => 'SPT Berhasil di Hapus !'
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
                'nomor_surat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nomor Surat Tidak Boleh Kosong !'
                    ]
                ],
                'tanggal_surat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tanggal Surat Tidak Boleh Kosong !'
                    ]
                ],

            ])) {
                $alert = [
                    'error' => [
                        'ukpd_id' => $this->validation->getError('ukpd_id'),
                        'nomor_surat' => $this->validation->getError('nomor_surat'),
                        'tanggal_surat' => $this->validation->getError('tanggal_surat'),
                    ]
                ];
            } else {

                $id = $this->request->getPost('id');
                $ukpd_id = $this->request->getPost('ukpd_id');
                $nomor_surat = $this->request->getPost('nomor_surat');
                $tanggal_surat = $this->request->getPost('tanggal_surat');


                $this->sptModel->update($id, [
                    'ukpd_id' => strtolower($ukpd_id),
                    'nomor_surat' => strtolower($nomor_surat),
                    'tanggal_surat' => strtolower($tanggal_surat),

                ]);

                $alert = [
                    'success' => 'SPT Berhasil di Ubah !'
                ];
            }

            return json_encode($alert);
        }
    }
}
