<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<main id="main" class="main">

    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">PAGES</li>
                <li class="breadcrumb-item"><a href="/admin/angkut_motor"><?= $title ?></a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $title ?></h5>
                        <p>
                            <button class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#smallModal">Tambah Angkut Motor</button>
                        </p>

                        <!-- Table with stripped rows -->
                        <div class="table-responsive">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">UKPD</th>
                                        <th scope="col">Jenis Penindakan</th>
                                        <th scope="col">Nomor Kendaraan</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($angkut_motor as $data) : ?>
                                        <tr>
                                            <th scope="row"><?= $no++ ?> </th>

                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->

<!-- Modal Tambah UKPD -->
<div class="modal fade" id="smallModal" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Angkut Motor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form_add" autocomplete="off">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label for="ukpd_id" class="col-form-label">UKPD:</label>
                        <select class="form-select" name="ukpd_id" id="ukpd_id">
                            <option value="">--Silahkan Pilih--</option>
                            <?php foreach ($ukpd as $ukpd) : ?>
                                <option value="<?= $ukpd->id ?>"><?= $ukpd->ukpd ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback error-ukpd">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="jenis_penindakan_id" class="col-form-label">Jenis Penindakan:</label>
                        <select class="form-select" name="jenis_penindakan_id" id="jenis_penindakan_id">
                            <option value="">--Silahkan Pilih--</option>
                            <?php foreach ($jenis_penindakan as $jenis_penindakan) : ?>
                                <option value="<?= $jenis_penindakan->id ?>"><?= $jenis_penindakan->jenis_penindakan ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback error-penindakan">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="unit_id" class="col-form-label">Unit / Regu:</label>
                        <select class="form-select" name="unit_id" id="unit_id" disabled>
                            <option value="">--Silahkan Pilih--</option>
                            <?php foreach ($unit_regu as $unit_regu) : ?>
                                <option value="<?= $unit_regu->id ?>"><?= $unit_regu->unit_regu ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback error-unit">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nopol" class="col-form-label">Nomor Kendaraan:</label>
                        <input type="text" class="form-control" id="nopol" name="nopol" placeholder="cth : b 1234 aa">
                        <div class="invalid-feedback error-nomor-kendaraan">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="merk_kendaraan" class="col-form-label">Merk Kendaraan:</label>
                        <input type="text" class="form-control" id="merk_kendaraan" name="merk_kendaraan">
                        <div class="invalid-feedback error-merk-kendaraan">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="warna_kendaraan" class="col-form-label">Warna Kendaraan:</label>
                        <input type="text" class="form-control" id="warna_kendaraan" name="warna_kendaraan">
                        <div class="invalid-feedback error-warna-kendaraan">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_pelanggaran_angkut" class="col-form-label">Tanggal Pelanggaran:</label>
                        <input type="date" class="form-control" id="tanggal_pelanggaran_angkut" name="tanggal_pelanggaran_angkut" value="<?= date('Y-m-d') ?>">
                        <div class=" invalid-feedback error-tanggal">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="jam_pelanggaran_angkut" class="col-form-label">Jam Pelanggaran:</label>
                        <input type="time" class="form-control" id="jam_pelanggaran_angkut" name="jam_pelanggaran_angkut" value="<?= date('H:i') ?>">
                        <div class="invalid-feedback error-jam">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="provinsi_id" class="col-form-label">Provinsi:</label>
                        <select class="form-select" name="provinsi_id" id="provinsi_id">
                            <option value="">--Silahkan Pilih--</option>
                            <?php foreach ($provinsi as $provinsi) : ?>
                                <option value="<?= $provinsi->id ?>"><?= $provinsi->provinsi ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback error-provinsi">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kota_id" class="col-form-label">Kota:</label>
                        <select class="form-select" name="kota_id" id="kota_id" disabled>
                            <option value="">--Silahkan Pilih--</option>

                        </select>
                        <div class="invalid-feedback error-kota">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="kecamatan_id" class="col-form-label">kecamatan:</label>
                        <select class="form-select" name="kecamatan_id" id="kecamatan_id" disabled>
                            <option value="">--Silahkan Pilih--</option>

                        </select>
                        <div class="invalid-feedback error-kecamatan">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="lokasi_angkut" class="col-form-label">Lokasi Penindakan:</label>
                        <input type="text" class="form-control" id="lokasi_angkut" name="lokasi_angkut" placeholder="cth : MH Thamrin">
                        <div class="invalid-feedback error-lokasi-angkut">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nama_pemilik" class="col-form-label">Nama Pemilik:</label>
                        <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik">
                        <div class="invalid-feedback error-nama-pemilik">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="alamat_pemilik" class="col-form-label">Alamat Pemilik:</label>
                        <input type="text" class="form-control" id="alamat_pemilik" name="alamat_pemilik">
                        <div class="invalid-feedback error-alamat-pemilik">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tempat_penyimpanan_id" class="col-form-label">Tempat Penyimpanan:</label>
                        <select class="form-select" name="tempat_penyimpanan_id" id="tempat_penyimpanan_id" disabled>
                            <option value="">--Silahkan Pilih--</option>

                        </select>
                        <div class="invalid-feedback error-tempat-penyimpanan">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="foto_kendaraan_angkut" class="col-form-label">Foto Kendaraan:</label>
                        <input type="file" class="form-control" id="foto_kendaraan_angkut" name="foto_kendaraan_angkut">
                        <div class="invalid-feedback error-foto">

                        </div>
                    </div>



                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> <i class="bi bi-x-lg"></i> Batal</button>
                        <button type="submit" class="btn btn-primary save"> Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><!-- End tambah Modal-->

