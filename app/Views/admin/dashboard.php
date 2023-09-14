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
            <h5 class="card-title"> Laporan Harian </h5>
            <div class="col-lg-12">
                <div class="row">
                    <!-- Sales Card -->

                    <div class="col-xxl-12 col-md-12">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Jumlah Penderekan <span>| Hari Ini, <?= tanggal_indonesia(date('Y-m-d'))  ?>, <?= date_indo("Y-m-d") ?> </span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <a href="/admin/data_penindakan"> <i class="bi bi-car-front"></i></a>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?= $total_penderekan_perhari ?> <span class="text-muted small pt-2 ps-1">Kendaraan </span></h6>

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
                                        <a href="/admin/data_penindakan/detail_terbayar_perhari"><i class="bi bi-car-front"></i></a>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?= $jumlah_terbayar_perhari ?> <span class="text-muted small pt-2 ps-1">Kendaraan </span></h6>
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
                                        <a href="/admin/data_penindakan/detail_belum_terbayar_perhari"><i class="bi bi-car-front"></i></a>

                                    </div>
                                    <div class="ps-3">
                                        <h6><?= $jumlah_belum_bayar_perhari ?> <span class="text-muted small pt-2 ps-1">Kendaraan </span> </h6>

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
                                        <a href="/admin/data_penindakan/detail_selesai_perhari"> <i class="bi bi-car-front"></i></a>

                                    </div>
                                    <div class="ps-3">
                                        <h6><?= $jumlah_selesai_perhari ?> <span class="text-muted small pt-2 ps-1">Kendaraan</span> </h6>
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
                <h5 class="card-title"> Laporan Keseluruhan </h5>
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
                                        <h6><?= $jumlah_unit ?> <span class="text-muted small pt-2 ps-1">Unit / Regu</span></h6>
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
                                        <h6><?= $jumlah_penderekan ?> <span class="text-muted small pt-2 ps-1">Kendaraan</span></h6>

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
                                        <h6><?= $jumlah_penderekan_terbayar ?> <span class="text-muted small pt-2 ps-1">Kendaraan</span></h6>
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
                                        <h6><?= $jumlah_penderekan_belum_terbayar ?> <span class="text-muted small pt-2 ps-1">Kendaraan</span> </h6>

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
                                        <h6><?= $jumlah_penderekan_selesai ?> <span class="text-muted small pt-2 ps-1">Kendaraan</span> </h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->
                </div>
            </div>
    </section>

</main><!-- End #main -->


<?= $this->endSection(); ?>