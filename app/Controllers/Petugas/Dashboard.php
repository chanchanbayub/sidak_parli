<?php

namespace App\Controllers\Petugas;

use App\Controllers\BaseController;
use App\Models\Admin\PetugasModel;
use App\Models\Admin\UnitReguModel;
use App\Models\Petugas\DataPenindakanModel;

class Dashboard extends BaseController
{
    protected $petugasModel;
    protected $dataPenindakanModel;
    protected $unitReguModel;


    public function __construct()
    {
        $this->petugasModel = new PetugasModel();
        $this->dataPenindakanModel = new DataPenindakanModel();
        $this->unitReguModel = new UnitReguModel();
        helper(["format"]);
    }

    public function index()
    {
        $date = date('Y-m-d');

        $totalPenderekanTerbayarDetail = $this->dataPenindakanModel->totalPenderekanTerbayarDetail($date, session()->get('unit_id'));
        $jumlah = count($totalPenderekanTerbayarDetail);

        $totalPenderekanBelumTerbayarDetail = $this->dataPenindakanModel->totalPenderekanBelumTerbayarDetail($date, session()->get('unit_id'));
        $total_belum_terbayar = count($totalPenderekanBelumTerbayarDetail);

        $totalPenderekanSelesai = $this->dataPenindakanModel->totalPenderekanSelesai($date, session()->get('unit_id'));
        $total_selesai = count($totalPenderekanSelesai);


        $data = [
            'title' => 'SIDAK PARLI DASHBOARD',
            'jumlah_petugas'  => $this->petugasModel->where(["unit_id" => session()->get('unit_id')])->countAllResults(),
            'jumlah_penderekan' => $this->dataPenindakanModel->totalPenderekan($date, session()->get('unit_id')),
            'jumlah_penderekan_terbayar' => $jumlah,
            'jumlah_penderekan_belum_terbayar' => $total_belum_terbayar,
            'jumlah_penderekan_selesai' => $total_selesai,
            // 'jumlah_angkut_motor' => $this->dataPenindakanModel->totalAngkutMotor(),
            'detail_terbayar' => $totalPenderekanTerbayarDetail
        ];
        return view('petugas/dashboard', $data);
    }
}
