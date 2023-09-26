<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\KendaraanDinasModel;
use App\Models\Admin\UkpdModel;
use App\Models\Admin\UnitReguModel;

class UnitRegu extends BaseController
{
    protected $ukpdModel;
    protected $unitReguModel;
    protected $kendaraanDinasModel;
    protected $validation;
    protected $sessionRole;

    public function __construct()
    {
        $this->unitReguModel = new UnitReguModel();
        $this->ukpdModel = new UkpdModel();
        $this->kendaraanDinasModel = new KendaraanDinasModel();
        $this->validation = \Config\Services::validation();
        $this->sessionRole = session()->get('role_id');
    }

    public function index()
    {
        if ($this->sessionRole == 2) {
            $unit_regu = $this->unitReguModel->getUnitWhereUKPD(session()->get('ukpd_id'));
        } else {
            $unit_regu = $this->unitReguModel->getUnit();
        }

        $data = [
            'unit_regu' => $unit_regu,
            'ukpd' => $this->ukpdModel->getUkpd(),
            'title' => 'Unit Regu',
        ];

        return view('admin/unit_regu', $data);
    }

    public function insert()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'ukpd_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'UKPD Tidak Boleh Kosong !',

                    ]
                ],
                'unit_regu' => [
                    'rules' => 'required|is_unique[unit_regu_table.unit_regu]',
                    'errors' => [
                        'required' => 'Unit / Regu Tidak Boleh Kosong !',
                        'is_unique' => 'Unit / Regu Tidak Boleh Sama !'
                    ]
                ],

            ])) {
                $alert = [
                    'error' => [
                        'ukpd_id' => $this->validation->getError('ukpd_id'),
                        'unit_regu' => $this->validation->getError('unit_regu'),
                    ]
                ];
            } else {

                $ukpd_id = $this->request->getPost('ukpd_id');
                $unit_regu = $this->request->getPost('unit_regu');


                $this->unitReguModel->save([
                    'ukpd_id' => strtolower($ukpd_id),
                    'unit_regu' => strtolower($unit_regu),

                ]);

                $alert = [
                    'success' => 'Unit / Regu Berhasil di Simpan !'
                ];
            }

            return json_encode($alert);
        }
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $unit_regu = $this->unitReguModel->where(["id" => $id])->first();
            $ukpd = $this->ukpdModel->getUkpd();

            $data = [
                'unit_regu' => $unit_regu,
                'ukpd' => $ukpd,
            ];

            return json_encode($data);
        }
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $unit_regu = $this->unitReguModel->where(["id" => $id])->first();

            $this->unitReguModel->delete($unit_regu["id"]);

            $alert = [
                'success' => 'Unit / Regu Berhasil di Hapus!'
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
                        'required' => 'UKPD Tidak Boleh Kosong !',

                    ]
                ],
                'unit_regu' => [
                    'rules' => 'required|is_unique[unit_regu_table.unit_regu]',
                    'errors' => [
                        'required' => 'Unit / Regu Tidak Boleh Kosong !',
                        'is_unique' => 'Unit / Regu Tidak Boleh Sama !'
                    ]
                ],
            ])) {
                $alert = [
                    'error' => [
                        'ukpd_id' => $this->validation->getError('ukpd_id'),
                        'unit_regu' => $this->validation->getError('unit_regu'),
                    ]
                ];
            } else {

                $id = $this->request->getPost('id');
                $ukpd_id = $this->request->getPost('ukpd_id');
                $unit_regu = $this->request->getPost('unit_regu');


                $this->unitReguModel->update($id, [
                    'ukpd_id' => strtolower($ukpd_id),
                    'unit_regu' => strtolower($unit_regu),


                ]);

                $alert = [
                    'success' => 'Unit / Regu Berhasil di Ubah!'
                ];
            }

            return json_encode($alert);
        }
    }

    public function detail_data()
    {
        $data = [
            'unit_regu' => $this->unitReguModel->getUnit(),
            'title' => 'Detail Data Unit / Regu',
        ];

        return view('admin/detail_unit', $data);
    }

    public function detail_unit($id)
    {
        $kendaraan_dinas = $this->kendaraanDinasModel->getKDOWithUnitId($id);

        $data = [
            'personel_unit' => $this->unitReguModel->getUnitWithPetugas($id),
            'title' => 'Detail Data Unit / Regu',
            'kdo' => $kendaraan_dinas
        ];

        return view('admin/unit_profile', $data);
    }
}
