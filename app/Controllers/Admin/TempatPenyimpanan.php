<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\TempatPenyimpananModel;
use App\Models\Admin\UkpdModel;

class TempatPenyimpanan extends BaseController
{
    protected $ukpdModel;
    protected $tempatPenyimpananModel;
    protected $validation;
    protected $sessionRole;

    public function __construct()
    {
        $this->tempatPenyimpananModel = new TempatPenyimpananModel();
        $this->ukpdModel = new UkpdModel();
        $this->validation = \Config\Services::validation();
        $this->sessionRole = session()->get('role_id');
    }

    public function index()
    {
        if ($this->sessionRole == 2) {
            $tempat_penyimpanan = $this->tempatPenyimpananModel->getTempatPenyimpananWhereUKPD(session()->get('ukpd_id'));
        } else {
            $tempat_penyimpanan = $this->tempatPenyimpananModel->getTempatPenyimpanan("");
        }

        $data = [
            'tempat_penyimpanan' => $tempat_penyimpanan,
            'ukpd' => $this->ukpdModel->getUkpd(),
            'title' => 'Tempat Penyimpanan',
        ];

        return view('admin/tempat_penyimpanan', $data);
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
                'tempat_penyimpanan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tempat Penyimpanan Tidak Boleh Kosong !'
                    ]
                ],
                'latitude' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Latitude Tidak Boleh Kosong !'
                    ]
                ],
                'longitude' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Longitude Tidak Boleh Kosong !'
                    ]
                ],

            ])) {
                $alert = [
                    'error' => [
                        'ukpd_id' => $this->validation->getError('ukpd_id'),
                        'tempat_penyimpanan' => $this->validation->getError('tempat_penyimpanan'),
                        'latitude' => $this->validation->getError('latitude'),
                        'longitude' => $this->validation->getError('longitude'),

                    ]
                ];
            } else {

                $ukpd_id = $this->request->getPost('ukpd_id');
                $tempat_penyimpanan = $this->request->getPost('tempat_penyimpanan');
                $latitude = $this->request->getPost('latitude');
                $longitude = $this->request->getPost('longitude');


                $this->tempatPenyimpananModel->save([
                    'ukpd_id' => strtolower($ukpd_id),
                    'tempat_penyimpanan' => strtolower($tempat_penyimpanan),
                    'latitude' => strtolower($latitude),
                    'longitude' => strtolower($longitude),

                ]);

                $alert = [
                    'success' => 'Tempat Penyimpanan Berhasil di Simpan !'
                ];
            }

            return json_encode($alert);
        }
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $tempat_penyimpanan = $this->tempatPenyimpananModel->where(["id" => $id])->first();
            $ukpd = $this->ukpdModel->getUkpd();

            $data = [
                'tempat_penyimpanan' => $tempat_penyimpanan,
                'ukpd' => $ukpd,
            ];

            return json_encode($data);
        }
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $tempat_penyimpanan = $this->tempatPenyimpananModel->where(["id" => $id])->first();

            $this->tempatPenyimpananModel->delete($tempat_penyimpanan["id"]);

            $alert = [
                'success' => 'Tempat Penyimpanan Berhasil di Hapus!'
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
                'tempat_penyimpanan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tempat Penyimpanan Tidak Boleh Kosong !'
                    ]
                ],
                'link_gmaps' => [
                    'rules' => 'required|valid_url_strict',
                    'errors' => [
                        'required' => 'Link Google Maps Tidak Boleh Kosong !',
                        'valid_url_strict' => 'Link Yang Anda Masukan Tidak Valid!'
                    ]
                ],
            ])) {
                $alert = [
                    'error' => [
                        'ukpd_id' => $this->validation->getError('ukpd_id'),
                        'tempat_penyimpanan' => $this->validation->getError('tempat_penyimpanan'),
                        'link_gmaps' => $this->validation->getError('link_gmaps'),
                    ]
                ];
            } else {

                $id = $this->request->getPost('id');
                $ukpd_id = $this->request->getPost('ukpd_id');
                $tempat_penyimpanan = $this->request->getPost('tempat_penyimpanan');
                $link_gmaps = $this->request->getPost('link_gmaps');

                $this->tempatPenyimpananModel->update($id, [
                    'ukpd_id' => strtolower($ukpd_id),
                    'tempat_penyimpanan' => strtolower($tempat_penyimpanan),
                    'link_gmaps' => strtolower($link_gmaps),

                ]);

                $alert = [
                    'success' => 'Tempat Penyimpanan Berhasil di Ubah !'
                ];
            }

            return json_encode($alert);
        }
    }
}
