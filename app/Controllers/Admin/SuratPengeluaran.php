<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\BAPModel;
use App\Models\Admin\DataPenindakanModel;
use App\Models\Admin\JenisSPKModel;
use App\Models\Admin\SuratPengeluaranModel;

class SuratPengeluaran extends BaseController
{
    protected $suratPengeluaranModel;
    protected $jenisSPKModel;
    protected $dataPenindakanModel;
    protected $bapModel;
    protected $validation;

    public function __construct()
    {
        $this->suratPengeluaranModel = new SuratPengeluaranModel();
        $this->jenisSPKModel = new JenisSPKModel();
        $this->dataPenindakanModel = new DataPenindakanModel();
        $this->bapModel = new BAPModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $data = [
            'surat_pengeluaran' => $this->suratPengeluaranModel->getSPK(),
            'title' => 'Surat Pengeluaran Kendaraan',
            'jenis_spk' => $this->jenisSPKModel->getJenisSPK(),
            'data_penindakan' => $this->dataPenindakanModel->getDataPenindakanStatusBAPTerbayar()
        ];

        return view('admin/surat_pengeluaran', $data);
    }

    public function insert()
    {
        if ($this->request->isAJAX()) {
            if (!$this->validate([
                'bap_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nomor Kendaraan Tidak Boleh Kosong !'
                    ]
                ],
                'jenis_spk_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jenis SPK Tidak Boleh Kosong !'
                    ]
                ],
                'nomor_surat' => [
                    'rules' => 'uploaded[nomor_surat]|ext_in[nomor_surat,pdf]|max_size[nomor_surat,2048]',
                    'errors' => [
                        'uploaded' => 'SPK Tidak Boleh Kosong!',
                        'ext_in' => 'Yang Anda Upload Bukan PDF!',
                        'max_size' => 'Ukuran File Terlalu Besar',
                    ]
                ],
            ])) {
                $alert = [
                    'error' => [
                        'bap_id' => $this->validation->getError('bap_id'),
                        'jenis_spk_id' => $this->validation->getError('jenis_spk_id'),
                        'nomor_surat' => $this->validation->getError('nomor_surat'),
                    ]
                ];
            } else {
                $bap_id = $this->request->getVar('bap_id');
                $jenis_spk_id = $this->request->getVar('jenis_spk_id');
                $nomor_surat = $this->request->getFile('nomor_surat');

                $spk = $nomor_surat->getRandomName();
                // dd($nomor_surat);

                $this->suratPengeluaranModel->save([
                    'bap_id' => $bap_id,
                    'jenis_spk_id' => $jenis_spk_id,
                    'nomor_surat' => $spk
                ]);

                $noBap = $this->bapModel->where(["id" => $bap_id])->get()->getRowObject();

                if ($jenis_spk_id == 1) {
                    $this->bapModel->update($noBap->id, [
                        'id' => $noBap->id,
                        'status_bap_id' => 5
                    ]);
                } else {
                    $this->bapModel->update($noBap->id, [
                        'id' => $noBap->id,
                        'status_bap_id' => 4
                    ]);
                }

                $nomor_surat->move('spk', $spk);

                $alert = [
                    'success' => 'Status Kendaraan Berahasil di Ubah'
                ];
            }

            return json_encode($alert);
        }
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $spk = $this->suratPengeluaranModel->where(["id" => $id])->first();

            $data = [
                'spk' => $spk,
                'jenis_spk' => $this->jenisSPKModel->getJenisSPK()
            ];

            return json_encode($data);
        }
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $surat_pengeluaran = $this->suratPengeluaranModel->where(["id" => $id])->first();

            $path_spk = 'spk/' . $surat_pengeluaran["nomor_surat"];

            if ($path_spk != null) {
                if (file_exists($path_spk)) {
                    unlink($path_spk);
                }
            }

            $this->suratPengeluaranModel->delete($surat_pengeluaran["id"]);

            $noBap = $this->bapModel->where(["id" =>  $surat_pengeluaran["bap_id"]])->get()->getRowObject();

            $this->bapModel->update($noBap->id, [
                'id' => $noBap->id,
                'status_bap_id' => 3
            ]);

            $alert = [
                'success' => 'Surat Pengeluaran Berhasil di Hapus !'
            ];

            return json_encode($alert);
        }
    }

    public function update()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([

                'jenis_spk_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jenis SPK Tidak Boleh Kosong !'
                    ]
                ],

            ])) {
                $alert = [
                    'error' => [
                        'jenis_spk_id' => $this->validation->getError('jenis_spk_id'),
                    ]
                ];
            } else {
                $id = $this->request->getVar('id');
                $spk_lama = $this->request->getVar('spk_lama');
                $jenis_spk_id = $this->request->getVar('jenis_spk_id');
                $nomor_surat = $this->request->getFile('nomor_surat');

                if ($nomor_surat->getError() == 4) {
                    $namaFile = $spk_lama;
                } else {
                    $namaFile = $nomor_surat->getRandomName();
                    $nomor_surat->move('spk', $namaFile);
                    $spk = 'spk/' . $spk_lama;

                    if ($spk != null) {
                        unlink($spk);
                    }
                }

                $spk = $this->suratPengeluaranModel->where(["id" => $id])->first();

                $this->suratPengeluaranModel->update($spk["id"], [
                    'id' => $spk["id"],
                    'bap_id' => $spk["bap_id"],
                    'jenis_spk_id' => $jenis_spk_id,
                    'nomor_surat' => $namaFile
                ]);

                $noBap = $this->bapModel->where(["id" => $spk["bap_id"]])->get()->getRowObject();

                if ($jenis_spk_id == 1) {
                    $this->bapModel->update($noBap->id, [
                        'id' => $noBap->id,
                        'status_bap_id' => 5
                    ]);
                } else {
                    $this->bapModel->update($noBap->id, [
                        'id' => $noBap->id,
                        'status_bap_id' => 4
                    ]);
                }

                $alert = [
                    'success' => 'SPK Berhasil di Ubah !'
                ];
            }

            return json_encode($alert);
        }
    }
}
