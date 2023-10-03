<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<link rel="stylesheet" href="/assets/signaturepad/jquery.signature.css">
<link rel="stylesheet" href="/assets/signaturepad/jquery.ui.css">

<main id="main" class="main">

    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">PAGES</li>
                <li class="breadcrumb-item"><a href="/admin/data_penindakan"><?= $title ?></a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $title ?></h5>
                        <!-- Floating Labels Form -->
                        <form class="row g-3" id="form_edit">
                            <?= csrf_field(); ?>
                            <div class="col-md-4">
                                <input type="hidden" name="id" id="id" value="<?= $data_penindakan->id ?>">
                                <input type="hidden" name="foto_lama" id="foto_lama" value="<?= $data_penindakan->foto_penindakan_1 ?>">
                                <input type="hidden" name="foto_lama_2" id="foto_lama_2" value="<?= $data_penindakan->foto_penindakan_2 ?>">
                                <input type="hidden" name="bap_id" id="bap_id" value="<?= $data_penindakan->bap_id ?>">
                                <input type="hidden" name="tanda_tangan_pelanggar_lama" id="tanda_tangan_pelanggar_lama" value="<?= $data_penindakan->tanda_tangan_pelanggar ?>">
                                <label for="ukpd_id">UKPD :</label>
                                <select class="form-select" name="ukpd_id" id="ukpd_id">
                                    <option value="">--Silahkan Pilih--</option>
                                    <?php foreach ($ukpd as $ukpd) : ?>
                                        <?php if ($ukpd->id == $data_penindakan->ukpd_id) : ?>
                                            <option value="<?= $ukpd->id ?>" selected><?= $ukpd->ukpd ?></option>
                                        <?php else : ?>
                                            <option value="<?= $ukpd->id ?>"><?= $ukpd->ukpd ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback error-ukpd">
                                    tes
                                </div>

                            </div>
                            <div class="col-md-4">
                                <label for="ppns_id">PPNS :</label>
                                <select class="form-select" name="ppns_id" id="ppns_id">
                                    <option value="<?= $ppns->id ?>"><?= $ppns->nama ?></option>
                                </select>

                                <div class="invalid-feedback error-ppns">

                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="spt_id">Nomor Surat Tugas :</label>
                                <select class="form-select" name="spt_id" id="spt_id">
                                    <option value="<?= $spt->id ?>"><?= $spt->nomor_surat ?> - <?= $spt->tanggal_surat ?></option>

                                </select>
                                <div class="invalid-feedback error-spt">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="jenis_penindakan_id">Jenis Penindakan :</label>
                                <select class="form-select" name="jenis_penindakan_id" id="jenis_penindakan_id">
                                    <option value="">--Silahkan Pilih--</option>
                                    <?php foreach ($jenis_penindakan as $jenis_penindakan) : ?>
                                        <?php if ($jenis_penindakan->id == $data_penindakan->jenis_penindakan_id) : ?>
                                            <option value="<?= $jenis_penindakan->id ?>" selected> <?= $jenis_penindakan->jenis_penindakan ?></option>
                                        <?php else : ?>
                                            <option value="<?= $jenis_penindakan->id ?>"> <?= $jenis_penindakan->jenis_penindakan ?></option>
                                        <?php endif; ?>

                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback error-jenis-penindakan ">

                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="unit_id">Unit / Regu :</label>
                                <select class="form-select" name="unit_id" id="unit_id">
                                    <option value="">--Silahkan Pilih--</option>
                                    <?php foreach ($unit_regu as $unit_regu) : ?>
                                        <?php if ($unit_regu->id == $data_penindakan->unit_id) : ?>
                                            <option value="<?= $unit_regu->id ?>" selected><?= $unit_regu->unit_regu ?></option>
                                        <?php else : ?>
                                            <option value="<?= $unit_regu->id ?>"><?= $unit_regu->unit_regu ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback error-unit">

                                </div>

                            </div>

                            <div class="col-md-4">
                                <label for="bap_id">Nomor BAP :</label>
                                <input type="text" class="form-control" name="bap_id" id="bap_id" value="<?= $data_penindakan->nomor_bap ?>" disabled>
                                </select>

                                <div class="invalid-feedback error-bap">

                                </div>

                            </div>
                            <div class="col-md-4">
                                <label for="jenis_kendaraan_id">Jenis Kendaraan :</label>
                                <select class="form-select" name="jenis_kendaraan_id" id="jenis_kendaraan_id">
                                    <option value=""> --Silahkan Pilih--</option>
                                    <?php foreach ($jenis_kendaraan as $jenis_kendaraan) : ?>
                                        <?php if ($jenis_kendaraan->id == $data_penindakan->jenis_kendaraan_id) : ?>
                                            <option value="<?= $jenis_kendaraan->id ?>" selected> <?= $jenis_kendaraan->jenis_kendaraan ?></option>
                                        <?php else : ?>
                                            <option value="<?= $jenis_kendaraan->id  ?>"> <?= $jenis_kendaraan->jenis_kendaraan ?></option>
                                        <?php endif; ?>

                                    <?php endforeach; ?>
                                </select>

                                <div class="invalid-feedback error-jenis-kendaraan">

                                </div>

                            </div>
                            <div class="col-md-4" style="display: none;">
                                <label for="type_kendaraan_id">Type Kendaraan :</label>
                                <select class="form-select" name="type_kendaraan_id" id="type_kendaraan_id">
                                    <?php foreach ($type_kendaraan as $type_kendaraan) : ?>
                                        <?php if ($type_kendaraan->id == $data_penindakan->type_kendaraan_id) : ?>
                                            <option value="<?= $type_kendaraan->id ?>" selected> <?= $type_kendaraan->type_kendaraan ?></option>
                                        <?php else : ?>
                                            <option value="<?= $type_kendaraan->id  ?>"> <?= $type_kendaraan->type_kendaraan ?></option>
                                        <?php endif; ?>

                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback error-type-kendaraan">

                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="merk_kendaraan">Merk Kendaraan :</label>
                                <input type="text" class="form-control" id="merk_kendaraan" name="merk_kendaraan" value="<?= $data_penindakan->merk_kendaraan ?>">
                                <div class="invalid-feedback error-merk-kendaraan">

                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="nomor_kendaraan">Nomor Kendaraan :</label>
                                <input type="text" class="form-control" id="nomor_kendaraan" name="nomor_kendaraan" value="<?= $data_penindakan->nomor_kendaraan ?>">
                                <div class="invalid-feedback error-nomor-kendaraan">

                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="warna_kendaraan">Warna Kendaraan :</label>
                                <input type="text" class="form-control" id="warna_kendaraan" name="warna_kendaraan" value="<?= $data_penindakan->warna_kendaraan ?>">
                                <div class="invalid-feedback error-warna-kendaraan">

                                </div>
                            </div>
                            <div class="col-md-4">

                                <label for="jenis_pelanggaran_id">Jenis Pelanggaran :</label>
                                <select class="form-select" name="jenis_pelanggaran_id" id="jenis_pelanggaran_id">
                                    <option value="">--Silahkan Pilih--</option>
                                    <?php foreach ($jenis_pelanggaran as $jenis_pelanggaran) : ?>
                                        <?php if ($jenis_pelanggaran->id == $data_penindakan->jenis_pelanggaran_id) : ?>
                                            <option value="<?= $jenis_pelanggaran->id ?>" selected> <?= $jenis_pelanggaran->jenis_pelanggaran ?></option>
                                        <?php else : ?>
                                            <option value="<?= $jenis_pelanggaran->id  ?>"> <?= $jenis_pelanggaran->jenis_pelanggaran ?></option>
                                        <?php endif; ?>

                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback error-jenis-pelanggaran">


                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="tanggal_pelanggaran">Tanggal Pelanggaran :</label>
                                <input type="date" class="form-control" id="tanggal_pelanggaran" name="tanggal_pelanggaran" value="<?= $data_penindakan->tanggal_pelanggaran ?>">
                                <div class=" invalid-feedback error-tanggal">

                                </div>
                            </div>
                            <div class="col-md-4">

                                <label for="jam_pelanggaran">Jam Pelanggaran :</label>
                                <input type="time" class="form-control" id="jam_pelanggaran" name="jam_pelanggaran" value="<?= $data_penindakan->jam_pelanggaran ?>">

                                <div class="invalid-feedback error-jam">

                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="provinsi_id">Provinsi :</label>
                                <select class="form-select" name="provinsi_id" id="provinsi_id">
                                    <option value="">--Silahkan Pilih--</option>
                                    <option value="<?= $provinsi->id ?>" selected><?= $provinsi->provinsi ?></option>
                                </select>
                                <div class="invalid-feedback error-provinsi">

                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="kota_id">Kota : </label>
                                <select class="form-select" name="kota_id" id="kota_id">
                                    <option value="">--Silahkan Pilih--</option>
                                    <?php foreach ($kota as $kota) : ?>
                                        <?php if ($kota->id == $data_penindakan->kota_id) : ?>
                                            <option value="<?= $kota->id ?>" selected> <?= $kota->kabupaten_kota ?></option>
                                        <?php else : ?>
                                            <option value="<?= $kota->id  ?>"> <?= $kota->kabupaten_kota ?></option>
                                        <?php endif; ?>

                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback error-kota">


                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="kecamatan_id">Kecamatan :</label>
                                <select class="form-select" name="kecamatan_id" id="kecamatan_id">
                                    <option value="">--Silahkan Pilih--</option>
                                    <?php foreach ($kecamatan as $kecamatan) : ?>
                                        <?php if ($kecamatan->id == $data_penindakan->kecamatan_id) : ?>
                                            <option value="<?= $kecamatan->id ?>" selected> <?= $kecamatan->kecamatan ?></option>
                                        <?php else : ?>
                                            <option value="<?= $kecamatan->id  ?>"> <?= $kecamatan->kecamatan ?></option>
                                        <?php endif; ?>

                                    <?php endforeach; ?>
                                </select>

                                <div class="invalid-feedback error-kecamatan">

                                </div>

                            </div>

                            <div class="col-md-4">
                                <label for="nama_jalan">Lokasi Penderekan (Nama Jalan) :</label>
                                <input type="text" class="form-control" id="nama_jalan" name="nama_jalan" value="<?= $data_penindakan->nama_jalan ?>">
                                <div class="invalid-feedback error-nama-jalan">

                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="nama_gedung">Ciri Khusus (Nama Gedung (opsional)) :</label>
                                <input type="text" class="form-control" id="nama_gedung" name="nama_gedung" value="<?= $data_penindakan->nama_gedung ?>">
                                <div class="invalid-feedback">

                                </div>
                            </div>
                            <div class="col-md-8">
                                <label for="kartu_identitas_id">Jenis Identitas :</label>
                                <select class="form-select" name="kartu_identitas_id" id="kartu_identitas_id">
                                    <?php foreach ($kartu_identitas as $kartu_identitas) : ?>
                                        <option value="<?= $kartu_identitas->id ?>"><?= $kartu_identitas->kartu_identitas ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback error-kartu-identitas">

                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="nomor_identitas">Nomor Identitas :</label>
                                <input type="text" class="form-control" id="nomor_identitas" name="nomor_identitas" value="<?= $data_penindakan->nomor_identitas ?>">
                                <div class="invalid-feedback error-nomor-identitas">

                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="nama_pengemudi">Nama Pengemudi :</label>
                                <input type="text" class="form-control" id="nama_pengemudi" name="nama_pengemudi" value="<?= $data_penindakan->nama_pengemudi ?>">
                                <div class="invalid-feedback error-nama-pengemudi">

                                </div>
                            </div>
                            <div class="col-md-4">

                                <label for="alamat_pengemudi">Alamat Pengemudi :</label>
                                <input type="text" class="form-control" id="alamat_pengemudi" name="alamat_pengemudi" value="<?= $data_penindakan->alamat_pengemudi ?>">

                                <div class="invalid-feedback error-alamat-pengemudi">


                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="nomor_hp">Nomor HP (Whatsapp) :</label>
                                <input type="text" class="form-control" id="nomor_hp" placeholder="6282xxxx" name="nomor_hp" value="<?= $data_penindakan->nomor_hp ?>">

                                <div class="invalid-feedback error-no-hp">

                                </div>
                            </div>
                            <div class="col-md-6">

                                <label for="tempat_penyimpanan_id">Tempat Penyimpanan :</label>
                                <select class="form-select" name="tempat_penyimpanan_id" id="tempat_penyimpanan_id">
                                    <option value="">--Silahkan Pilih--</option>
                                    <?php foreach ($tempat_penyimpanan as $tempat_penyimpanan) : ?>
                                        <?php if ($tempat_penyimpanan->id == $data_penindakan->tempat_penyimpanan_id) : ?>
                                            <option value="<?= $tempat_penyimpanan->id ?>" selected> <?= $tempat_penyimpanan->tempat_penyimpanan ?></option>
                                        <?php else : ?>
                                            <option value="<?= $tempat_penyimpanan->id  ?>"> <?= $tempat_penyimpanan->tempat_penyimpanan ?></option>
                                        <?php endif; ?>

                                    <?php endforeach; ?>
                                </select>

                                <div class="invalid-feedback error-tempat-penyimpanan">

                                </div>

                            </div>
                            <div class="col-md-6">
                                <label for="foto_penindakan_1">Foto Penderekan :</label>
                                <input type="file" class="form-control" id="foto_penindakan_1" name="foto_penindakan_1" value="<?= $data_penindakan->foto_penindakan_1 ?>">

                                <div class="invalid-feedback error-foto-1">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="foto_penindakan_2">Foto Penderekan :</label>
                                <input type="file" class="form-control" id="foto_penindakan_2" name="foto_penindakan_2" value="<?= $data_penindakan->foto_penindakan_2 ?>">

                                <div class="invalid-feedback error-foto-2">

                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary save">Kirim</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form><!-- End floating Labels Form -->

                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->