<!-- Modal hapus UKPD -->
<div class="modal fade" id="deleteModal" tabindex="0">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete OPS Cabut Pentil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="delete_form">
                    <?= csrf_field(); ?>
                    <input type="hidden" class="form-control" id="id_delete" name="id">
                    <div class="modal-body">
                        <p>Apakah Anda Yakin ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal"> <i class="bi bi-x-lg"></i> Batal</button>
                        <button type="submit" class="btn btn-danger button_delete"> <i class="bi bi-trash"></i> Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><!-- End hapus Modal-->

<!-- Modal Edit UKPD -->
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data OCP</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit_form" autocomplete="off">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="id_edit" name="id">
                        <input type="hidden" class="form-control" id="foto_lama" name="foto_lama">
                        <label for="ukpd_id_edit" class="col-form-label">UKPD:</label>
                        <select name="ukpd_id" id="ukpd_id_edit" class="form-select">
                            <option value="">--silahkan pilih--</option>
                        </select>
                        <div class="invalid-feedback error-ukpd-edit">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="jenis_penindakan_id_edit" class="col-form-label">Jenis Penindakan:</label>
                        <select name="jenis_penindakan_id" id="jenis_penindakan_id_edit" class="form-select">
                            <option value="">--silahkan pilih--</option>
                        </select>
                        <div class="invalid-feedback error-penindakan-edit">

                        </div>

                    </div>
                    <div class="form-group">
                        <label for="unit_id_edit" class="col-form-label">Unit / Regu:</label>
                        <select name="unit_id" id="unit_id_edit" class="form-select">
                            <option value="">--silahkan pilih--</option>
                        </select>
                        <div class="invalid-feedback error-unit-edit">

                        </div>

                    </div>
                    <div class="form-group">
                        <label for="nomor_kendaraan_ocp_edit" class="col-form-label">Nomor Kendaraan OCP:</label>
                        <input type="text" name="nomor_kendaraan_ocp" id="nomor_kendaraan_ocp_edit" class="form-control">
                        <div class="invalid-feedback error-nomor-kendaraan-edit">

                        </div>

                    </div>
                    <div class="form-group">
                        <label for="provinsi_id_edit" class="col-form-label">Provinsi:</label>
                        <select name="provinsi_id" id="provinsi_id_edit" class="form-select">
                            <option value="<?= $provinsi->id ?>"><?= $provinsi->provinsi ?></option>
                        </select>
                        <div class="invalid-feedback error-provinsi-edit">

                        </div>

                    </div>
                    <div class="form-group">
                        <label for="kota_id_edit" class="col-form-label">Kota:</label>
                        <select name="kota_id" id="kota_id_edit" class="form-select">
                            <option value="">--silahkan pilih--</option>

                        </select>
                        <div class="invalid-feedback error-kecamatan-edit">

                        </div>

                    </div>
                    <div class="form-group">
                        <label for="kecamatan_id_edit" class="col-form-label">Kecamatan:</label>
                        <select name="kecamatan_id" id="kecamatan_id_edit" class="form-select">
                            <option value="">--silahkan pilih--</option>

                        </select>
                        <div class="invalid-feedback error-kecamatan-edit">

                        </div>

                    </div>

                    <div class="form-group">
                        <label for="lokasi_penindakan_edit" class="col-form-label">Lokasi Penindakan:</label>
                        <input type="text" name="lokasi_penindakan" id="lokasi_penindakan_edit" class="form-control">
                        <div class="invalid-feedback error-lokasi-penindakan-edit">

                        </div>

                    </div>
                    <div class="form-group">
                        <label for="tanggal_ocp_edit" class="col-form-label">Tanggal Penindakan</label>
                        <input type="text" name="tanggal_ocp" id="tanggal_ocp_edit" class="form-control">
                        <div class="invalid-feedback error-tanggal-edit">

                        </div>

                    </div>
                    <div class="form-group">
                        <label for="jam_ocp_edit" class="col-form-label">Jam Penindakan:</label>
                        <input type="text" name="jam_ocp" id="jam_ocp_edit" class="form-control">
                        <div class="invalid-feedback error-tanggal-edit">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="foto_penindakan_edit" class="col-form-label">Foto Penindakan:</label>
                        <input type="file" name="foto_penindakan" id="foto_penindakan_edit" class="form-control">
                        <div class="invalid-feedback error-foto-edit">

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> <i class="bi bi-x-lg"></i> Batal</button>
                        <button type="submit" class="btn btn-primary update"><i class="bi bi-box-arrow-in-right"></i> Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><!-- End Edit Modal-->

