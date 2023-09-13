<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\DataPenindakanModel;
use App\Models\Admin\PetugasModel;
use App\Models\Admin\UnitReguModel;

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
    }

    public function index()
    {
        $date = date('Y-m-d');

        $totalPenderekanTerbayarDetailPerhari = $this->dataPenindakanModel->totalPenderekanTerbayarDetailPerhari($date);
        $jumlah_perhari = count($totalPenderekanTerbayarDetailPerhari);

        $totalPenderekanBelumTerbayarDetailPerhari = $this->dataPenindakanModel->totalPenderekanBelumTerbayarDetailPerhari($date);
        $total_belum_terbayar_perhari = count($totalPenderekanBelumTerbayarDetailPerhari);

        $totalPenderekanSelesaiPerhari = $this->dataPenindakanModel->totalPenderekanSelesaiPerhari($date);
        $total_selesai_perhari = count($totalPenderekanSelesaiPerhari);

        $totalPenderekanPerhari = $this->dataPenindakanModel->totalPenderekanPerhari($date);


        // Laporan Keseluruhan
        $totalPenderekanTerbayarDetail = $this->dataPenindakanModel->totalPenderekanTerbayarDetail();
        $jumlah = count($totalPenderekanTerbayarDetail);

        $totalPenderekanBelumTerbayarDetail = $this->dataPenindakanModel->totalPenderekanBelumTerbayarDetail();
        $total_belum_terbayar = count($totalPenderekanBelumTerbayarDetail);

        $totalPenderekanSelesai = $this->dataPenindakanModel->totalPenderekanSelesai();
        $total_selesai = count($totalPenderekanSelesai);

        $totalPenderekan = $this->dataPenindakanModel->totalPenderekan();

        $data = [
            'title' => 'SIDAK PARLI DASHBOARD',
            'jumlah_unit'  => $this->unitReguModel->countAllResults(),
            'jumlah_penderekan' => $totalPenderekan,
            'jumlah_penderekan_terbayar' => $jumlah,
            'jumlah_penderekan_belum_terbayar' => $total_belum_terbayar,
            'jumlah_penderekan_selesai' => $total_selesai,
            'detail_terbayar' => $totalPenderekanTerbayarDetail,

            // harian
            'total_penderekan_perhari' => $totalPenderekanPerhari,
            'jumlah_terbayar_perhari' => $jumlah_perhari,
            'jumlah_belum_bayar_perhari' => $total_belum_terbayar_perhari,
            'jumlah_selesai_perhari' => $total_selesai_perhari
        ];
        return view('admin/dashboard', $data);
    }
}
