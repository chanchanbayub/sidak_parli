<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\AngkutMotorModel;
use App\Models\Admin\DataPenindakanModel;
use App\Models\Admin\OcpModel;
use App\Models\Admin\PetugasModel;
use App\Models\Admin\UkpdModel;
use App\Models\Admin\UnitReguModel;

class Dashboard extends BaseController
{
    protected $petugasModel;
    protected $dataPenindakanModel;
    protected $unitReguModel;
    protected $ukpdModel;
    protected $angkutMotorModel;
    protected $ocpModel;


    public function __construct()
    {
        $this->petugasModel = new PetugasModel();
        $this->dataPenindakanModel = new DataPenindakanModel();
        $this->unitReguModel = new UnitReguModel();
        $this->ukpdModel = new UkpdModel();
        $this->angkutMotorModel = new AngkutMotorModel();
        $this->ocpModel = new OcpModel();
        helper(["format"]);
    }

    public function index()
    {
        $date = date('Y-m-d');

        $totalPenderekanTerbayarDetailPerhari = $this->dataPenindakanModel->totalPenderekanTerbayarDetailPerhari($date, "");

        $jumlah_perhari = count($totalPenderekanTerbayarDetailPerhari);

        $totalPenderekanBelumTerbayarDetailPerhari = $this->dataPenindakanModel->totalPenderekanBelumTerbayarDetailPerhari($date, "");
        $total_belum_terbayar_perhari = count($totalPenderekanBelumTerbayarDetailPerhari);

        $totalPenderekanSelesaiPerhari = $this->dataPenindakanModel->totalPenderekanSelesaiPerhari($date, "");
        $total_selesai_perhari = count($totalPenderekanSelesaiPerhari);

        $totalPenderekanPerhari = $this->dataPenindakanModel->totalPenderekanPerhari($date, "");


        // Laporan Keseluruhan
        $totalPenderekanTerbayarDetail = $this->dataPenindakanModel->totalPenderekanTerbayarDetail("");
        $jumlah = count($totalPenderekanTerbayarDetail);

        $totalPenderekanBelumTerbayarDetail = $this->dataPenindakanModel->totalPenderekanBelumTerbayarDetail("");
        $total_belum_terbayar = count($totalPenderekanBelumTerbayarDetail);

        $totalPenderekanSelesai = $this->dataPenindakanModel->totalPenderekanSelesai("");
        $total_selesai = count($totalPenderekanSelesai);

        $totalPenderekan = $this->dataPenindakanModel->totalPenderekan("");

        // laporan angkut motor keseluruhan
        $jumlah_angkut_motor = $this->angkutMotorModel->countAllResults();
        $jumlah_ocp_roda_2 = $this->ocpModel->where(["jenis_penindakan_id" => 2])->countAllResults();
        $jumlah_ocp_roda_3 = $this->ocpModel->where(["jenis_penindakan_id" => 3])->countAllResults();
        $jumlah_ocp_roda_4 = $this->ocpModel->where(["jenis_penindakan_id" => 4])->countAllResults();


        $data = [
            'title' => 'SIDAK PARLI DASHBOARD',
            'ukpd' => $this->ukpdModel->getUKPD(),
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
            'jumlah_selesai_perhari' => $total_selesai_perhari,

            // angkut motor
            'jumlah_angkut_motor' => $jumlah_angkut_motor,

            'jumlah_ocp_roda_2' => $jumlah_ocp_roda_2,
            'jumlah_ocp_roda_3' => $jumlah_ocp_roda_3,
            'jumlah_ocp_roda_4' => $jumlah_ocp_roda_4,
        ];
        return view('admin/dashboard', $data);
    }

    public function filterPenderekan()
    {

        if ($this->request->isAJAX()) {

            $ukpd = $this->request->getVar('ukpd_id');
            $date = date('Y-m-d');

            $totalPenderekanTerbayarDetailPerhari = $this->dataPenindakanModel->totalPenderekanTerbayarDetailPerhari($date, $ukpd);
            $jumlah_perhari = count($totalPenderekanTerbayarDetailPerhari);

            $totalPenderekanBelumTerbayarDetailPerhari = $this->dataPenindakanModel->totalPenderekanBelumTerbayarDetailPerhari($date, $ukpd);
            $total_belum_terbayar_perhari = count($totalPenderekanBelumTerbayarDetailPerhari);

            $totalPenderekanSelesaiPerhari = $this->dataPenindakanModel->totalPenderekanSelesaiPerhari($date, $ukpd);
            $total_selesai_perhari = count($totalPenderekanSelesaiPerhari);

            $totalPenderekanPerhari = $this->dataPenindakanModel->totalPenderekanPerhari($date, $ukpd);


            // Laporan Keseluruhan
            $totalPenderekanTerbayarDetail = $this->dataPenindakanModel->totalPenderekanTerbayarDetail($ukpd);
            $jumlah = count($totalPenderekanTerbayarDetail);

            $totalPenderekanBelumTerbayarDetail = $this->dataPenindakanModel->totalPenderekanBelumTerbayarDetail($ukpd);
            $total_belum_terbayar = count($totalPenderekanBelumTerbayarDetail);

            $totalPenderekanSelesai = $this->dataPenindakanModel->totalPenderekanSelesai($ukpd);
            $total_selesai = count($totalPenderekanSelesai);

            $totalPenderekan = $this->dataPenindakanModel->totalPenderekan($ukpd);

            $jumlah_unit = $this->unitReguModel->getUnitWhereUKPD($ukpd);

            $data = [

                'ukpd' => $this->ukpdModel->where(["id" => $ukpd])->first(),
                'jumlah_unit'  => count($jumlah_unit),
                'laporan_harian' => 'Laporan Harian ' . $ukpd,

                'jumlah_penderekan' => $totalPenderekan,
                'jumlah_penderekan_terbayar' => $jumlah,
                'jumlah_penderekan_belum_terbayar' => $total_belum_terbayar,
                'jumlah_penderekan_selesai' => $total_selesai,
                // 'detail_terbayar' => $totalPenderekanTerbayarDetail,

                // harian
                'total_penderekan_perhari' => $totalPenderekanPerhari,
                'jumlah_terbayar_perhari' => $jumlah_perhari,
                'jumlah_belum_bayar_perhari' => $total_belum_terbayar_perhari,
                'jumlah_selesai_perhari' => $total_selesai_perhari
            ];

            return json_encode($data);
        }
    }
}