<script src="/assets/vendor/jquery/jquery.js"></script>

<script>
    $(document).ready(function() {
        $('#ukpd_id').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#smallModal')
        });
        $('#jenis_penindakan_id').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#smallModal')
        });
        $('#provinsi_id').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#smallModal')
        });
        $('#kota_id').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#smallModal')
        });
        $('#unit_id').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#smallModal')
        });
        $('#kecamatan_id').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#smallModal')
        });
        $('#tempat_penyimapan_id').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#smallModal')
        });

        $('#ukpd_id_edit').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#editModal')
        });
        $('#jenis_penindakan_id_edit').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#editModal')
        });
        $('#provinsi_id_edit').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#editModal')
        });
        $('#kota_id_edit').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#editModal')
        });
        $('#kecamatan_id_edit').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#editModal')
        });
        $('#unit_id_edit').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#editModal')
        });

    });

    $(document).on('change', "#ukpd_id", function(e) {
        e.preventDefault();
        let ukpd_id = $(this).val();
        $.ajax({
            url: '/admin/angkut_motor/getUnit',
            method: 'get',
            dataType: 'JSON',
            data: {
                ukpd_id: ukpd_id,
            },
            success: function(response) {


                if (response.unit.length > 0) {
                    let unit = `<option value = ""> --Silahkan Pilih-- </option>`
                    response.unit.forEach(function(e) {
                        unit += `<option value ="${e.id}"> ${e.unit_regu} </option>`;
                    })
                    $("#unit_id").html(unit);
                    $("#unit_id").removeAttr('disabled');
                } else {
                    let unit = `<option value = ""> --Silahkan Pilih-- </option>`;
                    $("#unit_id").html(unit);
                    $("#unit_id").attr('disabled', 'disabled');
                }

                if (response.tempat_penyimpanan.length > 0) {
                    let tempat_penyimpanan_id = `<option value = ""> --Silahkan Pilih-- </option>`
                    response.tempat_penyimpanan.forEach(function(e) {
                        tempat_penyimpanan_id += `<option value ="${e.id}"> ${e.tempat_penyimpanan} </option>`;
                    })
                    $("#tempat_penyimpanan_id").html(tempat_penyimpanan_id);
                    $("#tempat_penyimpanan_id").removeAttr('disabled');
                } else {
                    let unit = `<option value = ""> --Silahkan Pilih-- </option>`;
                    $("#tempat_penyimpanan_id").html(tempat_penyimapan_id);
                    $("#tempat_penyimpanan_id").attr('disabled', 'disabled');
                }




            }
        });
    });

    $(document).on('change', "#provinsi_id", function(e) {
        e.preventDefault();
        let provinsi_id = $(this).val();
        $.ajax({
            url: '/admin/angkut_motor/getKota',
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
            url: '/admin/angkut_motor/getKecamatan',
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


    $("#form_add").submit(function(e) {
        e.preventDefault();
        let ukpd_id = $('#ukpd_id').val();
        let jenis_penindakan_id = $('#jenis_penindakan_id').val();
        let unit_id = $('#unit_id').val();
        let nopol = $('#nopol').val();
        let merk_kendaraan = $('#merk_kendaraan').val();
        let warna_kendaraan = $('#warna_kendaraan').val();
        let tanggal_pelanggaran_angkut = $('#tanggal_pelanggaran_angkut').val();
        let jam_pelanggaran_angkut = $('#jam_pelanggaran_angkut').val();
        let provinsi_id = $('#provinsi_id').val();
        let kota_id = $('#kota_id').val();
        let kecamatan_id = $('#kecamatan_id').val();
        let lokasi_angkut = $('#lokasi_angkut').val();
        let nama_pengemudi = $('#nama_pengemudi').val();
        let alamat_pengemudi = $('#alamat_pengemudi').val();
        let tempat_penyimpanan_id = $('#tempat_penyimpanan_id').val();
        let foto_kendaraan_angkut = $('#foto_kendaraan_angkut').val();

        let formData = new FormData(this);

        formData.append('ukpd_id', ukpd_id);
        formData.append('jenis_penindakan_id', jenis_penindakan_id);
        formData.append('unit_id', unit_id);
        formData.append('nopol', nopol);
        formData.append('merk_kendaraan', merk_kendaraan);
        formData.append('warna_kendaraan', warna_kendaraan);
        formData.append('tanggal_pelanggaran_angkut', tanggal_pelanggaran_angkut);
        formData.append('jam_pelanggaran_angkut', jam_pelanggaran_angkut);
        formData.append('provinsi_id', provinsi_id);
        formData.append('kota_id', kota_id);
        formData.append('kecamatan_id', kecamatan_id);
        formData.append('lokasi_angkut', lokasi_angkut);
        formData.append('nama_pengemudi', nama_pengemudi);
        formData.append('alamat_pengemudi', alamat_pengemudi);
        formData.append('tempat_penyimpanan_id', tempat_penyimpanan_id);
        formData.append('foto_kendaraan_angkut', foto_kendaraan_angkut);

        $.ajax({
            url: '/admin/angkut_motor/insert',
            data: formData,
            dataType: 'json',
            enctype: 'multipart/form-data',
            type: 'POST',
            contentType: false,
            processData: false,
            cache: false,
            beforeSend: function() {
                $('.save').html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>Loading...");
                $('.save').prop('disabled', true);
            },
            success: function(response) {
                $('.save').html('Kirim');
                $('.save').prop('disabled', false);
                if (response.error) {
                    if (response.error.ukpd_id) {
                        $("#ukpd_id").addClass('is-invalid');
                        $(".error-ukpd").html(response.error.ukpd_id);
                    } else {
                        $("#ukpd_id").removeClass('is-invalid');
                        $(".error-ukpd").html('');
                    }
                    if (response.error.jenis_penindakan_id) {
                        $("#jenis_penindakan_id").addClass('is-invalid');
                        $(".error-jenis-penindakan").html(response.error.jenis_penindakan_id);
                    } else {
                        $("#jenis_penindakan_id").removeClass('is-invalid');
                        $(".error-jenis-penindakan").html('');
                    }
                    if (response.error.unit_id) {
                        $("#unit_id").addClass('is-invalid');
                        $(".error-unit").html(response.error.unit_id);
                    } else {
                        $("#unit_id").removeClass('is-invalid');
                        $(".error-unit").html('');
                    }
                    if (response.error.nopol) {
                        $("#nopol").addClass('is-invalid');
                        $(".error-nomor-kendaraan").html(response.error.nopol);
                    } else {
                        $("#nopol").removeClass('is-invalid');
                        $(".error-nomor-kendaraan").html('');
                    }

                    if (response.error.merk_kendaraan) {
                        $("#merk_kendaraan").addClass('is-invalid');
                        $(".error-merk-kendaraan").html(response.error.merk_kendaraan);
                    } else {
                        $("#merk_kendaraan").removeClass('is-invalid');
                        $(".error-merk-kendaraan").html('');
                    }

                    if (response.error.warna_kendaraan) {
                        $("#warna_kendaraan").addClass('is-invalid');
                        $(".error-warna-kendaraan").html(response.error.warna_kendaraan);
                    } else {
                        $("#warna_kendaraan").removeClass('is-invalid');
                        $(".error-warna-kendaraan").html('');
                    }
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
                    if (response.error.lokasi_angkut) {
                        $("#lokasi_angkut").addClass('is-invalid');
                        $(".error-lokasi-angkut").html(response.error.lokasi_angkut);
                    } else {
                        $("#lokasi_angkut").removeClass('is-invalid');
                        $(".error-lokasi-angkut").html('');
                    }
                    if (response.error.nama_pengemudi) {
                        $("#nama_pengemudi").addClass('is-invalid');
                        $(".error-nama-pengemudi").html(response.error.nama_pengemudi);
                    } else {
                        $("#nama_pengemudi").removeClass('is-invalid');
                        $(".error-nama-pengemudi").html('');
                    }
                    if (response.error.alamat_pengemudi) {
                        $("#alamat_pengemudi").addClass('is-invalid');
                        $(".error-alamat-pengemudi").html(response.error.alamat_pengemudi);
                    } else {
                        $("#alamat_pengemudi").removeClass('is-invalid');
                        $(".error-alamat-pengemudi").html('');
                    }
                    if (response.error.tempat_penyimapan_id) {
                        $("#tempat_penyimapan_id").addClass('is-invalid');
                        $(".error-tempat-penyimpanan").html(response.error.tempat_penyimapan_id);
                    } else {
                        $("#tempat_penyimapan_id").removeClass('is-invalid');
                        $(".error-tempat-penyimpanan").html('');
                    }
                    if (response.error.foto_kendaraan_angkut) {
                        $("#foto_kendaraan_angkut").addClass('is-invalid');
                        $(".error-foto").html(response.error.foto_kendaraan_angkut);
                    } else {
                        $("#foto_kendaraan_angkut").removeClass('is-invalid');
                        $(".error-foto").html('');
                    }

                } else {
                    Swal.fire({
                        icon: 'success',
                        title: `${response.success}`,
                    });
                    setTimeout(function() {
                        location.reload();
                    }, 1000)
                }
            },
            error: function() {
                $('.save').html('Kirim');
                $('.save').prop('disabled', false);
            }
        });
    });

    $(document).on('click', "#delete", function(e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        $.ajax({
            url: '/admin/ocp/edit',
            method: 'get',
            dataType: 'JSON',
            data: {
                id: id,
            },
            success: function(response) {
                $("#id_delete").val(response.ocp.id);
            }
        });
    });

    $("#delete_form").submit(function(e) {
        e.preventDefault();
        let id = $("#id_delete").val();
        $.ajax({
            url: '/admin/ocp/delete',
            method: 'post',
            dataType: 'JSON',
            data: {
                id: id,
            },
            beforeSend: function() {
                $('.button_delete').html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>Loading...");
                $('.button_delete').prop('disabled', true);
            },
            success: function(response) {
                $('.button_delete').html('<i class="bi bi-trash"></i> Delete');
                $('.button_delete').prop('disabled', false);
                Swal.fire({
                    icon: 'success',
                    title: `${response.success}`,
                });
                setTimeout(function() {
                    location.reload(true);
                }, 1000)
            },
            error: function(response) {
                $('.button_delete').html('<i class="bi bi-trash"></i> Delete');
                $('.button_delete').prop('disabled', false);
                alert('Data Gagal di Hapus');
            }
        });
    });

    $(document).on('click', "#edit", function(e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        $.ajax({
            url: '/admin/ocp/edit',
            method: 'get',
            dataType: 'JSON',
            data: {
                id: id,
            },
            success: function(response) {
                $("#id_edit").val(response.ocp.id);
                $("#foto_lama").val(response.ocp.foto_penindakan);
                $("#lokasi_penindakan_edit").val(response.ocp.lokasi_penindakan);

                let ukpd_id = `<option value=""> Silahkan Pilih </option>`;

                response.ukpd.forEach(function(e) {
                    if (e.id == response.ocp.ukpd_id) {
                        ukpd_id += `<option value="${e.id}" selected> ${e.ukpd} </option>`;
                    } else {
                        ukpd_id += `<option value="${e.id}"> ${e.ukpd} </option>`;
                    }
                });

                $("#ukpd_id_edit").html(ukpd_id);
                $("#ukpd_id_edit").val(response.ocp.ukpd_id).trigger('change');

                let jenis_penindakan_id = `<option value=""> Silahkan Pilih </option>`;

                response.jenis_penindakan.forEach(function(e) {
                    if (e.id == response.ocp.jenis_penindakan_id) {
                        jenis_penindakan_id += `<option value="${e.id}" selected> ${e.jenis_penindakan} </option>`;
                    } else {
                        jenis_penindakan_id += `<option value="${e.id}"> ${e.jenis_penindakan} </option>`;
                    }
                });

                $("#jenis_penindakan_id_edit").html(jenis_penindakan_id);
                $("#jenis_penindakan_id_edit").val(response.ocp.jenis_penindakan_id).trigger('change');


                $("#nomor_kendaraan_ocp_edit").val(response.ocp.nomor_kendaraan_ocp);
                $("#tanggal_ocp_edit").val(response.ocp.tanggal_ocp);
                $("#jam_ocp_edit").val(response.ocp.jam_ocp);

                let unit_id_data = `<option value=""> Silahkan Pilih </option>`;

                response.unit_regu.forEach(function(e) {
                    if (e.id == response.ocp.unit_id) {
                        unit_id_data += `<option value="${e.id}" selected> ${e.unit_regu} </option>`;
                    } else {
                        unit_id_data += `<option value="${e.id}"> ${e.unit_regu} </option>`;
                    }
                });

                $("#unit_id_edit").html(unit_id_data);
                $("#unit_id_edit").val(response.ocp.unit_id).trigger('change');

                let kota_data = `<option value=""> Silahkan Pilih </option>`;

                response.kota.forEach(function(e) {
                    if (e.id == response.ocp.kota_id) {
                        kota_data += `<option value="${e.id}" selected> ${e.kabupaten_kota} </option>`;
                    } else {
                        kota_data += `<option value="${e.id}"> ${e.kabupaten_kota} </option>`;
                    }
                });

                $("#kota_id_edit").html(kota_data);
                $("#kota_id_edit").val(response.ocp.kota_id).trigger('change');

                let kecamatan_data = `<option value=""> Silahkan Pilih </option>`;

                response.kecamatan.forEach(function(e) {
                    if (e.id == response.ocp.kecamatan_id) {
                        kecamatan_data += `<option value="${e.id}" selected> ${e.kecamatan} </option>`;
                    } else {
                        kecamatan_data += `<option value="${e.id}"> ${e.kecamatan} </option>`;
                    }
                });

                $("#kecamatan_id_edit").html(kecamatan_data);
                $("#kecamatan_id_edit").val(response.ocp.kecamatan_id).trigger('change');


            }
        });
    });

    $(document).on('change', "#provinsi_id_edit", function(e) {
        e.preventDefault();
        let provinsi_id = $(this).val();
        $.ajax({
            url: '/admin/ocp/getKota',
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
                    $("#kota_id_edit").html(kota);
                    $("#kota_id_edit").removeAttr('disabled');
                } else {
                    let kota = `<option value = ""> --Silahkan Pilih-- </option>`;
                    $("#kota_id_edit").html(kota);
                    $("#kota_id_edit").attr('disabled', 'disabled');
                }
            }
        });
    });

    $("#edit_form").submit(function(e) {
        e.preventDefault();
        let id = $("#id_edit").val();
        let foto_lama = $("#foto_lama").val();
        let ukpd_id = $('#ukpd_id_edit').val();
        let jenis_penindakan_id = $('#jenis_penindakan_id_edit').val();
        let unit_id = $('#unit_id_edit').val();
        let nomor_kendaraan_ocp = $('#nomor_kendaraan_ocp_edit').val();
        let provinsi_id = $('#provinsi_id_edit').val();
        let kota_id = $('#kota_id_edit').val();
        let kecamatan_id = $('#kecamatan_id_edit').val();
        let tanggal_ocp = $('#tanggal_ocp_edit').val();
        let jam_ocp = $('#jam_ocp_edit').val();
        let lokasi_penindakan = $('#lokasi_penindakan_edit').val();
        let foto_penindakan = $('#foto_penindakan_edit').val();

        let formData = new FormData(this);

        formData.append('id', id);
        formData.append('foto_lama', foto_lama);
        formData.append('ukpd_id', ukpd_id);
        formData.append('jenis_penindakan_id', jenis_penindakan_id);
        formData.append('unit_id', unit_id);
        formData.append('nomor_kendaraan_ocp', nomor_kendaraan_ocp);
        formData.append('provinsi_id', provinsi_id);
        formData.append('kota_id', kota_id);
        formData.append('tanggal_ocp', tanggal_ocp);
        formData.append('jam_ocp', jam_ocp);
        formData.append('kecamatan_id', kecamatan_id);
        formData.append('lokasi_penindakan', lokasi_penindakan);
        formData.append('foto_penindakan', foto_penindakan);
        $.ajax({
            url: '/admin/ocp/update',
            data: formData,
            dataType: 'json',
            enctype: 'multipart/form-data',
            type: 'POST',
            contentType: false,
            processData: false,
            cache: false,
            beforeSend: function() {
                $('.update').html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>Loading...");
                $('.update').prop('disabled', true);
            },
            success: function(response) {
                $('.update').html('<i class="bi bi-box-arrow-in-right"></i> Kirim');
                $('.update').prop('disabled', false);

                Swal.fire({
                    icon: 'success',
                    title: `${response.success}`,
                });
                setTimeout(function() {
                    location.reload(true);
                }, 1000)
            },
            error: function() {
                Swal.fire({
                    icon: 'error',
                    title: `Data Gagal di Ubah!`,
                });
                $('.update').prop('disabled', false);
            }
        });
    });
</script>
<?= $this->endSection(); ?>