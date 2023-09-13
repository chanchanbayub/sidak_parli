<?php

namespace App\Controllers\Wr;

use App\Controllers\BaseController;
use App\Models\Petugas\DataPenindakanModel;

class LandingPage extends BaseController
{
    protected $dataPenindakan;
    protected $validaton;

    public function __construct()
    {
        $this->dataPenindakan = new DataPenindakanModel();
        $this->validaton = \Config\Services::validation();
    }

    public function index()
    {
        $data = [
            'title' => 'SIDAK PARLI ',
        ];

        return view('public_user/landing_page', $data);
    }

    public function search()
    {
        if ($this->request->isAJAX()) {
            if (!$this->validate([
                'nomor_kendaraan' => [
                    'rules' => 'required',
                    'errors' =>  [
                        'required' => 'Nomor Kendaraan Tidak Boleh Kosong!'
                    ]
                ]
            ])) {
                $alert = [
                    'error' => [
                        'nomor_kendaraan' => $this->validaton->getError('nomor_kendaraan'),
                    ],
                ];
            } else {
                $nomor_kendaraan = $this->request->getVar('nomor_kendaraan');

                $data_penindakan = $this->dataPenindakan->getDataPenindakanWithNoKendaraan($nomor_kendaraan);


                if ($data_penindakan == null) {

                    $alert = [
                        'error' => [
                            'nomor_kendaraan' => 'Nomor Kendaraan Tidak di Temukan!'
                        ],
                    ];
                } else {
                    $alert = [
                        'data_penindakan' => $data_penindakan
                    ];
                }
            }

            return json_encode($alert);
        }
    }
}
