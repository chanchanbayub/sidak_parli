<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<main id="main" class="main">

    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">PAGES</li>
                <li class="breadcrumb-item"><a href="/admin/dashboard">DASHBOARD</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <?php if (session()->get('role_id') == 1) : ?>
                <div class="col-md-6">
                    <form id="filter">
                        <?= csrf_field(); ?>
                        <div class="input-group mb-3">
                            <select name="ukpd_id" id="ukpd_id" class="form-control" required>
                                <option value="">Silahkan Pilih</option>
                                <?php foreach ($ukpd as $data) : ?>
                                    <option value="<?= $data->id ?>"> <?= $data->nama_dinas ?></option>
                                <?php endforeach; ?>
                            </select>
                            <button type="submit" class="btn btn-outline-primary send">Filter</button>
                        </div>
                    </form>
                </div>
            <?php endif; ?>


            <div class="col-lg-12">
                <h5 class="card-title text-capitalize title_data"> laporan harian penderekan </h5>
                <div class="row">
                    <!-- Sales Card -->

                    <div class="col-xxl-12 col-md-12">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Jumlah Penderekan <span>| Hari Ini, <?= tanggal_indonesia(date('Y-m-d'))  ?>, <?= date_indo("Y-m-d") ?> </span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <a href="/admin/data_penindakan" class="data_perhari"> <i class="bi bi-car-front"></i></a>
                                    </div>
                                    <div class="ps-3">
                                        <h6 id="perhari"><?= $total_penderekan_perhari ?> <span class="text-muted small pt-2 ps-1">Kendaraan </span></h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->
                </div>
            </div>
    </section>

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <!-- Sales Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Jumlah <span>| Terbayar (Hari Ini) </span> <br> <span> <?= date_indo('Y-m-d') ?></span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <a href="/admin/data_penindakan/detail_terbayar_perhari" class="data_terbayar_perhari"><i class="bi bi-car-front"></i></a>
                                    </div>
                                    <div class="ps-3">
                                        <h6 id="terbayar_perhari"><?= $jumlah_terbayar_perhari ?> <span class="text-muted small pt-2 ps-1">Kendaraan </span></h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->

                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Jumlah <span>| Penderekan Dalam Proses </span> <br> <span> <?= date_indo('Y-m-d') ?></span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <a href="/admin/data_penindakan/detail_belum_terbayar_perhari" class="data_belum_terbayar"><i class="bi bi-car-front"></i></a>

                                    </div>
                                    <div class="ps-3">
                                        <h6 id="belum_terbayar_perhari"><?= $jumlah_belum_bayar_perhari ?> <span class="text-muted small pt-2 ps-1">Kendaraan </span> </h6>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->

                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Jumlah <span>| Penderekan Selesai (SP) </span> <br> <span> <?= date_indo('Y-m-d') ?></span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <a href="/admin/data_penindakan/detail_selesai_perhari" class="data_selesai"> <i class="bi bi-car-front"></i></a>

                                    </div>
                                    <div class="ps-3">
                                        <h6 id="selesai_perhari"><?= $jumlah_selesai_perhari ?> <span class="text-muted small pt-2 ps-1">Kendaraan</span> </h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->
                </div>
            </div>
    </section>

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <h5 class="card-title text-capitalize title_keseluruhan"> laporan keseluruhan penderekan </h5>
                <div class="row">
                    <!-- Sales Card -->
                    <div class="col-xxl-6 col-md-6">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Jumlah <span>| Unit / Regu</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <a href="/admin/unit_regu_detail"> <i class="bi bi-people"></i></a>

                                    </div>
                                    <div class="ps-3">
                                        <h6 id="jumlah_unit"><?= $jumlah_unit ?> <span class="text-muted small pt-2 ps-1">Unit / Regu</span></h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->

                    <div class="col-xxl-6 col-md-6">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Total Penderekan </h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <a href="/admin/data_penindakan"> <i class="bi bi-car-front"></i></a>
                                    </div>
                                    <div class="ps-3">
                                        <h6 id="total_penderekan"><?= $jumlah_penderekan ?> <span class="text-muted small pt-2 ps-1">Kendaraan</span></h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->
                </div>
            </div>
    </section>

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <!-- Sales Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Jumlah <span>| Penderekan Selesai (Terbayar)</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <a href="/admin/data_penindakan/detail_terbayar/"><i class="bi bi-car-front"></i></a>

                                    </div>
                                    <div class="ps-3">
                                        <h6 id="total_terbayar"><?= $jumlah_penderekan_terbayar ?> <span class="text-muted small pt-2 ps-1">Kendaraan</span></h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->

                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Jumlah <span>| Penderekan Dalam Proses</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <a href="data_penindakan/detail_belum_terbayar"><i class="bi bi-car-front"></i></a>

                                    </div>
                                    <div class="ps-3">
                                        <h6 id="total_belum_terbayar"><?= $jumlah_penderekan_belum_terbayar ?> <span class="text-muted small pt-2 ps-1">Kendaraan</span> </h6>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->

                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Jumlah <span>| Penderekan Selesai (SP)</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <a href="/admin/data_penindakan/detail_selesai"> <i class="bi bi-car-front"></i></a>

                                    </div>
                                    <div class="ps-3">
                                        <h6 id="total_selesai"><?= $jumlah_penderekan_selesai ?> <span class="text-muted small pt-2 ps-1">Kendaraan</span> </h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->
                </div>
            </div>
    </section>

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <h5 class="card-title text-capitalize title_keseluruhan"> laporan Angkut Motor & OCP </h5>
                <div class="row">
                    <!-- Sales Card -->


                    <!-- <div class="col-xxl-12 col-md-12">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Jumlah <span>| ANGKUT MOTOR </span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <a href="#"> <i class="bi bi-car-front"></i></a>
                                    </div>
                                    <div class="ps-3">
                                        <h6 id="total_angkut_motor"> <span class="text-muted small pt-2 ps-1">Kendaraan</span></h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div> -->
                    <!-- End Sales Card -->
                </div>
            </div>
    </section>

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <!-- Sales Card -->
                    <!-- <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Jumlah <span>| OCP Roda 2</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <a href="#"><i class="bi bi-car-front"></i></a>

                                    </div>
                                    <div class="ps-3">
                                        <h6 id="ocp_roda_2"> <span class="text-muted small pt-2 ps-1">Kendaraan</span></h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div> -->
                    <!-- End Sales Card -->

                    <!-- <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Jumlah <span>| OCP RODA 3</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <a href="#"><i class="bi bi-car-front"></i></a>

                                    </div>
                                    <div class="ps-3">
                                        <h6 id="ocp_roda_3"> <span class="text-muted small pt-2 ps-1">Kendaraan</span> </h6>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>End Sales Card -->

                    <!-- <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Jumlah <span>| OCP RODA 4</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <a href="#"> <i class="bi bi-car-front"></i></a>

                                    </div>
                                    <div class="ps-3">
                                        <h6 id="ocp_roda_4"><span class="text-muted small pt-2 ps-1">Kendaraan</span> </h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>End Sales Card -->
                </div>
            </div>
    </section>

