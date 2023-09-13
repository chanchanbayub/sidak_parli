<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\JabatanModel;
use App\Models\Admin\PetugasModel;
use App\Models\Admin\RoleManagementModel;
use App\Models\Admin\StatusPetugasModel;
use App\Models\Admin\UkpdModel;
use App\Models\Admin\UnitReguModel;

class Petugas extends BaseController
{
    protected $petugasModel;
    protected $ukpdModel;
    protected $unitReguModel;
    protected $jabatanModel;
    protected $roleManagementModel;
    protected $statusPetugasModel;
    protected $validation;

    public function __construct()
    {
        $this->petugasModel = new PetugasModel();
        $this->ukpdModel = new UkpdModel();
        $this->unitReguModel = new UnitReguModel();
        $this->jabatanModel = new JabatanModel();
        $this->roleManagementModel = new RoleManagementModel();
        $this->statusPetugasModel = new StatusPetugasModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $data = [

            'ukpd' => $this->ukpdModel->getUkpd(),
            'unit_regu' => $this->unitReguModel->getUnit(),
            'jabatan' => $this->jabatanModel->getJabatan(),
            'role_management' => $this->roleManagementModel->getRoleManagement(),
            'petugas' => $this->petugasModel->getPetugas(),
            'status_petugas' => $this->statusPetugasModel->getStatusPetugas(),
            'title' => 'Petugas',
        ];

        return view('admin/petugas', $data);
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
                'unit_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Unit / Regu Tidak Boleh Kosong !'
                    ]
                ],
                'nama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Tidak Boleh Kosong !'
                    ]
                ],
                'nip' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'NIP Tidak Boleh Kosong !'
                    ]
                ],
                'jabatan_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jabatan Tidak Boleh Kosong !'
                    ]
                ],
                'role_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Role Management Tidak Boleh Kosong !'
                    ]
                ],
                'status_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Status Petugas Tidak Boleh Kosong !'
                    ]
                ],

            ])) {
                $alert = [
                    'error' => [
                        'ukpd_id' => $this->validation->getError('ukpd_id'),
                        'unit_id' => $this->validation->getError('unit_id'),
                        'nama' => $this->validation->getError('nama'),
                        'nip' => $this->validation->getError('nip'),
                        'jabatan_id' => $this->validation->getError('jabatan_id'),
                        'role_id' => $this->validation->getError('role_id'),
                        'status_id' => $this->validation->getError('status_id'),
                    ]
                ];
            } else {

                $ukpd_id = $this->request->getPost('ukpd_id');
                $unit_id = $this->request->getPost('unit_id');
                $nama = $this->request->getPost('nama');
                $username = url_title($this->request->getPost('nama'), '_', true);
                $nip = $this->request->getPost('nip');
                $golongan = $this->request->getPost('golongan');
                $pangkat = $this->request->getPost('pangkat');
                $jabatan_id = $this->request->getPost('jabatan_id');
                $role_id = $this->request->getPost('role_id');
                $status_id = $this->request->getPost('status_id');

                $this->petugasModel->save([
                    'ukpd_id' => strtolower($ukpd_id),
                    'unit_id' => strtolower($unit_id),
                    'nama' => strtolower($nama),
                    'username' => strtolower($username),
                    'nip' => strtolower($nip),
                    'golongan' => strtolower($golongan),
                    'pangkat' => strtolower($pangkat),
                    'jabatan_id' => strtolower($jabatan_id),
                    'role_id' => strtolower($role_id),
                    'status_id' => strtolower($status_id),
                ]);

                $alert = [
                    'success' => 'Petugas Berhasil di Simpan !'
                ];
            }

            return json_encode($alert);
        }
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $petugas = $this->petugasModel->where(["id" => $id])->first();

            $data = [
                'petugas' => $petugas,
                'ukpd' => $this->ukpdModel->getUkpd(),
                'unit_regu' => $this->unitReguModel->getUnit(),
                'jabatan' => $this->jabatanModel->getJabatan(),
                'role_management' => $this->roleManagementModel->getRoleManagement(),
                'status_petugas' => $this->statusPetugasModel->getStatusPetugas()
            ];

            return json_encode($data);
        }
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $petugas = $this->petugasModel->getPetugasWithTTD($id);

            if ($petugas->tanda_tangan_petugas != null) {
                $path =  $petugas->tanda_tangan_petugas;
                if (file_exists($path)) {
                    unlink($path);
                }
            }

            $this->petugasModel->delete($petugas->id);

            $alert = [
                'success' => 'Petugas Berhasil di Hapus !'
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
                'unit_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Unit / Regu Tidak Boleh Kosong !'
                    ]
                ],
                'nama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Tidak Boleh Kosong !'
                    ]
                ],
                'username' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Username Tidak Boleh Kosong !'
                    ]
                ],
                'nip' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'NIP Tidak Boleh Kosong !'
                    ]
                ],
                'jabatan_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jabatan Tidak Boleh Kosong !'
                    ]
                ],
                'role_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Role Management Tidak Boleh Kosong !'
                    ]
                ],
                'status_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Status Petugas Tidak Boleh Kosong !'
                    ]
                ],
            ])) {
                $alert = [
                    'error' => [
                        'ukpd_id' => $this->validation->getError('ukpd_id'),
                        'unit_id' => $this->validation->getError('unit_id'),
                        'nama' => $this->validation->getError('nama'),
                        'username' => $this->validation->getError('username'),
                        'nip' => $this->validation->getError('nip'),
                        'jabatan_id' => $this->validation->getError('jabatan_id'),
                        'role_id' => $this->validation->getError('role_id'),
                        'status_id' => $this->validation->getError('status_id'),
                    ]
                ];
            } else {

                $id = $this->request->getPost('id');
                $ukpd_id = $this->request->getPost('ukpd_id');
                $unit_id = $this->request->getPost('unit_id');
                $nama = $this->request->getPost('nama');
                $username = $this->request->getPost('username');
                $nip = $this->request->getPost('nip');
                $golongan = $this->request->getPost('golongan');
                $pangkat = $this->request->getPost('pangkat');
                $jabatan_id = $this->request->getPost('jabatan_id');
                $role_id = $this->request->getPost('role_id');
                $status_id = $this->request->getPost('status_id');

                $this->petugasModel->update($id, [
                    'ukpd_id' => strtolower($ukpd_id),
                    'unit_id' => strtolower($unit_id),
                    'nama' => strtolower($nama),
                    'username' => strtolower($username),
                    'nip' => strtolower($nip),
                    'golongan' => strtolower($golongan),
                    'pangkat' => strtolower($pangkat),
                    'jabatan_id' => strtolower($jabatan_id),
                    'role_id' => strtolower($role_id),
                    'status_id' => strtolower($status_id),

                ]);

                $alert = [
                    'success' => 'Petugas Berhasil di Ubah!'
                ];
            }

            return json_encode($alert);
        }
    }

    public function detail($nip)
    {
        $petugas = $this->petugasModel->getPetugasRow($nip);
        $data = [
            'petugas_detail' => $petugas,
            'title' => 'Detail Petugas'
        ];

        return view('admin/petugas_detail', $data);
    }
}
