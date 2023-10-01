<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<main id="main" class="main">

    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">

                <li class="breadcrumb-item">PAGES</li>
                <li class="breadcrumb-item"><a href="/admin/angkut_motor">KEMBALI</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <h6>Foto Kendaraan</h6>
                        <img src="/angkut_motor/<?= $angkut_motor->foto_kendaraan_angkut ?>" alt="Profile" class="img-fluid">
                        <h2><?= $angkut_motor->nopol ?></h2>
                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Data Penindakan Angkut Motor</button>
                            </li>
                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">Data Penindakan</h5>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">UKPD</div>
                                    <div class="col-lg-9 col-md-8"><?= $angkut_motor->ukpd ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Jenis Penindakan</div>
                                    <div class="col-lg-9 col-md-8"><?= $angkut_motor->jenis_penindakan ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Unit Regu</div>
                                    <div class="col-lg-9 col-md-8"><?= $angkut_motor->unit_regu ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Nomor Kendaraan</div>
                                    <div class="col-lg-9 col-md-8"><?= $angkut_motor->nopol ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Tanggal Angkut Motor</div>
                                    <div class="col-lg-9 col-md-8"><?= $angkut_motor->tanggal_pelanggaran_angkut ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Jam Angkut Motor</div>
                                    <div class="col-lg-9 col-md-8"><?= $angkut_motor->jam_pelanggaran_angkut ?></div>
                                </div>

                                <h5 class="card-title">Lokasi Penertiban</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Provinsi</div>
                                    <div class="col-lg-9 col-md-8"> <?= $angkut_motor->provinsi ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Kota</div>
                                    <div class="col-lg-9 col-md-8"> <?= $angkut_motor->kabupaten_kota ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Kecamatan</div>
                                    <div class="col-lg-9 col-md-8"><?= $angkut_motor->kecamatan ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Nama Jalan</div>
                                    <div class="col-lg-9 col-md-8"><?= $angkut_motor->lokasi_angkut ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Nama Pengemudi</div>
                                    <div class="col-lg-9 col-md-8"><?= $angkut_motor->nama_pengemudi ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Alamat Pengemudi</div>
                                    <div class="col-lg-9 col-md-8"><?= $angkut_motor->alamat_pengemudi ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Tempat Penyimpanan</div>
                                    <div class="col-lg-9 col-md-8"><?= $angkut_motor->tempat_penyimpanan ?></div>
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