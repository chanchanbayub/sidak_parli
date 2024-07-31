<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SURAT PENGELUARAN KENDARAAN PENDEREKAN</title>
    <link rel="shortcut icon" href="assets/img/logo2.png" type="image/png">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            position: relative;
            box-sizing: border-box;
        }

        header {
            width: 100%;
            margin: 0 auto;
        }

        #kopSurat {
            width: 100%;
            margin: 0 auto;
            border-collapse: collapse;
            margin-bottom: -15px;
        }

        .logo {
            width: 75px;
        }

        #p1 {
            font-size: 18px;
            text-transform: uppercase;
            line-height: 15px;
            letter-spacing: 0px;
            font-style: normal;
        }

        #p2 {
            font-size: 24px;
            text-transform: uppercase;
            line-height: 15px;
            letter-spacing: 1px;
            font-weight: 900;
        }

        #p3 {
            font-size: 14px;
            line-height: 15px;
            text-transform: uppercase;
        }

        #p4 {
            font-size: 14px;
            line-height: 15px;
            text-transform: uppercase;
            font-style: normal;
        }

        #p5 {
            font-size: 12px;
            text-transform: capitalize;
            vertical-align: top;
            padding-right: 40px;
            padding-bottom: 5px;
        }

        p {
            font-style: normal;
        }

        hr {
            height: 2px;
            color: black;
        }

        .ttd {
            text-align: center;
            box-sizing: border-box;
        }

        #noSuratKend {
            margin: 0 auto;
            width: 100%;
            font-size: 14px;
            text-align: left;
        }

        #noSuratKend td {
            vertical-align: top;
        }

        .content-table {
            /* margin: 0 100px; */
            margin-left: 100px;
            width: 100%;
            text-align: justify;
        }

        .content-table td {
            padding: 5px 0;
        }

        .content-table td,
        p {
            line-height: 23px;
        }

        #data {
            width: 100%;
            margin-left: 100px;
        }

        /* #data tr {
            padding: 3px 0;
        } */

        #data td {
            line-height: 23px;
        }

        .table-footer {
            margin: 0 auto;
            width: 100%;
            box-sizing: border-box;
            position: relative;
        }

        .output {
            color: black;
            text-transform: capitalize;
        }

        .ttd_digital {
            width: 100px;
        }

        .ttd_cap {
            box-sizing: border-box;
            width: 180px;
            /* height: 0px; */
        }
    </style>
</head>

