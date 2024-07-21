<?php

namespace App\Controllers\Pdf;

use App\Controllers\BaseController;
use App\Models\Admin\DataPenindakanModel;
use App\Models\Admin\PetugasModel;

class Pdf extends BaseController
{
    protected $mpdf;
    protected $dataPenindakanModel;
    protected $petugasModel;

    public function __construct()
    {
        $this->mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [210, 330]]);
        $this->dataPenindakanModel = new DataPenindakanModel();
        $this->petugasModel = new PetugasModel();
    }

    public function index($nomor_bap)
    {
        $this->mpdf->showImageErrors = true;
        $data_penindakan = $this->dataPenindakanModel->getDataPenindakanWithNomorBAP($nomor_bap);

        // dd($data_penindakan);

        $ppns = $this->petugasModel->getDataPPNSBAP($data_penindakan->ppns_id);

        helper(['format']);

        $data = [
            'data' =>  $data_penindakan,
            'ppns' => $ppns
        ];

        $html = view('pdf/bap-digital', $data);
        $this->mpdf->WriteHTML($html);

        $this->response->setHeader('Content-Type', 'application/pdf');;
        $this->mpdf->output('BAP_' . $data_penindakan->nomor_kendaraan . '.pdf', 'I');
    }
}
