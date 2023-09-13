<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\JabatanModel;
use App\Models\Admin\PetugasModel;
use App\Models\Admin\RoleManagementModel;
use App\Models\Admin\StatusPetugasModel;
use App\Models\Admin\UkpdModel;
use App\Models\Admin\UnitReguModel;

class UserProfile extends BaseController
{
    protected $petugasModel;
    protected $ukpdModel;
    protected $jabatanModel;
    protected $roleManagementModel;
    protected $statusPetugasModel;
    protected $unitReguModel;
    protected $validation;

    public function __construct()
    {
        $this->petugasModel = new PetugasModel();
        $this->ukpdModel = new UkpdModel();
        $this->jabatanModel = new JabatanModel();
        $this->roleManagementModel = new RoleManagementModel();
        $this->statusPetugasModel = new StatusPetugasModel();
        $this->unitReguModel = new UnitReguModel();
        $this->validation = \Config\Services::validation();
    }

    public function index($nip)
    {

        $data = [
            'title' => 'Profile Petugas',
            'petugas_detail' => $this->petugasModel->getPetugasRow($nip),
            'ukpd' => $this->ukpdModel->getUkpd(),
            'unit_regu' => $this->unitReguModel->getUnit(),
            'jabatan' => $this->jabatanModel->getJabatan(),
            'role_management' => $this->roleManagementModel->getRoleManagement(),
            'status_petugas' => $this->statusPetugasModel->getStatusPetugas()
        ];

        return view('admin/user_profile', $data);
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

                $new_user = $this->petugasModel->getPetugasRow($nip);

                $data = [
                    'ukpd' => $new_user->ukpd,
                    'nama' => $new_user->nama,
                    'username' => $new_user->username,
                    'jabatan' => $new_user->jabatan,
                    'nip' => $new_user->nip,
                    'golongan' => $new_user->golongan,
                    'pangkat' => $new_user->pangkat,
                    'unit_regu' => $new_user->unit_regu,
                    'role_management' => $new_user->role_management,
                    'role_id' => $new_user->role_id,
                    'status_id' =>  $new_user->status_id,
                ];

                session()->set($data);

                $alert = [
                    'success' => 'Petugas Berhasil di Ubah!',
                    'url' => "/admin/user_profile/$new_user->nip"
                ];
            }

            return json_encode($alert);
        }
    }
}
