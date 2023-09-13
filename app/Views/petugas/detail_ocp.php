<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<main id="main" class="main">

    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">

                <li class="breadcrumb-item">PAGES</li>
                <li class="breadcrumb-item"><a href="/petugas/ocp">KEMBALI</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <h6>Foto Kendaraan</h6>
                        <img src="/ocp_data_penindakan/<?= $detail_ocp->foto_penindakan ?>" alt="Profile" class="img-fluid">
                        <h2><?= $detail_ocp->nomor_kendaraan_ocp ?></h2>
                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Data Penindakan</button>
                            </li>
                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">Data Penindakan</h5>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">UKPD</div>
                                    <div class="col-lg-9 col-md-8"><?= $detail_ocp->ukpd ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Jenis Penindakan</div>
                                    <div class="col-lg-9 col-md-8"><?= $detail_ocp->jenis_penindakan ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Unit Regu</div>
                                    <div class="col-lg-9 col-md-8"><?= $detail_ocp->unit_regu ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Nomor Kendaraan</div>
                                    <div class="col-lg-9 col-md-8"><?= $detail_ocp->nomor_kendaraan_ocp ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Tanggal OCP</div>
                                    <div class="col-lg-9 col-md-8"><?= $detail_ocp->tanggal_ocp ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Jam OCP</div>
                                    <div class="col-lg-9 col-md-8"><?= $detail_ocp->jam_ocp ?></div>
                                </div>

                                <h5 class="card-title">Lokasi Penertiban</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Provinsi</div>
                                    <div class="col-lg-9 col-md-8"> <?= $detail_ocp->provinsi ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Kota</div>
                                    <div class="col-lg-9 col-md-8"> <?= $detail_ocp->kabupaten_kota ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Kecamatan</div>
                                    <div class="col-lg-9 col-md-8"><?= $detail_ocp->kecamatan ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Nama Jalan</div>
                                    <div class="col-lg-9 col-md-8"><?= $detail_ocp->lokasi_penindakan ?></div>
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