<body>
    <header>
        <table id="kopSurat">
            <tr>
                <td>
                    <img class="logo" src="assets/img/logo.png" alt="logo" />
                </td>
                <td align="center">
                    <p id="p1"> pemerintah daerah khusus ibu kota jakarta</p>
                    <p id="p2"> dinas perhubungan</p>
                    <p id="p3"> <?= $data->nama_dinas ?></p>
                    <p id="p4">Provinsi DKI Jakarta</p>
                    <p id="p4">J A K A R T A</p>
                </td>
                <td>
                    <img class="logo" src="assets/img/logo2.png" alt="logo" />
                </td>
            </tr>
            <tr>
                <td colspan="3" align="right" id="p5">
                    Kode Pos : 10150
                </td>
            </tr>
        </table>
    </header>
    <hr>
    <div>
        <table id="noSuratKend">
            <tr>
                <td style="width:13%"> Nomor</td>
                <td style="width: 2%;">:</td>
                <td>
                    <p> <?= $data->ukpd ?> / 073.554 </p>
                </td>
                <td colspan="11" align="right">
                    <p id="date"> &nbsp; <?= date_indo(date('Y-m-d', strtotime($data->tanggal_pelanggaran))) ?> </p>
                </td>
                <td colspan="3">&nbsp;</td>

            </tr>
            <tr>
                <td style="width:13%"> Sifat</td>
                <td style="width: 2%;">:</td>
                <td></td>
                <td colspan="14"></td>
            </tr>
            <tr>
                <td style="width:13%"> Lampiran</td>
                <td style="width: 2%;">:</td>
                <td colspan="15"></td>
            </tr>
            <tr>
                <td style="width:13%"> Hal</td>
                <td style="width: 2%;">:</td>
                <td style="width: 35%;">Pengeluaran Kendaraan</td>
                <td style="width: 5%">&nbsp;</td>
                <td colspan="13" style="padding-left: 60px;">Kepada</td>
            </tr>
            <tr>
                <td style="width:13%"></td>
                <td style="width: 2%;"></td>
                <td style="width: 35%;"></td>
                <td style="width: 7%;" style="text-align: right;">Yth.</td>
                <td colspan="20" style="padding-left: 60px;">Koordinator Penderekan <br> Bidang Pengendalian Operasional Lalu Lintas Dan Angkutan Jalan Provinsi DKI Jakarta </td>
            </tr>
            <tr>
                <td style="width:13%"></td>
                <td style="width: 2%;"></td>
                <td style="width: 35%;"></td>
                <td style="width: 7%;"></td>
                <td colspan="13" style=" padding-left: 60px;">di</td>
            </tr>
            <tr>
                <td style=" width:13%"></td>
                <td style="width: 2%;"></td>
                <td style="width: 35%;"></td>
                <td style="width: 7%;"></td>
                <td colspan="13" style="padding-left: 75px;">J a k a r t a</td>
            </tr>
        </table>

        <table class="content-table">
            <tr>
                <td>
                    <p style="text-align: justify;">Sehubungan dengan pelanggaran yang dilakukan oleh kendaraan :</p>
                </td>
            </tr>
        </table>
        <table id="data">

            <tr>
                <td>Nama Pelanggar / Pengemudi </td>
                <td>:</td>
                <td> <b class="output"> <?= $data->nama_pengemudi ?> </b></td>
            </tr>
            <tr>
                <td>NIK/SIM/PASPOR</td>
                <td>:</td>
                <td> <b class="output"> <?= $data->nomor_identitas ?> </b> </td>
            </tr>
            <tr>
                <td>Jenis Kendaraan </td>
                <td>:</td>
                <td> <b class="output"> <?= $data->jenis_kendaraan ?> </b></td>
            </tr>
            <tr>
                <td>Merek Kendaraan </td>
                <td>:</td>
                <td> <b class="output"><?= $data->merk_kendaraan ?></b></td>
            </tr>
            <tr>
                <td>Warna Kendaraan</td>
                <td>:</td>
                <td> <b class="output"> <?= $data->warna_kendaraan ?> </b></td>
            </tr>
            <tr>
                <td>Nomor Handphone</td>
                <td>:</td>
                <td> <b class="output"> <?= $data->nomor_hp ?> </b></td>
            </tr>
            <tr>
                <td>TNKB</td>
                <td>:</td>
                <td> <b class="output" style="text-transform: uppercase;"> <?= $data->nomor_kendaraan ?> </b></td>
            </tr>
            <tr>
                <td>Jenis Pelanggaran</td>
                <td>:</td>
                <td> <b class="output"> <?= $data->jenis_pelanggaran ?></b></td>
            </tr>
            <tr>
                <td>Hari / Tanggal</td>
                <td>:</td>
                <td> <b class="output"> <?= tanggal_indonesia(date('Y-m-d', strtotime($data->tanggal_pelanggaran))) ?>, <?= date_indo(date('Y-m-d', strtotime($data->tanggal_pelanggaran))) ?></b></td>
            </tr>
        </table>

        <table class="content-table">
            <tr>
                <td>
                    <p> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Bersama ini diberitahukan bahwa kendaraan tersebut diatas dapat dikeluarkan dari Pool Penyimpanan Dinas Perhubungan Provinsi DKI Jakarta, sehubungan yang bersangkutan telah : <br>
                        a. Melengkapi surat - surat kendaraan dimaksud; <br>
                        b. Mengisi Surat Pernyataan Melanggar Pelanggaran Parkir Bukan Pada Tempatnya;
                    </p>
                </td>
            </tr>
        </table>
        <br>
        <table id="ttd">
            <tr>
                <td style="width: 50%;"></td>
                <td></td>
                <td align="center" style="width:75%">Kepala Bidang Pengendalian Operasional</td>
            </tr>
            <tr>
                <td style="width: 50%;"></td>
                <td></td>
                <td align="center" style="width:75%">Lalu Lintas Dan Angkutan Jalan</td>
            </tr>

            <tr>
                <td></td>
                <td></td>
                <td align="center"><img src="ttd_pim/ttd_12.png" width="150px" alt="logo" /></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td align="center">Harlem Simanjuntak</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td align="center">NIP. 197208151992031004</td>
            </tr>
        </table>
        <table id="footer">
            <tr>
                <td>Tembusan :</td>

            </tr>
            <tr>
                <td>
                    1. Kepala Dinas Perhubungan Prov. DKI Jakarta;
                </td>
            </tr>
            <tr>
                <td>
                    2. Wakil Kepala Dinas Perhubungan Prov. DKI Jakarta;
                </td>
            </tr>
            <tr>
                <td>
                    3. Sekretaris Dinas Perhubungan Provinsi Dki Jakarta.
                </td>
            </tr>

        </table>
    </div>
</body>

</html>