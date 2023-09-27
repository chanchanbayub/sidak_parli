<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\BAPModel;
use App\Models\Admin\JenisPenindakanModel;
use App\Models\Admin\StatusPenderekanModel;
use App\Models\Admin\UkpdModel;
use App\Models\Admin\UnitReguModel;

class BAP extends BaseController
{
    protected $bapModel;
    protected $ukpdModel;
    protected $jenisPenindakanModel;
    protected $statusPenderekanModel;
    protected $validation;
    protected $unitReguModel;
    protected $sessionRole;

    public function __construct()
    {
        $this->bapModel = new BAPModel();
        $this->ukpdModel = new UkpdModel();
        $this->jenisPenindakanModel = new JenisPenindakanModel();
        $this->statusPenderekanModel = new StatusPenderekanModel();
        $this->unitReguModel = new UnitReguModel();
        $this->validation = \Config\Services::validation();
        $this->sessionRole = session()->get('role_id');
    }

    public function index()
    {
        if ($this->sessionRole == 2) {
            $bap = $this->bapModel->getBAP(session()->get('ukpd_id'));
            $unit_regu = $this->unitReguModel->getUnitWhereUKPD(session()->get('ukpd_id'));
        } else {
            $bap = $this->bapModel->getBAP("");
            $unit_regu = $this->unitReguModel->getUnit();
        }
        $data = [
            'bap' => $bap,
            'ukpd' => $this->ukpdModel->getUkpd(),
            'jenis_penindakan' => $this->jenisPenindakanModel->getPenindakan(),
            'unit_regu' => $unit_regu,
            'status_penderekan' => $this->statusPenderekanModel->getStatusPenderekanKeluar(),
            'title' => 'BERITA ACARA PENINDAKAN',
        ];

        return view('admin/bap', $data);
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
                'jenis_penindakan_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jenis Penindakan Tidak Boleh Kosong !'
                    ]
                ],
                'nomor_bap_awal' => [
                    'rules' => 'required|is_unique[bap_table.nomor_bap]',
                    'errors' => [
                        'required' => 'Nomor BAP Awal Tidak Boleh Kosong !',
                        'is_unique' => 'Nomor BAP Tidak Boleh Sama !'
                    ]
                ],
                'nomor_bap_akhir' => [
                    'rules' => 'required|is_unique[bap_table.nomor_bap]',
                    'errors' => [
                        'required' => 'Nomor BAP Akhir Tidak Boleh Kosong !',
                        'is_unique' => 'Nomor BAP Tidak Boleh Sama !'
                    ]
                ],
                'unit_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Unit / Regu Tidak Boleh Kosong!'
                    ]
                ],
                'status_bap_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Status BAP Tidak Boleh Kosong !'
                    ]
                ],
            ])) {
                $alert = [
                    'error' => [
                        'ukpd_id' => $this->validation->getError('ukpd_id'),
                        'jenis_penindakan_id' => $this->validation->getError('jenis_penindakan_id'),
                        'nomor_bap_awal' => $this->validation->getError('nomor_bap_awal'),
                        'nomor_bap_akhir' => $this->validation->getError('nomor_bap_akhir'),
                        'unit_id' => $this->validation->getError('unit_id'),
                        'status_bap_id' => $this->validation->getError('status_bap_id'),
                    ]
                ];
            } else {

                $ukpd_id = $this->request->getPost('ukpd_id');
                $jenis_penindakan_id = $this->request->getPost('jenis_penindakan_id');
                $nomor_bap_awal = $this->request->getPost('nomor_bap_awal');
                $nomor_bap_akhir = $this->request->getPost('nomor_bap_akhir');
                $unit_id = $this->request->getPost('unit_id');
                $status_bap_id = $this->request->getPost('status_bap_id');

                if (!is_numeric($nomor_bap_awal)) {
                    $nomor_bap = "-";
                    $this->bapModel->save([
                        'ukpd_id' => $ukpd_id,
                        'jenis_penindakan_id' => $jenis_penindakan_id,
                        'nomor_bap' => $nomor_bap,
                        'unit_id' => $unit_id,
                        'status_bap_id' => $status_bap_id,
                    ]);
                } else {
                    for ($i = intval($nomor_bap_awal); $i <= intval($nomor_bap_akhir); $i++) {
                        if (strlen($i) == 1) {
                            $nomor_bap = '000000' . $i;
                        } else if (strlen($i) == 2) {
                            $nomor_bap = '00000' . $i;
                        } else if (strlen($i) == 3) {
                            $nomor_bap = '0000' . $i;
                        } else if (strlen($i) == 4) {
                            $nomor_bap = '000' . $i;
                        } else if (strlen($i) == 5) {
                            $nomor_bap = '00' . $i;
                        } else if (strlen($i) == 6) {
                            $nomor_bap = '0' . $i;
                        } else if (strlen($i) == 7) {
                            $nomor_bap = $i;
                        }

                        $this->bapModel->save([
                            'ukpd_id' => $ukpd_id,
                            'jenis_penindakan_id' => $jenis_penindakan_id,
                            'nomor_bap' => $nomor_bap,
                            'unit_id' => $unit_id,
                            'status_bap_id' => $status_bap_id,
                        ]);
                    }
                }

                $alert = [
                    'success' => 'Nomor BAP Berhasil di Simpan !'
                ];
            }

            return json_encode($alert);
        }
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $data = [
                'bap' => $this->bapModel->where(["id" => $id])->first(),
                'ukpd' => $this->ukpdModel->getUkpd(),
                'jenis_penindakan' => $this->jenisPenindakanModel->getPenindakan(),
                'status_penderekan' => $this->statusPenderekanModel->getStatusPenderekan(),
                'unit_regu' => $this->unitReguModel->getUnit()
            ];

            return json_encode($data);
        }
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $bap = $this->bapModel->where(["id" => $id])->first();

            $this->bapModel->delete($bap["id"]);

            $alert = [
                'success' => 'Nomor BAP Berhasil di Hapus!'
            ];

            return json_encode($alert);
        }
    }

    public function update()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getPost('id');
            $ukpd_id = $this->request->getPost('ukpd_id');
            $jenis_penindakan_id = $this->request->getPost('jenis_penindakan_id');
            $nomor_bap = $this->request->getPost('nomor_bap');
            $unit_id = $this->request->getPost('unit_id');
            $status_bap_id = $this->request->getPost('status_bap_id');

            $this->bapModel->update($id, [
                'ukpd_id' => $ukpd_id,
                'jenis_penindakan_id' => $jenis_penindakan_id,
                'nomor_bap' => $nomor_bap,
                'unit_id' => $unit_id,
                'status_bap_id' => $status_bap_id,
            ]);

            $alert = [
                'success' => 'Nomor BAP Berhasil di Ubah !'
            ];
        }

        return json_encode($alert);
    }
}
