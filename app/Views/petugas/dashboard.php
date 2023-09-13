<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<main id="main" class="main">

    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">PAGES</li>
                <li class="breadcrumb-item"><a href="/petugas/dashboard">DASHBOARD</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <!-- Sales Card -->
                    <div class="col-xxl-6 col-md-6">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Jumlah <span>| Petugas</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <a href="#"> <i class="bi bi-people"></i></a>

                                    </div>
                                    <div class="ps-3">
                                        <h6><?= $jumlah_petugas ?> <span class="text-muted small pt-2 ps-1">Personel</span></h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->

                    <div class="col-xxl-6 col-md-6">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Jumlah <span>| Penderekan</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <a href="/petugas/data_penindakan"> <i class="bi bi-car-front"></i></a>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?= $jumlah_penderekan ?> <span class="text-muted small pt-2 ps-1">Kendaraan / Hari</span></h6>

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
                                <h5 class="card-title">Jumlah <span>| Penderekan Terbayar </span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <a href="#"><i class="bi bi-car-front"></i></a>

                                    </div>
                                    <div class="ps-3">
                                        <h6><?= $jumlah_penderekan_terbayar ?> <span class="text-muted small pt-2 ps-1">Kendaraan / Hari</span></h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->

                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Jumlah <span>| Penderekan Dalam Proses </span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <a href="#"><i class="bi bi-car-front"></i></a>

                                    </div>
                                    <div class="ps-3">
                                        <h6><?= $jumlah_penderekan_belum_terbayar ?> <span class="text-muted small pt-2 ps-1">Kendaraan / Hari</span> </h6>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->

                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Jumlah <span>| Penderekan Selesai </span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <a href="#"> <i class="bi bi-car-front"></i></a>

                                    </div>
                                    <div class="ps-3">
                                        <h6><?= $jumlah_penderekan_selesai ?> <span class="text-muted small pt-2 ps-1">Kendaraan / Hari</span> </h6>
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