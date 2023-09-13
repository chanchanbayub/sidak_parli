<?php

namespace App\Controllers\Petugas;

use App\Controllers\Admin\RoleManagement;
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
            'unit_petugas' => $this->petugasModel->getPetugasUnit(session()->get('ukpd_id'), session()->get('unit_id')),
            'ukpd' => $this->ukpdModel->getUkpd(),
            'unit_regu' => $this->unitReguModel->getUnit(),
            'jabatan' => $this->jabatanModel->getJabatan(),
            'role_management' => $this->roleManagementModel->getRoleManagement(),
            'status_petugas' => $this->statusPetugasModel->getStatusPetugas()
        ];

        return view('petugas/user_profile', $data);
    }
}
