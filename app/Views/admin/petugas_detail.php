<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<main id="main" class="main">

    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">PAGES</li>
                <li class="breadcrumb-item"><a href="/admin/petugas">PETUGAS</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">

            <div class="col-xl-12">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->

                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                <h5 class="card-title">Detail Petugas</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">UKPD</div>
                                    <div class="col-lg-9 col-md-8"><?= $petugas_detail->ukpd ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Unit / Regu</div>
                                    <div class="col-lg-9 col-md-8"><?= $petugas_detail->unit_regu ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Nama</div>
                                    <div class="col-lg-9 col-md-8"><?= $petugas_detail->nama ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Username</div>
                                    <div class="col-lg-9 col-md-8"><?= $petugas_detail->username ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">NIP / NPTT / NPJLP</div>
                                    <div class="col-lg-9 col-md-8"><?= $petugas_detail->nip ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Golongan</div>
                                    <div class="col-lg-9 col-md-8"><?= $petugas_detail->golongan ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Pangkat</div>
                                    <div class="col-lg-9 col-md-8"><?= $petugas_detail->pangkat ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Jabatan</div>
                                    <div class="col-lg-9 col-md-8"><?= $petugas_detail->jabatan ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Role Management</div>
                                    <div class="col-lg-9 col-md-8"><?= $petugas_detail->role_management ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Status Petugas</div>
                                    <div class="col-lg-9 col-md-8"><?= $petugas_detail->status_petugas ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</main><!-- End #main -->


<?= $this->endSection(); ?>