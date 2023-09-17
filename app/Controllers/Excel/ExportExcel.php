<?php

namespace App\Controllers\Excel;

use App\Controllers\BaseController;
use App\Models\Admin\DataPenindakanModel;
use App\Models\Admin\OcpModel;
use \PhpOffice\PhpSpreadsheet\Spreadsheet;

use \PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class ExportExcel extends BaseController
{

    protected $dataPenindakanModel;
    protected $ocpModel;

    public function __construct()
    {
        $this->dataPenindakanModel = new DataPenindakanModel();
        $this->ocpModel = new OcpModel();
    }

    public function index()
    {
        $spreadSheet = new Spreadsheet();
        // if ($this->request->getVar('/admin/data_penindakan/detail_terbayar')) {
        //     $data_penindakan = $this->dataPenindakanModel->totalPenderekanTerbayarDetail();
        // } else if ($this->request->getVar('/detail_belum_terbayar')) {
        //     $data_penindakan =  $this->dataPenindakanModel->totalPenderekanBelumTerbayarDetail();
        // } else if ($this->request->getVar('/detail_selesai')) {
        //     $data_penindakan = $this->dataPenindakanModel->totalPenderekanSelesai();
        // } else {
        $data_penindakan = $this->dataPenindakanModel->getDataPenindakan();
        // dd($data_penindakan);


        $sheet = $spreadSheet->getActiveSheet();

        $sheet->setCellValue('A1', 'DATA PENINDAKAN PARKIR BUKAN PADA TEMPATNYA !');
        $sheet->mergeCells('A1:S1');
        $sheet->getStyle('A1')->getFont()->setBold(true);

        $styleArray = [
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'top' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'bottom' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'left' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'right' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];

        $border = [
            'borders' => [
                'top' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'bottom' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'left' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'right' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];

        $sheet->setCellValue('A2', 'No');
        $sheet->setCellValue('B2', 'UKPD');
        $sheet->setCellValue('C2', 'Jenis Penindakan');
        $sheet->setCellValue('D2', 'Nomor BAP ');
        $sheet->setCellValue('E2', 'Unit / Regu');
        $sheet->setCellValue('F2', 'Jenis Kendaraan');
        $sheet->setCellValue('G2', 'Type Kendaraan');
        $sheet->setCellValue('H2', 'Merk Kendaraan');
        $sheet->setCellValue('I2', 'Nomor Kendaraan');
        $sheet->setCellValue('J2', 'Warna Kendaraan');
        $sheet->setCellValue('K2', 'Kota');
        $sheet->setCellValue('L2', 'Kecamtan');
        $sheet->setCellValue('M2', 'Nama Jalan');
        $sheet->setCellValue('N2', 'Nama Gedung');
        $sheet->setCellValue('O2', 'Jenis Pelanggaran');
        $sheet->setCellValue('P2', 'Tanggal Pelanggaran');
        $sheet->setCellValue('Q2', 'Jam Pelanggaran');
        $sheet->setCellValue('R2', 'Kartu Identitas');
        $sheet->setCellValue('S2', 'Nomor Identitas');
        $sheet->setCellValue('T2', 'Nama Pengemudi');
        $sheet->setCellValue('U2', 'Alamat Pengemudi');
        $sheet->setCellValue('V2', 'Status');

        $sheet->getStyle("A1")->applyFromArray($styleArray);
        $sheet->getStyle("A2")->applyFromArray($styleArray);
        $sheet->getStyle("B2")->applyFromArray($styleArray);
        $sheet->getStyle("C2")->applyFromArray($styleArray);
        $sheet->getStyle("D2")->applyFromArray($styleArray);
        $sheet->getStyle("E2")->applyFromArray($styleArray);
        $sheet->getStyle("F2")->applyFromArray($styleArray);
        $sheet->getStyle("G2")->applyFromArray($styleArray);
        $sheet->getStyle("H2")->applyFromArray($styleArray);
        $sheet->getStyle("I2")->applyFromArray($styleArray);
        $sheet->getStyle("J2")->applyFromArray($styleArray);
        $sheet->getStyle("K2")->applyFromArray($styleArray);
        $sheet->getStyle("L2")->applyFromArray($styleArray);
        $sheet->getStyle("M2")->applyFromArray($styleArray);
        $sheet->getStyle("N2")->applyFromArray($styleArray);
        $sheet->getStyle("O2")->applyFromArray($styleArray);
        $sheet->getStyle("P2")->applyFromArray($styleArray);
        $sheet->getStyle("Q2")->applyFromArray($styleArray);
        $sheet->getStyle("R2")->applyFromArray($styleArray);
        $sheet->getStyle("S2")->applyFromArray($styleArray);
        $sheet->getStyle("T2")->applyFromArray($styleArray);
        $sheet->getStyle("U2")->applyFromArray($styleArray);
        $sheet->getStyle("V2")->applyFromArray($styleArray);

        $no = 1;
        $numRow = 3;

        foreach ($data_penindakan as $data) :
            $sheet->setCellValue('A' . $numRow, $no);
            $sheet->setCellValue('B' . $numRow, $data->ukpd);
            $sheet->setCellValue('C' . $numRow, $data->jenis_penindakan);
            $sheet->setCellValue('D' . $numRow, $data->nomor_bap);
            $sheet->setCellValue('E' . $numRow, $data->unit_regu);
            $sheet->setCellValue('F' . $numRow, $data->jenis_kendaraan);
            $sheet->setCellValue('G' . $numRow, $data->type_kendaraan);
            $sheet->setCellValue('H' . $numRow, $data->merk_kendaraan);
            $sheet->setCellValue('I' . $numRow, $data->nomor_kendaraan);
            $sheet->setCellValue('J' . $numRow, $data->warna_kendaraan);
            $sheet->setCellValue('K' . $numRow, $data->kabupaten_kota);
            $sheet->setCellValue('L' . $numRow, $data->kecamatan);
            $sheet->setCellValue('M' . $numRow, $data->nama_jalan);
            $sheet->setCellValue('N' . $numRow, $data->nama_gedung);
            $sheet->setCellValue('O' . $numRow, $data->jenis_pelanggaran);
            $sheet->setCellValue('P' . $numRow, $data->tanggal_pelanggaran);
            $sheet->setCellValue('Q' . $numRow, $data->jam_pelanggaran);
            $sheet->setCellValue('R' . $numRow, $data->kartu_identitas);
            $sheet->setCellValue('S' . $numRow, $data->nomor_identitas);
            $sheet->setCellValue('T' . $numRow, $data->nama_pengemudi);
            $sheet->setCellValue('U' . $numRow, $data->alamat_pengemudi);
            $sheet->setCellValue('V' . $numRow, $data->status_penderekan);

            $sheet->getStyle('A' . $numRow)->applyFromArray($border);
            $sheet->getStyle('A' . $numRow)->applyFromArray($styleArray);
            $sheet->getStyle('B' . $numRow)->applyFromArray($border);
            $sheet->getStyle('C' . $numRow)->applyFromArray($border);
            $sheet->getStyle('D' . $numRow)->applyFromArray($border);
            $sheet->getStyle('E' . $numRow)->applyFromArray($border);
            $sheet->getStyle('F' . $numRow)->applyFromArray($border);
            $sheet->getStyle('G' . $numRow)->applyFromArray($border);
            $sheet->getStyle('H' . $numRow)->applyFromArray($border);
            $sheet->getStyle('I' . $numRow)->applyFromArray($border);
            $sheet->getStyle('J' . $numRow)->applyFromArray($border);
            $sheet->getStyle('K' . $numRow)->applyFromArray($border);
            $sheet->getStyle('L' . $numRow)->applyFromArray($border);
            $sheet->getStyle('M' . $numRow)->applyFromArray($border);
            $sheet->getStyle('N' . $numRow)->applyFromArray($border);
            $sheet->getStyle('O' . $numRow)->applyFromArray($border);
            $sheet->getStyle('P' . $numRow)->applyFromArray($border);
            $sheet->getStyle('Q' . $numRow)->applyFromArray($border);
            $sheet->getStyle('R' . $numRow)->applyFromArray($border);
            $sheet->getStyle('S' . $numRow)->applyFromArray($border);
            $sheet->getStyle('T' . $numRow)->applyFromArray($border);
            $sheet->getStyle('U' . $numRow)->applyFromArray($border);
            $sheet->getStyle('V' . $numRow)->applyFromArray($border);

            $no++;
            $numRow++;
        endforeach;

        $sheet->getDefaultRowDimension()->setRowHeight(-1);
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Data Penindakan.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadSheet);

        $writer->save('php://output');
    }
}
