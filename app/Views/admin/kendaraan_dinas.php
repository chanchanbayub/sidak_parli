<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<main id="main" class="main">

    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">PAGES</li>
                <li class="breadcrumb-item"><a href="/admin/kendaraan_dinas"><?= $title ?></a></li>
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
                            <button class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#smallModal">Tambah KDO</button>
                        </p>

                        <!-- Table with stripped rows -->
                        <div class="table-responsive">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Merk Kendaraan</th>
                                        <th scope="col">Nomor Kendaraan</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($kendaraan_dinas as $data) : ?>
                                        <tr>
                                            <th scope="row"><?= $no++ ?>.</th>
                                            <td><?= $data->merk_kendaraan_dinas ?> </td>
                                            <td><?= $data->nomor_kendaraan_dinas ?> </td>
                                            <td>
                                                <?php if (session()->get('role_id') == 1) : ?>
                                                    <button class="btn btn-sm btn-danger" id="delete" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="<?= $data->id ?>" type="button">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                <?php endif; ?>
                                                <button class="btn btn-sm btn-warning" id="edit" data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?= $data->id ?>" type="button">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>
                                                <a href="/admin/kendaraan_dinas/detail/<?= $data->id ?>" class="btn btn-sm btn-primary"><i class="bi bi-eye"></i></a>
                                            </td>
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
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Kendaraan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="add_form" autocomplete="off">
                    <?= csrf_field(); ?>

                    <div class="form-group">
                        <label for="ukpd_id" class="col-form-label">UKPD :</label>
                        <select name="ukpd_id" id="ukpd_id" class="form-select">
                            <option value=""> -- Silahkan Pilih --</option>
                            <?php foreach ($ukpd as $data) : ?>
                                <option value="<?= $data->id ?>"> <?= $data->ukpd ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback error-ukpd">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nomor_kendaraan_dinas" class="col-form-label">Nomor Kendaraan :</label>
                        <input type="text" class="form-control" id="nomor_kendaraan_dinas" name="nomor_kendaraan_dinas">
                        <div class="invalid-feedback error-nomor-kendaraan">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="merk_kendaraan_dinas" class="col-form-label">Merk Kendaraan :</label>
                        <input type="text" class="form-control" id="merk_kendaraan_dinas" name="merk_kendaraan_dinas">
                        <div class="invalid-feedback error-merk-kendaraan">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="unit_id" class="col-form-label">Unit / Regu :</label>
                        <select name="unit_id" id="unit_id" class="form-select">
                            <option value=""> -- Silahkan Pilih --</option>
                            <?php foreach ($unit_regu as $unit_regu) : ?>
                                <option value="<?= $unit_regu->id ?>"> <?= $unit_regu->unit_regu ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback error-unit">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="foto_kendaraan_dinas" class="col-form-label">Foto Kendaraan Dinas :</label>
                        <input type="file" class="form-control" id="foto_kendaraan_dinas" name="foto_kendaraan_dinas">
                        <div class="invalid-feedback error-foto-kendaraan">

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> <i class="bi bi-x-lg"></i> Batal</button>
                        <button type="submit" class="btn btn-primary save"> <i class="bi bi-spinner bi-spin"></i> Kirim</button>
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
                <h5 class="modal-title">Delete Jabatan</h5>
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
                <h5 class="modal-title">Edit Kendaraan Dinas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form_edit" autocomplete="off">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <input type="hidden" name="id" id="id_edit">
                        <input type="hidden" name="foto_lama" id="foto_lama">
                        <label for="ukpd_id_edit" class="col-form-label">UKPD :</label>
                        <select name="ukpd_id" id="ukpd_id_edit" class="form-select">
                            <option value=""> -- Silahkan Pilih --</option>

                        </select>
                        <div class="invalid-feedback error-ukpd-edit">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nomor_kendaraan_dinas_edit" class="col-form-label">Nomor Kendaraan :</label>
                        <input type="text" class="form-control" id="nomor_kendaraan_dinas_edit" name="nomor_kendaraan_dinas">
                        <div class="invalid-feedback error-nomor-kendaraan-edit">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="merk_kendaraan_dinas_edit" class="col-form-label">Merk Kendaraan :</label>
                        <input type="text" class="form-control" id="merk_kendaraan_dinas_edit" name="merk_kendaraan_dinas">
                        <div class="invalid-feedback error-merk-kendaraan-edit">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="unit_id_edit" class="col-form-label">Unit / Regu :</label>
                        <select name="unit_id" id="unit_id_edit" class="form-select">
                            <option value=""> -- Silahkan Pilih --</option>

                        </select>
                        <div class="invalid-feedback error-unit-edit">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="foto_kendaraan_dinas_edit" class="col-form-label">Foto Kendaraan Dinas :</label>
                        <input type="file" class="form-control" id="foto_kendaraan_dinas_edit" name="foto_kendaraan_dinas">

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> <i class="bi bi-x-lg"></i> Batal</button>
                        <button type="submit" class="btn btn-primary update"> <i class="bi bi-spinner bi-spin"></i> Kirim</button>
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
        $('#unit_id').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#smallModal')
        });

        $('#ukpd_id_edit').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#editModal')
        });
        $('#unit_id_edit').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#editModal')
        });
    })

    $("#add_form").submit(function(e) {
        e.preventDefault();
        let ukpd_id = $('#ukpd_id').val();
        let nomor_kendaraan_dinas = $('#nomor_kendaraan_dinas').val();
        let merk_kendaraan_dinas = $('#merk_kendaraan_dinas').val();
        let unit_id = $('#unit_id').val();
        let foto_kendaraan_dinas = $('#foto_kendaraan_dinas').val();

        let formData = new FormData(this);

        formData.append('ukpd_id', ukpd_id);
        formData.append('nomor_kendaraan_dinas', nomor_kendaraan_dinas);
        formData.append('merk_kendaraan_dinas', merk_kendaraan_dinas);
        formData.append('unit_id', unit_id);
        formData.append('foto_kendaraan_dinas', foto_kendaraan_dinas);

        $.ajax({
            url: '/admin/kendaraan_dinas/insert',
            data: formData,
            dataType: 'json',
            enctype: 'multipart/form-data',
            type: 'POST',
            contentType: false,
            processData: false,
            cache: false,
            beforeSend: function() {
                $('.save').html('<i class="bi bi-box-arrow-in-right"></i>');
                $('.save').prop('disabled', true);
            },
            success: function(response) {
                $('.save').html('<i class="bi bi-box-arrow-in-right"></i> Kirim');
                $('.save').prop('disabled', false);
                if (response.error) {
                    if (response.error.ukpd_id) {
                        $("#ukpd_id").addClass('is-invalid');
                        $(".error-ukpd").html(response.error.ukpd_id);
                    } else {
                        $("#ukpd_id").removeClass('is-invalid');
                        $(".error-ukpd").html('');
                    }
                    if (response.error.nomor_kendaraan_dinas) {
                        $("#nomor_kendaraan_dinas").addClass('is-invalid');
                        $(".error-nomor-kendaraan").html(response.error.nomor_kendaraan_dinas);
                    } else {
                        $("#nomor_kendaraan_dinas").removeClass('is-invalid');
                        $(".error-nomor-kendaraan").html('');
                    }
                    if (response.error.merk_kendaraan_dinas) {
                        $("#merk_kendaraan_dinas").addClass('is-invalid');
                        $(".error-merk-kendaraan").html(response.error.merk_kendaraan_dinas);
                    } else {
                        $("#merk_kendaraan_dinas").removeClass('is-invalid');
                        $(".error-merk-kendaraan").html('');
                    }
                    if (response.error.unit_id) {
                        $("#unit_id").addClass('is-invalid');
                        $(".error-unit").html(response.error.unit_id);
                    } else {
                        $("#unit_id").removeClass('is-invalid');
                        $(".error-unit").html('');
                    }
                    if (response.error.foto_kendaraan_dinas) {
                        $("#foto_kendaraan_dinas").addClass('is-invalid');
                        $(".error-foto-kendaraan").html(response.error.foto_kendaraan_dinas);
                    } else {
                        $("#foto_kendaraan_dinas").removeClass('is-invalid');
                        $(".error-foto-kendaraan").html('');
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
                    title: `Data Belum Tersimpan!`,
                });
            }
        });
    });

    $(document).on('click', "#delete", function(e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        $.ajax({
            url: '/admin/kendaraan_dinas/edit',
            method: 'get',
            dataType: 'JSON',
            data: {
                id: id,
            },
            success: function(response) {
                // console.log(response);
                $("#id_delete").val(response.kdo.id);

            }
        });
    });

    $("#delete_form").submit(function(e) {
        e.preventDefault();
        let id = $("#id_delete").val();
        $.ajax({
            url: '/admin/kendaraan_dinas/delete',
            method: 'post',
            dataType: 'JSON',
            data: {
                id: id,
            },
            beforeSend: function() {
                $('.button_delete').html('<i class="bi bi-box-arrow-in-right"></i>');
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
                    location.reload();
                }, 3000)
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
            url: '/admin/kendaraan_dinas/edit',
            method: 'get',
            dataType: 'JSON',
            data: {
                id: id,
            },
            success: function(response) {
                console.log(response);
                $("#id_edit").val(response.kdo.id);
                $("#foto_lama").val(response.kdo.foto_kendaraan_dinas);
                $("#merk_kendaraan_dinas_edit").val(response.kdo.merk_kendaraan_dinas);
                $("#nomor_kendaraan_dinas_edit").val(response.kdo.nomor_kendaraan_dinas);

                let unit_regu_data = `<option value=""> -- Silahkan Pilih --</option>`;
                response.unit_regu.forEach(function(e) {

                    if (e.id == response.kdo.unit_id) {
                        unit_regu_data += `<option value="${e.id}" selected> ${e.unit_regu} </option>`;
                    } else {
                        unit_regu_data += `<option value="${e.id}"> ${e.unit_regu} </option>`;
                    }
                });

                $("#unit_id_edit").html(unit_regu_data);
                $("#unit_id_edit").val(response.kdo.unit_id).trigger('change');

                let ukpd_data = `<option value=""> -- Silahkan Pilih --</option>`;
                response.ukpd.forEach(function(e) {

                    if (e.id == response.kdo.ukpd_id) {
                        ukpd_data += `<option value="${e.id}" selected> ${e.ukpd} </option>`;
                    } else {
                        ukpd_data += `<option value="${e.id}"> ${e.ukpd} </option>`;
                    }
                });

                $("#ukpd_id_edit").html(ukpd_data);
                $("#ukpd_id_edit").val(response.kdo.ukpd_id).trigger('change');
            }
        });
    });

    $("#form_edit").submit(function(e) {
        e.preventDefault();
        let ukpd_id = $('#ukpd_id_edit').val();
        let nomor_kendaraan_dinas = $('#nomor_kendaraan_dinas_edit').val();
        let merk_kendaraan_dinas = $('#merk_kendaraan_dinas_edit').val();
        let unit_id = $('#unit_id_edit').val();
        let foto_kendaraan_dinas = $('#foto_kendaraan_dinas_edit').val();

        let formData = new FormData(this);

        formData.append('ukpd_id', ukpd_id);
        formData.append('nomor_kendaraan_dinas', nomor_kendaraan_dinas);
        formData.append('merk_kendaraan_dinas', merk_kendaraan_dinas);
        formData.append('unit_id', unit_id);
        formData.append('foto_kendaraan_dinas', foto_kendaraan_dinas);

        $.ajax({
            url: '/admin/kendaraan_dinas/update',
            data: formData,
            dataType: 'json',
            enctype: 'multipart/form-data',
            type: 'POST',
            contentType: false,
            processData: false,
            cache: false,
            beforeSend: function() {
                $('.update').html('<i class="bi bi-box-arrow-in-right"></i>');
                $('.update').prop('disabled', true);
            },
            success: function(response) {
                $('.update').html('<i class="bi bi-box-arrow-in-right"></i> Kirim');
                $('.update').prop('disabled', false);
                if (response.error) {
                    if (response.error.ukpd_id) {
                        $("#ukpd_id_edit").addClass('is-invalid');
                        $(".error-ukpd").html(response.error.ukpd_id);
                    } else {
                        $("#ukpd_id_edit").removeClass('is-invalid');
                        $(".error-ukpd").html('');
                    }
                    if (response.error.nomor_kendaraan_dinas) {
                        $("#nomor_kendaraan_dinas_edit").addClass('is-invalid');
                        $(".error-nomor-kendaraan-edit").html(response.error.nomor_kendaraan_dinas);
                    } else {
                        $("#nomor_kendaraan_dinas_edit").removeClass('is-invalid');
                        $(".error-nomor-kendaraan-edit").html('');
                    }
                    if (response.error.merk_kendaraan_dinas) {
                        $("#merk_kendaraan_dinas_edit").addClass('is-invalid');
                        $(".error-merk-kendaraan-edit").html(response.error.merk_kendaraan_dinas);
                    } else {
                        $("#merk_kendaraan_dinas_edit").removeClass('is-invalid');
                        $(".error-merk-kendaraan-edit").html('');
                    }
                    if (response.error.unit_id) {
                        $("#unit_id_edit").addClass('is-invalid');
                        $(".error-unit-edit").html(response.error.unit_id);
                    } else {
                        $("#unit_id_edit").removeClass('is-invalid');
                        $(".error-unit-edit").html('');
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
                    title: `Data Belum Tersimpan!`,
                });
            }
        });
    });
</script>
<?= $this->endSection(); ?>