<!-- Modal Kebijakan Privasi -->

<!-- Scrollable modal -->
<div class="modal fade" id="kebijakan_privasi" tabindex="0">
    <div class="modal-dialog modal-dialog-scrollable  modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Kebijakan & Privasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3 style="text-align:center ;">Disclamer</h3>
                <hr>
                <p style="text-align: justify;">SI Teladan tidak bertanggung jawab atas segala kesalahan data yang kendaraan diinputkan. Maka dengan ini saya menyatakan bahwa data kendaraan tersebut benar dan terbukti melakukan pelanggaran sesuai undang undang yang berlaku, dan apabila suatu saat nanti terdapat kekeliruan data, maka SI Teladan tidak bertanggung jawab terhadap kekeliruan data tersebut. </p>
                <hr>
                <h3 style="text-align:center ;">Kebijakan & Privasi</h3>
                <hr>
                <p style="text-align: justify;">Kami berkomitmen untuk menjaga keamanan dan kerahasiaan data pribadi yang diberikan Pengguna saat mengakses dan menggunakan Platform (“Data Pribadi”). Dalam hal ini, Data Pribadi diberikan oleh Pengguna secara sadar dan tanpa adanya tekanan atau paksaan dari pihak manapun, serta ikut bertanggung jawab penuh dalam menjaga kerahasiaan Data Pribadi tersebut. <br>
                    SI Teladan dengan ini menyatakan bahwa Anda telah membaca dan memahami secara penuh konten dan sebab-akibat dari Kebijakan Privasi kami, dan Anda tidak dapat secara paksa mencabut kembali persetujuan Anda yang telah terikat dengan ketentuan-ketentuan dari Kebijakan Privasi kami.</p>
                <hr>
                <h3 style="text-align:center">Tanda Tangan Pelanggar </h3>
                <hr>
                <form id="signaturPad">
                    <div class="signature text-center">
                        <br>
                        <?php if ($data_penindakan->tanda_tangan_pelanggar == null) : ?>
                            <div id="canva"></div>
                            <div class="text-left">
                                <button id="clear" type="button" class="btn btn-outline-danger btn-xs"> <i class="fa fa-times"></i> Hapus </button>
                                <textarea id="signature64" name="tanda_tangan_pelanggar" style="display: none;"></textarea>
                            </div>
                        <?php else : ?>
                            <img src="/<?= $data_penindakan->tanda_tangan_pelanggar ?>" alt="tanda_tangan_pelanggar">
                        <?php endif; ?>
                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-primary" id="send">Setujui</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="/assets/vendor/jquery/jquery.js"></script>
