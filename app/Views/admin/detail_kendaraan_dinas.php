<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<main id="main" class="main">

    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">

                <li class="breadcrumb-item">PAGES</li>
                <li class="breadcrumb-item"><a href="/admin/kendaraan_dinas">KEMBALI</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <h6>Foto Kendaraan</h6>
                        <img src="/kdo/<?= $kendaraan_dinas->foto_kendaraan_dinas ?>" alt="Profile" class="img-fluid">
                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Data Kendaraan</button>
                            </li>
                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">Data Kendaraan Dinas</h5>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">UKPD</div>
                                    <div class="col-lg-9 col-md-8"><?= $kendaraan_dinas->ukpd ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Merk Kendaraan</div>
                                    <div class="col-lg-9 col-md-8"><?= $kendaraan_dinas->nomor_kendaraan_dinas ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Merk Kendaraan</div>
                                    <div class="col-lg-9 col-md-8"><?= $kendaraan_dinas->merk_kendaraan_dinas ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Unit / Regu</div>
                                    <div class="col-lg-9 col-md-8"><?= $kendaraan_dinas->unit_regu ?></div>
                                </div>


                            </div>


                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

</main><!-- End #main -->

<script src="/assets/vendor/jquery/jquery.js"></script>


<?= $this->endSection(); ?>