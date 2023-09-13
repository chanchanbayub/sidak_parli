<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\JenisPenindakanModel;

class JenisPenindakan extends BaseController
{
    protected $jenisPenindakanModel;
    protected $validation;

    public function __construct()
    {
        $this->jenisPenindakanModel = new JenisPenindakanModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $data = [
            'jenis_penindakan' => $this->jenisPenindakanModel->getPenindakan(),
            'title' => 'Jenis Penindakan',
        ];

        return view('admin/jenis_penindakan', $data);
    }

    public function insert()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'jenis_penindakan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jenis Penindakan Tidak Boleh Kosong !'
                    ]
                ],

            ])) {
                $alert = [
                    'error' => [
                        'jenis_penindakan' => $this->validation->getError('jenis_penindakan'),
                    ]
                ];
            } else {

                $jenis_penindakan = $this->request->getPost('jenis_penindakan');


                $this->jenisPenindakanModel->save([
                    'jenis_penindakan' => strtolower($jenis_penindakan),
                ]);

                $alert = [
                    'success' => 'Jenis Penindakan Berhasil di Simpan !'
                ];
            }

            return json_encode($alert);
        }
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $jenis_penindakan = $this->jenisPenindakanModel->where(["id" => $id])->first();


            return json_encode($jenis_penindakan);
        }
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $jenis_penindakan = $this->jenisPenindakanModel->where(["id" => $id])->first();

            $this->jenisPenindakanModel->delete($jenis_penindakan["id"]);

            $alert = [
                'success' => 'Jenis Penindakan Berhasil di Hapus !'
            ];


            return json_encode($alert);
        }
    }

    public function update()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'jenis_penindakan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jenis Penindakan Tidak Boleh Kosong !'
                    ]
                ],

            ])) {
                $alert = [
                    'error' => [
                        'jenis_penindakan' => $this->validation->getError('jenis_penindakan'),

                    ]
                ];
            } else {
                $id = $this->request->getPost('id');
                $jenis_penindakan = $this->request->getPost('jenis_penindakan');


                $this->jenisPenindakanModel->update($id, [
                    'jenis_penindakan' => strtolower($jenis_penindakan)
                ]);

                $alert = [
                    'success' => 'Jenis Penindakan Berhasil di Ubah !'
                ];
            }

            return json_encode($alert);
        }
    }
}