<script src="/assets/signaturepad/jquery.ui.min.js"></script>
<script src="/assets/signaturepad/jquery.signature.min.js"></script>
<script src="/assets/signaturepad/jquery.ui.touch-punch.min.js"></script>

<script>
    $(document).ready(function() {
        // Form Tambah
        $('#ukpd_id').select2({
            theme: 'bootstrap4',
        });
        $('#ppns_id').select2({
            theme: 'bootstrap4',
        });
        $('#spt_id').select2({
            theme: 'bootstrap4',
        });
        $('#unit_id').select2({
            theme: 'bootstrap4',
        });
        $('#jenis_penindakan_id').select2({
            theme: 'bootstrap4',
        });
        $('#tempat_penyimpanan_id').select2({
            theme: 'bootstrap4',
        });
        $('#jenis_kendaraan_id').select2({
            theme: 'bootstrap4',
        });
        $('#type_kendaraan_id').select2({
            theme: 'bootstrap4',
        });
        $('#jenis_pelanggaran_id').select2({
            theme: 'bootstrap4',
        });
        $('#jenis_pelanggaran_id').select2({
            theme: 'bootstrap4',
        });
        $('#kartu_identitas_id').select2({
            theme: 'bootstrap4',
        });
        $('#provinsi_id').select2({
            theme: 'bootstrap4',
        });
        $('#kota_id').select2({
            theme: 'bootstrap4',
        });
        $('#kecamatan_id').select2({
            theme: 'bootstrap4',
        });
        $('#kelurahan_id').select2({
            theme: 'bootstrap4',
        });

    });

    // Signature Pad
    $('#widget').draggable();

    let signaturePad = $("#canva").signature({
        syncField: '#signature64',
        syncFormat: 'PNG',
        // color: '#0000FF',
        // guideline: true
    });

    $('#clear').click(function() {
        signaturePad.signature('clear');
    });
    // End Signature Pad

    $(".form-select").css('width', '100%');

    $(document).on('change', "#jenis_penindakan_id", function(e) {
        e.preventDefault();
        let jenis_penindakan_id = $(this).val();
        let ukpd_id = $("#ukpd_id").val();
        $.ajax({
            url: '/petugas/data_penindakan/getNomorBap',
            method: 'get',
            dataType: 'JSON',
            data: {
                jenis_penindakan_id: jenis_penindakan_id,
                ukpd_id: ukpd_id,
            },
            success: function(response) {

                if (response.nomor_bap.length != 0) {
                    let nomor_bap = `<option value = ""> --Silahkan Pilih-- </option>`
                    response.nomor_bap.forEach(function(e) {
                        nomor_bap += `<option value ="${e.id}"> ${e.nomor_bap} </option>`;
                    })
                    $("#bap_id").html(nomor_bap);
                    $("#bap_id").removeAttr('disabled');
                } else {

                    let nomor_bap = `<option value = ""> --Silahkan Pilih-- </option>`;
                    $("#bap_id").html(nomor_bap);
                    $("#bap_id").attr('disabled', 'disabled');
                }
            }
        });
    });

    $(document).on('change', "#jenis_kendaraan_id", function(e) {
        e.preventDefault();
        let jenis_kendaraan_id = $(this).val();
        $.ajax({
            url: '/petugas/data_penindakan/getTypeKendaraan',
            method: 'get',
            dataType: 'JSON',
            data: {
                jenis_kendaraan_id: jenis_kendaraan_id,
            },
            success: function(response) {

                if (response.type_kendaraan.length > 0) {
                    let type_kendaraan;
                    response.type_kendaraan.forEach(function(e) {
                        type_kendaraan += `<option value ="${e.id}"> ${e.type_kendaraan} </option>`;
                    })
                    $("#type_kendaraan_id").html(type_kendaraan);
                    $("#type_kendaraan_id").removeAttr('disabled');
                } else {

                    let type_kendaraan = `<option value = ""> --Silahkan Pilih-- </option>`;
                    $("#type_kendaraan_id").html(type_kendaraan);
                    $("#type_kendaraan_id").attr('disabled', 'disabled');
                }
            }
        });
    });

    $(document).on('change', "#provinsi_id", function(e) {
        e.preventDefault();
        let provinsi_id = $(this).val();
        $.ajax({
            url: '/petugas/data_penindakan/getKota',
            method: 'get',
            dataType: 'JSON',
            data: {
                provinsi_id: provinsi_id,
            },
            success: function(response) {
                if (response.kota.length > 0) {
                    let kota = `<option value = ""> --Silahkan Pilih-- </option>`
                    response.kota.forEach(function(e) {
                        kota += `<option value ="${e.id}"> ${e.kabupaten_kota} </option>`;
                    })
                    $("#kota_id").html(kota);
                    $("#kota_id").removeAttr('disabled');
                } else {
                    let kota = `<option value = ""> --Silahkan Pilih-- </option>`;
                    $("#kota_id").html(kota);
                    $("#kota_id").attr('disabled', 'disabled');
                }
            }
        });
    });

    $(document).on('change', "#kota_id", function(e) {
        e.preventDefault();
        let kota_id = $(this).val();
        $.ajax({
            url: '/petugas/data_penindakan/getKecamatan',
            method: 'get',
            dataType: 'JSON',
            data: {
                kota_id: kota_id,
            },
            success: function(response) {
                if (response.kecamatan.length > 0) {
                    let kecamatan = `<option value = ""> --Silahkan Pilih-- </option>`
                    response.kecamatan.forEach(function(e) {
                        kecamatan += `<option value ="${e.id}"> ${e.kecamatan} </option>`;
                    })
                    $("#kecamatan_id").html(kecamatan);
                    $("#kecamatan_id").removeAttr('disabled');
                } else {
                    let kecamatan = `<option value = ""> --Silahkan Pilih-- </option>`;
                    $("#kecamatan_id").html(kecamatan);
                    $("#kecamatan_id").attr('disabled', 'disabled');
                }
            }
        });
    });

    $("#form_edit").submit(function(e) {
        e.preventDefault();
        // table data_penindakan
        let id = $("#id").val();
        let foto_lama = $("#foto_lama").val();
        let foto_lama_2 = $("#foto_lama_2").val();
        let tanda_tangan_pelanggar_lama = $("#tanda_tangan_pelanggar_lama").val();
        let ukpd_id = $("#ukpd_id").val();
        let ppns_id = $("#ppns_id").val();
        let spt_id = $("#spt_id").val();
        let unit_id = $("#unit_id").val();
        let jenis_penindakan_id = $("#jenis_penindakan_id").val();
        let bap_id = $("#bap_id").val();
        let jenis_pelanggaran_id = $("#jenis_pelanggaran_id").val();
        let tanggal_pelanggaran = $("#tanggal_pelanggaran").val();
        let jam_pelanggaran = $("#jam_pelanggaran").val();
        let tempat_penyimpanan_id = $("#tempat_penyimpanan_id").val();
        let foto = $("#foto").val();
        // table kendaraan
        let jenis_kendaraan_id = $("#jenis_kendaraan_id").val();
        let type_kendaraan_id = $("#type_kendaraan_id").val();
        let merk_kendaraan = $("#merk_kendaraan").val();
        let nomor_kendaraan = $("#nomor_kendaraan").val();
        let warna_kendaraan = $("#warna_kendaraan").val();
        // table lokasi_penertiban
        let provinsi_id = $("#provinsi_id").val();
        let kota_id = $("#kota_id").val();
        let kecamatan_id = $("#kecamatan_id").val();
        let nama_jalan = $("#nama_jalan").val();
        let nama_gedung = $("#nama_gedung").val();
        // table pelanggar
        let kartu_identitas_id = $("#kartu_identitas_id").val();
        let nomor_identitas = $("#nomor_identitas").val();
        let nama_pengemudi = $("#nama_pengemudi").val();
        let alamat_pengemudi = $("#alamat_pengemudi").val();
        let nomor_hp = $("#nomor_hp").val();

        let formData = new FormData(this);

        formData.append('id', id);
        formData.append('tanda_tangan_pelanggar_lama', tanda_tangan_pelanggar_lama);
        formData.append('foto_lama', foto_lama);
        formData.append('foto_lama_2', foto_lama_2);
        formData.append('ukpd_id', ukpd_id);
        formData.append('ppns_id', ppns_id);
        formData.append('spt_id', spt_id);
        formData.append('unit_id', unit_id);
        formData.append('jenis_penindakan_id', jenis_penindakan_id);
        formData.append('bap_id', bap_id);
        formData.append('jenis_pelanggaran_id', jenis_pelanggaran_id);
        formData.append('tanggal_pelanggaran', tanggal_pelanggaran);
        formData.append('jam_pelanggaran', jam_pelanggaran);
        formData.append('tempat_penyimpanan_id', tempat_penyimpanan_id);
        formData.append('foto', foto);

        formData.append('jenis_kendaraan_id', jenis_kendaraan_id);
        formData.append('type_kendaraan_id', type_kendaraan_id);
        formData.append('merk_kendaraan', merk_kendaraan);
        formData.append('nomor_kendaraan', nomor_kendaraan);
        formData.append('warna_kendaraan', warna_kendaraan);

        formData.append('provinsi_id', provinsi_id);
        formData.append('kota_id', kota_id);
        formData.append('kecamatan_id', kecamatan_id);
        formData.append('nama_jalan', nama_jalan);
        formData.append('nama_gedung', nama_gedung);

        formData.append('kartu_identitas_id', kartu_identitas_id);
        formData.append('nomor_identitas', nomor_identitas);
        formData.append('nama_pengemudi', nama_pengemudi);
        formData.append('alamat_pengemudi', alamat_pengemudi);
        formData.append('nomor_hp', nomor_hp);


        $("#kebijakan_privasi").modal('show');

        $("#kebijakan_privasi").on("click", "#send", function(e) {
            e.preventDefault();
            let signature = $("#signature64").val();
            formData.append('tanda_tangan_pelanggar', signature);
            sendData(formData);
        })
    })

    function sendData(formData) {
        $("#kebijakan_privasi").modal('hide');
        $.ajax({
            url: '/petugas/data_penindakan/update',
            data: formData,
            dataType: 'json',
            enctype: 'multipart/form-data',
            type: 'POST',
            contentType: false,
            processData: false,
            cache: false,
            beforeSend: function() {
                $('.save').html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>Loading...");
                $(".send").prop('disabled', true);
            },
            success: function(response) {
                $(".save").html('Kirim');
                $(".save").prop('disabled', false);
                if (response.error) {
                    if (response.error.ukpd_id) {
                        $("#ukpd_id").addClass('is-invalid');
                        $(".error-ukpd").html(response.error.ukpd_id);
                    } else {
                        $("#ukpd_id").removeClass('is-invalid');
                        $(".error-ukpd").html('');
                    }
                    if (response.error.ppns_id) {
                        $("#ppns_id").addClass('is-invalid');
                        $(".error-ppns").html(response.error.ppns_id);
                    } else {
                        $("#ppns_id").removeClass('is-invalid');
                        $(".error-ppns").html('');
                    }
                    if (response.error.spt_id) {
                        $("#spt_id").addClass('is-invalid');
                        $(".error-spt").html(response.error.spt_id);
                    } else {
                        $("#spt_id").removeClass('is-invalid');
                        $(".error-spt").html('');
                    }
                    if (response.error.unit_id) {
                        $("#unit_id").addClass('is-invalid');
                        $(".error-unit").html(response.error.unit_id);
                    } else {
                        $("#unit_id").removeClass('is-invalid');
                        $(".error-unit").html('');
                    }
                    if (response.error.jenis_penindakan_id) {
                        $("#jenis_penindakan_id").addClass('is-invalid');
                        $(".error-jenis-penindakan").html(response.error.jenis_penindakan_id);
                    } else {
                        $("#jenis_penindakan_id").removeClass('is-invalid');
                        $(".error-jenis-penindakan").html('');
                    }
                    if (response.error.bap_id) {
                        $("#bap_id").addClass('is-invalid');
                        $(".error-bap").html(response.error.bap_id);
                    } else {
                        $("#bap_id").removeClass('is-invalid');
                        $(".error-bap").html('');
                    }
                    if (response.error.jenis_pelanggaran_id) {
                        $("#jenis_pelanggaran_id").addClass('is-invalid');
                        $(".error-jenis-pelanggaran").html(response.error.jenis_pelanggaran_id);
                    } else {
                        $("#jenis_pelanggaran_id").removeClass('is-invalid');
                        $(".error-jenis-pelanggaran").html('');
                    }
                    if (response.error.tanggal_pelanggaran) {
                        $("#tanggal_pelanggaran").addClass('is-invalid');
                        $("#error-tanggal").html(response.error.tanggal_pelanggaran);
                    } else {
                        $("#tanggal_pelanggaran").removeClass('is-invalid');
                        $("#error-tanggal").html('');
                    }

                    if (response.error.tempat_penyimpanan_id) {
                        $("#tempat_penyimpanan_id").addClass('is-invalid');
                        $(".error-tempat-penyimpanan").html(response.error.tempat_penyimpanan_id);
                    } else {
                        $("#tempat_penyimpanan_id").removeClass('is-invalid');
                        $(".error-tempat-penyimpanan").html('');
                    }
                    if (response.error.foto_penindakan_1) {
                        $("#foto_penindakan_1").addClass('is-invalid');
                        $(".error-foto-1").html(response.error.foto);
                    } else {
                        $("#foto_penindakan_1").removeClass('is-invalid');
                        $(".error-foto-1").html('');
                    }
                    if (response.error.foto_penindakan_2) {
                        $("#foto_penindakan_2").addClass('is-invalid');
                        $(".error-foto-2").html(response.error.foto);
                    } else {
                        $("#foto_penindakan_2").removeClass('is-invalid');
                        $(".error-foto-2").html('');
                    }
                    // end Penindakan

                    // data kendaraan
                    if (response.error.jenis_kendaraan_id) {
                        $("#jenis_kendaraan_id").addClass('is-invalid');
                        $(".error-jenis-kendaraan").html(response.error.jenis_kendaraan_id);
                    } else {
                        $("#jenis_kendaraan_id").removeClass('is-invalid');
                        $(".error-jenis-kendaraan").html('');
                    }

                    if (response.error.type_kendaraan_id) {
                        $("#type_kendaraan_id").addClass('is-invalid');
                        $(".error-type-kendaraan").html(response.error.type_kendaraan_id);
                    } else {
                        $("#type_kendaraan_id").removeClass('is-invalid');
                        $("#error-type-kendaraan").html('');
                    }
                    if (response.error.merk_kendaraan) {
                        $("#merk_kendaraan").addClass('is-invalid');
                        $(".error-merk-kendaraan").html(response.error.merk_kendaraan);
                    } else {
                        $("#merk_kendaraan").removeClass('is-invalid');
                        $(".error-merk-kendaraan").html('');
                    }
                    if (response.error.nomor_kendaraan) {
                        $("#nomor_kendaraan").addClass('is-invalid');
                        $(".error-nomor-kendaraan").html(response.error.nomor_kendaraan);
                    } else {
                        $("#nomor_kendaraan").removeClass('is-invalid');
                        $(".error-nomor-kendaraan").html('');
                    }
                    if (response.error.warna_kendaraan) {
                        $("#warna_kendaraan").addClass('is-invalid');
                        $("#error-warna-kendaraan").html(response.error.warna_kendaraan);
                    } else {
                        $("#warna_kendaraan").removeClass('is-invalid');
                        $("#error-warna-kendaraan").html('');
                    }
                    // end kendaraan
                    // lokasi_penindakan
                    if (response.error.provinsi_id) {
                        $("#provinsi_id").addClass('is-invalid');
                        $(".error-provinsi").html(response.error.provinsi_id);
                    } else {
                        $("#provinsi_id").removeClass('is-invalid');
                        $(".error-provinsi").html('');
                    }
                    if (response.error.kota_id) {
                        $("#kota_id").addClass('is-invalid');
                        $(".error-kota").html(response.error.kota_id);
                    } else {
                        $("#kota_id").removeClass('is-invalid');
                        $(".error-kota").html('');
                    }
                    if (response.error.kecamatan_id) {
                        $("#kecamatan_id").addClass('is-invalid');
                        $(".error-kecamatan").html(response.error.kecamatan_id);
                    } else {
                        $("#kecamatan_id").removeClass('is-invalid');
                        $(".error-kecamatan").html('');
                    }
                    if (response.error.nama_jalan) {
                        $("#nama_jalan").addClass('is-invalid');
                        $(".error-nama-jalan").html(response.error.nama_jalan);
                    } else {
                        $("#nama_jalan").removeClass('is-invalid');
                        $(".error-nama-jalan").html('');
                    }
                    // end Lokasi Penindakan


                } else {
                    Swal.fire({
                        icon: 'success',
                        title: `${response.success}`
                    });
                    setTimeout(function() {
                        document.location.href = '/petugas/data_penindakan';
                    }, 1000);
                }
            },
            error: function() {
                $(".save").html('Kirim');
                $(".save").prop('disable', false);
                Swal.fire({
                    icon: 'error',
                    title: `Data Belum Tersimpan!`
                });
            }
        });
    }
</script>

<?= $this->endSection(); ?>