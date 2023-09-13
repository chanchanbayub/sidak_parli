<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<main id="main" class="main">

    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">

                <li class="breadcrumb-item">PAGES</li>
                <li class="breadcrumb-item"><a href="/petugas/data_penindakan">KEMBALI</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <h6>Foto Kendaraan (Sebelum)</h6>
                        <img src="/data_penindakan/<?= $detail_data->foto_penindakan_1 ?>" alt="Profile" class="img-fluid">
                    </div>
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <h6>Foto Kendaraan (Saat di Derek)</h6>
                        <img src="/data_penindakan/<?= $detail_data->foto_penindakan_2 ?>" alt="Profile" class="img-fluid">
                        <h2><?= $detail_data->nomor_kendaraan ?></h2>
                        <h3><?= $detail_data->type_kendaraan ?></h3>
                        <?php if ($detail_data->nama_pengemudi == null) : ?>
                            <h6> <span class="badge bg-warning">Data Belum Lengkap</span> </h6>
                        <?php else : ?>
                            <h6><span class="badge bg-danger"><?= $detail_data->status_penderekan ?></span></h6>
                        <?php endif; ?>

                    </div>
                </div>
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <h6>Tanda Tangan Pelanggar</h6>
                        <img src="/<?= $detail_data->tanda_tangan_pelanggar ?>" alt="tanda tangan" class="img-fluid">
                        <h2><?= $detail_data->nama_pengemudi ?></h2>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <?php if ($detail_data->nama_pengemudi != null) : ?>
                            <a href="/pdf/bap_digital/<?= $detail_data->nomor_bap ?>" target="_blank" class="btn btn-sm btn-primary" type="button">
                                <i class="bi bi-download"> </i> Download Berita Acara
                            </a>
                        <?php else : ?>
                            <a href="/petugas/data_penindakan/edit_data/<?= $detail_data->nomor_bap ?>" class="btn btn-sm btn-warning" type="button">
                                <i class="bi bi-exclamation-square"> </i> Data Belum Lengkap
                            </a>
                        <?php endif; ?>
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
                                    <div class="col-lg-9 col-md-8"><?= $detail_data->ukpd ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label"> Nomor Surat Tugas</div>
                                    <div class="col-lg-9 col-md-8"><?= $detail_data->nomor_surat ?> - <?= $detail_data->tanggal_surat ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Jenis Penindakan</div>
                                    <div class="col-lg-9 col-md-8"><?= $detail_data->jenis_penindakan ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Unit Penindak</div>
                                    <div class="col-lg-9 col-md-8"><?= $detail_data->unit_regu ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Petugas Penindak</div>
                                    <div class="col-lg-9 col-md-8"><?= $detail_data->nama ?> - <?= $detail_data->nip ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Nomor BAP</div>
                                    <div class="col-lg-9 col-md-8"><?= $detail_data->nomor_bap ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Waktu Pelanggaran</div>
                                    <div class="col-lg-9 col-md-8"><?= $detail_data->tanggal_pelanggaran ?> <?= $detail_data->jam_pelanggaran ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Tempat Penyimpanan</div>
                                    <div class="col-lg-9 col-md-8"><?= $detail_data->tempat_penyimpanan ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Jenis Pelanggaran</div>
                                    <div class="col-lg-9 col-md-8"><?= $detail_data->jenis_pelanggaran ?></div>
                                </div>

                                <h5 class="card-title">Data Kendaraan</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Jenis Kendaraan</div>
                                    <div class="col-lg-9 col-md-8"><?= $detail_data->jenis_kendaraan ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Type Kendaraan</div>
                                    <div class="col-lg-9 col-md-8"><?= $detail_data->type_kendaraan ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Merk Kendaraan</div>
                                    <div class="col-lg-9 col-md-8"><?= $detail_data->merk_kendaraan ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Warna Kendaraan</div>
                                    <div class="col-lg-9 col-md-8"><?= $detail_data->warna_kendaraan ?></div>
                                </div>

                                <h5 class="card-title">Data Pelanggar</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Kartu Identitas</div>
                                    <div class="col-lg-9 col-md-8"> <?= $detail_data->kartu_identitas ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Nomor Identitas</div>
                                    <div class="col-lg-9 col-md-8"> <?= $detail_data->nomor_identitas ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Nama Pengemudi</div>
                                    <div class="col-lg-9 col-md-8"><?= $detail_data->nama_pengemudi ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Alamat Pengemudi</div>
                                    <div class="col-lg-9 col-md-8"><?= $detail_data->alamat_pengemudi ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Nomor Handphone Pengemudi</div>
                                    <div class="col-lg-9 col-md-8"> <a target="_blank" href='https://api.whatsapp.com/send?phone=<?= $detail_data->nomor_hp ?>'> <?= $detail_data->nomor_hp ?> </a></div>
                                </div>

                                <h5 class="card-title">Lokasi Penertiban</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Provinsi</div>
                                    <div class="col-lg-9 col-md-8"> <?= $detail_data->provinsi ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Kota</div>
                                    <div class="col-lg-9 col-md-8"> <?= $detail_data->kabupaten_kota ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Kecamatan</div>
                                    <div class="col-lg-9 col-md-8"><?= $detail_data->kecamatan ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Nama Jalan</div>
                                    <div class="col-lg-9 col-md-8"><?= $detail_data->nama_jalan ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Ciri Khusus Lokasi</div>
                                    <div class="col-lg-9 col-md-8"><?= $detail_data->nama_gedung ?></div>
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