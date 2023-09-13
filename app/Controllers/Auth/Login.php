<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\Admin\PetugasModel;
use App\Models\Auth\LoginModel;

class Login extends BaseController
{

    protected $validation;
    protected $loginModel;
    protected $petugasModel;
    // protected $session;

    public function __construct()
    {
        // $this->session = \Config\Services::session();
        $this->validation = \Config\Services::validation();
        $this->loginModel = new LoginModel();
        $this->petugasModel = new PetugasModel();
    }


    public function index()
    {
        if (session('isLogedIn') == true) {
            return redirect()->back();
        }

        // dd(session()->get('username'));
        $data = [
            'title' => 'SIDAK PARLI | LOGIN'
        ];

        return view('auth/login.php', $data);
    }

    public function check_login()
    {
        if ($this->request->isAJAX()) {
            if (!$this->validate([
                'username' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Username Tidak Boleh Kosong !'
                    ]
                ],
                'password' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Password Tidak Boleh Kosong !'
                    ]
                ],
            ])) {
                $alert = [
                    'error' => [
                        'username' => $this->validation->getError('username'),
                        'password' => $this->validation->getError('password'),
                    ]
                ];
            } else {
                $username = $this->request->getPost('username');
                $password = $this->request->getPost('password');

                $user_data = $this->loginModel->getPetugasRow($username, $password);


                if ($user_data == null) {
                    $alert = [
                        'errors' => 'Username / Password Tidak ditemukan!'
                    ];
                } else {
                    if ($user_data->role_id == 1 || $user_data->role_id == 2) {
                        $this->petugasModel->update($user_data->id, [
                            'id' => $user_data->id,
                            'status_id' => 1
                        ]);

                        $data = [
                            'id' => $user_data->id,
                            'ukpd' => $user_data->ukpd,
                            'nama' => $user_data->nama,
                            'username' => $user_data->username,
                            'jabatan' => $user_data->jabatan,
                            'nip' => $user_data->nip,
                            'golongan' => $user_data->golongan,
                            'pangkat' => $user_data->pangkat,
                            'unit_regu' => $user_data->unit_regu,
                            'role_management' => $user_data->role_management,
                            'role_id' => $user_data->role_id,
                            'status_id' => $user_data->status_id,
                            'isLogedIn' => true
                        ];
                        session()->set($data);

                        $alert = [
                            'success' => 'Berhasil Login !',
                            'url' => '/admin/dashboard'
                        ];
                    } else if ($user_data->role_id == 3) {

                        $this->petugasModel->update($user_data->id, [
                            'id' => $user_data->id,
                            'status_id' => 1
                        ]);
                        $data = [
                            'id' => $user_data->id,
                            'ukpd' => $user_data->ukpd,
                            'nama' => $user_data->nama,
                            'username' => $user_data->username,
                            'jabatan' => $user_data->jabatan,
                            'nip' => $user_data->nip,
                            'golongan' => $user_data->golongan,
                            'pangkat' => $user_data->pangkat,
                            'unit_regu' => $user_data->unit_regu,
                            'role_management' => $user_data->role_management,
                            'status_id' => $user_data->status_id,
                            'unit_id' => $user_data->unit_id,
                            'ukpd_id' => $user_data->ukpd_id,
                            'isLogedIn' => true
                        ];
                        session()->set($data);

                        $alert = [
                            'success' => 'Berhasil Login !',
                            'url' => '/petugas/dashboard'
                        ];
                    }
                }
            }
            return json_encode($alert);
        };
    }

    public function logout()
    {
        $username = session()->get('username');

        $user_data = $this->loginModel->where(["username" => $username])->get()->getRowObject();

        $this->petugasModel->update($user_data->id, [
            'id' => $user_data->id,
            'status_id' => 2
        ]);
        session()->destroy();

        return redirect()->to('/auth/login');
    }
}
