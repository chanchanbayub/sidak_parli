<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<main id="main" class="main">

    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">PAGES</li>
                <li class="breadcrumb-item"><a href="/petugas/ocp"><?= $title ?></a></li>
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
                            <button class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#smallModal">Tambah OCP</button>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($ocp as $data) : ?>
                                        <tr>
                                            <th scope="row"><?= $no++ ?> </th>
                                            <td><?= $data->ukpd ?> </td>
                                            <td><?= $data->jenis_penindakan ?> </td>
                                            <td> <a href="ocp/detail/<?= $data->id ?>"> <?= $data->nomor_kendaraan_ocp ?> </a> </td>
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
                <h5 class="modal-title">Tambah OPS Cabut Pentil</h5>
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
                                <?php if ($ukpd->id == session()->get('ukpd_id')) : ?>
                                    <option value="<?= $ukpd->id ?>" selected><?= $ukpd->ukpd ?></option>
                                <?php else : ?>
                                    <option value="<?= $ukpd->id ?>"><?= $ukpd->ukpd ?></option>
                                <?php endif; ?>
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
                        <select class="form-select" name="unit_id" id="unit_id">
                            <option value="">--Silahkan Pilih--</option>
                            <?php foreach ($unit_regu as $unit_regu) : ?>
                                <?php if ($unit_regu->id == session()->get('unit_id')) : ?>
                                    <option value="<?= $unit_regu->id ?>" selected><?= $unit_regu->unit_regu ?></option>
                                <?php else : ?>
                                    <option value="<?= $unit_regu->id ?>"><?= $unit_regu->unit_regu ?></option>
                                <?php endif; ?>

                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback error-unit">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nomor_kendaraan_ocp" class="col-form-label">Nomor Kendaraan:</label>
                        <input type="text" class="form-control" id="nomor_kendaraan_ocp" name="nomor_kendaraan_ocp" placeholder="cth : b 1234 aa">
                        <div class="invalid-feedback error-nomor-kendaraan">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_ocp" class="col-form-label">Tanggal OCP:</label>
                        <input type="date" class="form-control" id="tanggal_ocp" name="tanggal_ocp" value="<?= date('Y-m-d') ?>">
                        <div class=" invalid-feedback error-tanggal">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="jam_ocp" class="col-form-label">Jam OCP:</label>
                        <input type="time" class="form-control" id="jam_ocp" name="jam_ocp" value="<?= date('H:i') ?>">
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
                        <label for="lokasi_penindakan" class="col-form-label">Lokasi Penindakan:</label>
                        <input type="text" class="form-control" id="lokasi_penindakan" name="lokasi_penindakan" placeholder="cth : MH Thamrin">
                        <div class="invalid-feedback error-lokasi-penindakan">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="foto_penindakan" class="col-form-label">Foto Penindakan:</label>
                        <input type="file" class="form-control" id="foto_penindakan" name="foto_penindakan">
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
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Jenis Penindakan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit_penindakan" autocomplete="off">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="id_edit" name="id">
                        <label for="jenis_penindakan" class="col-form-label">Jenis Penindakan:</label>
                        <input type="text" class="form-control" id="jenis_penindakan_edit" name="jenis_penindakan">
                        <div class="invalid-feedback error-penindakan-edit">

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> <i class="bi bi-x-lg"></i> Batal</button>
                        <button type="submit" class="btn btn-primary update"> Kirim</button>
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
    });

    $(document).on('change', "#provinsi_id", function(e) {
        e.preventDefault();
        let provinsi_id = $(this).val();
        $.ajax({
            url: '/petugas/ocp/getKota',
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
            url: '/petugas/ocp/getKecamatan',
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
        let nomor_kendaraan_ocp = $('#nomor_kendaraan_ocp').val();
        let provinsi_id = $('#provinsi_id').val();
        let kota_id = $('#kota_id').val();
        let kecamatan_id = $('#kecamatan_id').val();
        let tanggal_ocp = $('#tanggal_ocp').val();
        let jam_ocp = $('#jam_ocp').val();
        let lokasi_penindakan = $('#lokasi_penindakan').val();
        let foto_penindakan = $('#foto_penindakan').val();

        let formData = new FormData(this);

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
            url: '/petugas/ocp/insert',
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
                    if (response.error.nomor_kendaraan_ocp) {
                        $("#nomor_kendaraan_ocp").addClass('is-invalid');
                        $(".error-nomor-kendaraan").html(response.error.nomor_kendaraan_ocp);
                    } else {
                        $("#nomor_kendaraan_ocp").removeClass('is-invalid');
                        $(".error-nomor-kendaraan").html('');
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
                    if (response.error.lokasi_penindakan) {
                        $("#lokasi_penindakan").addClass('is-invalid');
                        $(".error-lokasi-penindakan").html(response.error.lokasi_penindakan);
                    } else {
                        $("#lokasi_penindakan").removeClass('is-invalid');
                        $(".error-lokasi-penindakan").html('');
                    }
                    if (response.error.foto_penindakan) {
                        $("#foto_penindakan").addClass('is-invalid');
                        $(".error-foto").html(response.error.foto_penindakan);
                    } else {
                        $("#foto_penindakan").removeClass('is-invalid');
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

    $("#edit_penindakan").submit(function(e) {
        e.preventDefault();
        let id = $('#id_edit').val();
        let jenis_penindakan = $('#jenis_penindakan_edit').val();
        $.ajax({
            url: '/admin/jenis_penindakan/update',
            method: 'post',
            dataType: 'JSON',
            data: {
                id: id,
                jenis_penindakan: jenis_penindakan,
            },
            beforeSend: function() {
                $('.update').html('<i class="bi bi-box-arrow-in-right"></i>');
                $('.update').prop('disabled', true);
            },
            success: function(response) {
                $('.update').html('<i class="bi bi-box-arrow-in-right"></i> Kirim');
                $('.update').prop('disabled', false);
                if (response.error) {
                    if (response.error.jenis_penindakan) {
                        $("#jenis_penindakan_edit").addClass('is-invalid');
                        $(".error-penindakan-edit").html(response.error.jenis_penindakan);
                    } else {
                        $("#jenis_penindakan_edit").removeClass('is-invalid');
                        $(".error-penindakan-edit").html('');
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