</main><!-- End #main -->

<script src="/assets/vendor/jquery/jquery.js"></script>
<script>
    $(document).ready(function() {
        $('#ukpd_id').select2({
            theme: 'bootstrap4',
        });
    })

    $("#filter").submit(function(e) {
        e.preventDefault();
        let ukpd_id = $("#ukpd_id").val();
        $.ajax({
            url: '/admin/dashboard/filter',
            method: 'get',
            dataType: 'JSON',
            data: {
                ukpd_id: ukpd_id,
            },
            beforeSend: function() {
                $(".send").html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>Loading...");
                $(".send").prop('disabled', true);
            },
            success: function(response) {
                $('.send').html('Filter');
                $('.send').prop('disabled', false);

                // Harian
                $(".title_data").html(`laporan harian penderekan ${response.ukpd.nama_dinas}`);

                $("#perhari").html(`<h6 id="perhari"> ${response.total_penderekan_perhari}<span class="text-muted small pt-2 ps-1">Kendaraan </span></h6>`)
                $("#terbayar_perhari").html(`<h6 id="terbayar_perhari">${response.jumlah_terbayar_perhari}<span class="text-muted small pt-2 ps-1">Kendaraan </span></h6>`)
                $("#belum_terbayar_perhari").html(`<h6 id="belum_terbayar_perhari">${response.jumlah_belum_bayar_perhari}<span class="text-muted small pt-2 ps-1">Kendaraan </span></h6>`)
                $("#selesai_perhari").html(`<h6 id="selesai_perhari">${response.jumlah_selesai_perhari}<span class="text-muted small pt-2 ps-1">Kendaraan </span></h6> `)

                // Keseluruhan
                $(".title_keseluruhan").html(`laporan keseluruhan penderekan ${response.ukpd.ukpd}`);
                $("#total_penderekan").html(`<h6 id="total_penderekan">${response.jumlah_penderekan} <span class="text-muted small pt-2 ps-1">Kendaraan</span></h6>`)
                $("#total_terbayar").html(`<h6 id="total_terbayar">${response.jumlah_penderekan_terbayar} <span class="text-muted small pt-2 ps-1">Kendaraan</span></h6>`)
                $("#total_belum_terbayar").html(`<h6 id="total_belum_terbayar">${response.jumlah_penderekan_belum_terbayar} <span class="text-muted small pt-2 ps-1">Kendaraan</span></h6>`)
                $("#total_selesai").html(`<h6 id="total_belum_terbayar">${response.jumlah_penderekan_selesai} <span class="text-muted small pt-2 ps-1">Kendaraan</span></h6>`)
                $("#jumlah_unit").html(` <h6 id="jumlah_unit"> ${response.jumlah_unit} <span class="text-muted small pt-2 ps-1">Unit / Regu</span></h6>`)

                $(".data_perhari").attr("href", `/admin/data_penindakan/master_data/${response.ukpd.id}`);
                $(".data_terbayar_perhari").attr("href", `/admin/data_penindakan/detail_terbayar_perhari_with_ukpd/${response.ukpd.id}`);
                $(".data_belum_terbayar").attr("href", `/admin/data_penindakan/detail_belum_terbayar_perhari_with_ukpd/${response.ukpd.id}`);
                $(".data_selesai").attr("href", `/admin/data_penindakan/detail_selesai_perhari_with_ukpd/${response.ukpd.id}`);

            },
            error: function(response) {
                $('.send').html('Filter');
                $('.send').prop('disabled', false);
                Swal.fire({
                    icon: 'error',
                    title: `Error Silahkan Coba Lagi!`,
                });
            }
        });
    });
</script>


<?= $this->endSection(); ?>