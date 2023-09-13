<?php

use CodeIgniter\Filters\CSRF;
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="SIDAK PARLI">
    <meta name="author" content="DINAS PERHUBUNGAN DKI JAKARTA">
    <meta name="keywords" content="DINAS PERHUBUNGAN">

    <title><?= $title ?></title>

    <!-- Custom fonts for this template-->
    <link href="/assets2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.min.css">

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.min.css"> -->

    <!-- Custom styles for this template-->
    <link href="/assets2/css/sb-admin-2.css" rel="stylesheet">
    <link rel="shortcut icon" href="/assets/img/sidak_parli2.png" type="image/png">

</head>

<body class="bg-gradient-image">

    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7 pt-20">
                        <div class="p-5">
                            <div class="text-center">
                                <!-- <img src="/assets2/img/logo_sidak2.png" alt="Logo dishub" class="rounded mx-auto d-block img-fluid" width="500px"> -->
                                <h5 class="h5 font-weight-bold">SISTEM INFORMASI DATA HASIL PENINDAKAN PARKIR LIAR DINAS PERHUBUNGAN PROVINSI DKI JAKARTA</h5>
                            </div>
                            <br>
                            <h6 class="h4 font-weight-bold mb-4 "> Cek Status <br> Kendaraan Anda </h6>
                            <form class="getKendaraan" autocomplete="off">
                                <?= CSRF_FIELD(); ?>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" style="text-transform:uppercase ;" id="search" name="search" placeholder="Masukan Nomor Kendaraan">
                                    <span class="small"> Contoh : B 1234 XX</span>
                                </div>

                                <button type="submit" class="btn btn-primary btn-user btn-block search">
                                    <i class="fa fa-search"></i> Cari Kendaraan
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <span class="small"> <a href="/auth/login"> SIDAK PARLI &copy; <?= date('Y') ?> </a></span>
                            </div>
                            <div class="text-center">
                                <span class="small">Dinas Perhubungan Provinsi DKI Jakarta</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title fs-5" id="title">KENDARAAN ANDA DI</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <p id="nomor_kendaraan">Nomor Kendaraan : <span class="nomor_kendaraan"></span> </p>
                            </div>

                            <div class="col-md-4 ml-auto">
                                <p id="status_kendaraan">Status : <span class="status"></span></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p id="jenis_pelanggaran">Jenis Pelanggaran : <span class="jenis_pelanggaran"></span> </p>
                            </div>

                            <div class="col-md-4 ml-auto">
                                <p id="lokasi_pelanggaran">Lokasi Penindakan : <span class="lokasi_pelanggaran"></span></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p id="tanggal_pelanggaran">Tanggal Penindakan : <span class="tanggal_pelanggaran"></span> </p>
                            </div>

                            <div class="col-md-4 ml-auto">
                                <p id="jam_pelanggaran">Jam Penindakan : <span class="jam_pelanggaran"></span></p>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p id="maps_lokasi">Tempat Penyimpanan Kendaraan : <a href="https://goo.gl/maps/DPPnRATpuFLpvhet8" id="lokasi" target="_blank" rel="noopener noreferrer">Lihat Lokasi</a> </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <img src="" class="img-fluid img-thumbnail" id="foto_penindakan_1" alt="Responsive image">
                            </div>
                            <div class="col-md-6">
                                <img src="" class="img-fluid img-thumbnail" id="foto_penindakan_2" alt="Responsive image">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-times"></i> Close</button>
                    <a class="btn btn-success" href="" target="_blank" id="whatsapp"> <i class="fab fa-whatsapp"></i> Ajukan Pengeluaran</a>
                    <a href="" class="btn btn-primary" target="_blank" id="download"> <i class="fa fa-download"></i> Download BAP</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="/assets2/vendor/jquery/jquery.min.js"></script>

    <script src="/assets2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="/assets2/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="/assets2/js/sb-admin-2.min.js"></script>

    <script>
        $(".getKendaraan").submit(function(e) {
            e.preventDefault();

            let nomor_kendaraan = $("#search").val();

            $.ajax({
                url: '/search',
                method: 'get',
                dataType: 'JSON',
                data: {
                    nomor_kendaraan: nomor_kendaraan,
                },
                beforeSend: function() {
                    $('.btn-user').html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>Loading...");
                    $(".btn-user").prop('disabled', true);
                },
                success: function(response) {
                    // console.log(response);
                    $('.btn-user').html("<i class='fa fa-search'></i> Cari Kendaraan");
                    $(".btn-user").prop('disabled', false);
                    if (response.error) {
                        if (response.error.nomor_kendaraan) {
                            Swal.fire({
                                icon: 'error',
                                title: `${response.error.nomor_kendaraan}`
                            });
                        }
                    } else {
                        $("#modal-data").modal('show');
                        $(".nomor_kendaraan").html(response.data_penindakan.nomor_kendaraan);
                        $(".nomor_kendaraan").css("text-transform", 'uppercase');

                        $("#search").val('');

                        if (response.data_penindakan.status_bap_id == 2) {
                            $(".status").addClass("badge badge-warning status")
                            $("#download").css('display', 'none')
                        } else if (response.data_penindakan.status_bap_id == 3) {
                            $("#download").css('display', 'block')
                            $("#download").html('<i class="fa fa-download"> Download BAP');
                            $("#download").attr('href', `/pdf/bap_digital/${response.data_penindakan.nomor_bap}`);
                            $(".status").addClass("badge badge-danger status")
                        } else if (response.data_penindakan.status_bap_id == 4 || response.data_penindakan.status_bap_id == 5) {
                            $(".status").addClass("badge badge-success status")
                            $("#download").css('display', 'block');
                            $("#download").attr('href', `/spk/${response.data_penindakan.nomor_surat}`);
                            $("#download").html('<i class="fa fa-download"> Download SPK');
                        }
                        $(".status").html(response.data_penindakan.status_penderekan);
                        $(".status").css("text-transform", 'capitalize');
                        $(".jenis_pelanggaran").html(response.data_penindakan.jenis_pelanggaran);
                        $(".jenis_pelanggaran").css("text-transform", 'capitalize');
                        $(".lokasi_pelanggaran").html(response.data_penindakan.nama_jalan);
                        $(".lokasi_pelanggaran").css("text-transform", 'capitalize');
                        $(".tanggal_pelanggaran").html(response.data_penindakan.tanggal_pelanggaran);
                        $(".tanggal_pelanggaran").css("text-transform", 'capitalize');
                        $(".jam_pelanggaran").html(response.data_penindakan.jam_pelanggaran);
                        $(".jam_pelanggaran").css("text-transform", 'capitalize');
                        $("#foto_penindakan_1").attr('src', `/data_penindakan/${response.data_penindakan.foto_penindakan_1}`)
                        $("#foto_penindakan_2").attr('src', `/data_penindakan/${response.data_penindakan.foto_penindakan_2}`)

                        if (response.data_penindakan.jenis_penindakan_id == 1) {
                            $("#title").html('KENDARAAN ANDA DI DEREK !')
                        } else {
                            $("#title").html('KENDARAAN ANDA DI ANGKUT MOTOR !')
                        }


                        $("#whatsapp").attr('href', `https://api.whatsapp.com/send?phone=6285799200900&text=PARKIR%20${response.data_penindakan.nomor_kendaraan}%20${response.data_penindakan.nama_jalan}`);
                    }
                },
                error: function(response) {
                    alert('server error');
                    $('.btn-user').html("<i class='fa fa-search'></i> Cari Kendaraan");
                    $(".btn-user").prop('disabled', false);
                }
            });
        })
    </script>

</body>

</html>