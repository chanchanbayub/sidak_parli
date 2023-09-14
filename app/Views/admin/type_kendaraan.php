<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<main id="main" class="main">

    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">PAGES</li>
                <li class="breadcrumb-item"><a href="/admin/type_kendaraan">TYPE KENDARAAN</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">TYPE KENDARAAN</h5>
                        <p>
                            <button class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#smallModal">Tambah Type Kendaraan</button>
                        </p>
                        <div class="table-responsive">
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Jenis Kendaraan</th>
                                        <th scope="col">Type Kendaraan</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($type_kendaraan as $data) : ?>
                                        <tr>
                                            <th scope="row"><?= $no++ ?>. </th>
                                            <td><?= $data->jenis_kendaraan ?> </td>
                                            <td><?= $data->type_kendaraan ?> </td>
                                            <td>
                                                <?php if (session()->get('role_id') == 1) : ?>
                                                    <button class="btn btn-sm btn-danger" id="delete" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="<?= $data->id ?>" type="button">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                <?php endif; ?>
                                                <button class="btn btn-sm btn-warning" id="edit" data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?= $data->id ?>" type="button">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>
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

<!-- Modal Type Kendaraan  -->
<div class="modal fade" id="smallModal" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Type Kendaraan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="tambah_type_kendaraan" autocomplete="off">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label for="jenis_kendaraan_id" class="col-form-label">Jenis Kendaraan:</label>
                        <select class="form-control" name="jenis_kendaraan_id" id="jenis_kendaraan_id">
                            <option value=""> Silahkan Pilih</option>
                            <?php foreach ($jenis_kendaraan as $data) : ?>
                                <option value="<?= $data->id ?>"><?= $data->jenis_kendaraan ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback error-jenis-kendaraan">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="type_kendaraan" class="col-form-label">Type Kendaraan:</label>
                        <input type="text" class="form-control" id="type_kendaraan" name="type_kendaraan" placeholder="cth : Pick Up">
                        <div class="invalid-feedback error-type-kendaraan">
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
                <h5 class="modal-title">Delete SPT</h5>
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
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Type Kendaraan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit_type_kendaraan" autocomplete="off">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="id_edit" name="id">
                        <label for="jenis_kendaraan_id_edit" class="col-form-label">Type Kendaraan:</label>
                        <select name="jenis_kendaraan_id" id="jenis_kendaraan_id_edit" class="form-control">
                            <option value=""></option>
                        </select>
                        <div class="invalid-feedback error-jenis-kendaraan-edit">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="type_kendaraan" class="col-form-label">Type Kendaraan:</label>
                        <input type="text" class="form-control" id="type_kendaraan_edit" name="type_kendaraan">
                        <div class="invalid-feedback error-type-kendaraan-edit">
                        </div>
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
        $('#jenis_kendaraan_id').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#smallModal')
        });

        $('#jenis_kendaraan_id_edit').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#editModal')
        });
    });

    $("#tambah_type_kendaraan").submit(function(e) {
        e.preventDefault();
        let jenis_kendaraan_id = $('#jenis_kendaraan_id').val();
        let type_kendaraan = $("#type_kendaraan").val();
        $.ajax({
            url: '/admin/type_kendaraan/insert',
            method: 'post',
            dataType: 'JSON',
            data: {
                jenis_kendaraan_id: jenis_kendaraan_id,
                type_kendaraan: type_kendaraan,
            },
            beforeSend: function() {
                $('.save').html('<i class="bi bi-box-arrow-in-right"></i>');
                $('.save').prop('disabled', true);
            },
            success: function(response) {
                $('.save').html('<i class="bi bi-box-arrow-in-right"></i> Kirim');
                $('.save').prop('disabled', false);
                if (response.error) {
                    if (response.error.jenis_kendaraan_id) {
                        $("#jenis_kendaraan_id").addClass('is-invalid');
                        $(".error-jenis-kendaraan").html(response.error.jenis_kendaraan_id);
                    } else {
                        $("#jenis_kendaraan_id").removeClass('is-invalid');
                        $(".error-jenis-kendaraan").html('');
                    }
                    if (response.error.type_kendaraan) {
                        $("#type_kendaraan").addClass('is-invalid');
                        $(".error-type-kendaraan").html(response.error.type_kendaraan);
                    } else {
                        $("#type_kendaraan").removeClass('is-invalid');
                        $(".error-type-kendaraan").html('');
                    }
                } else {
                    Swal.fire({
                        icon: 'success',
                        title: `${response.success}`,
                    });
                    setTimeout(function() {
                        location.reload();
                    }, 3000)
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
            url: '/admin/type_kendaraan/edit',
            method: 'get',
            dataType: 'JSON',
            data: {
                id: id,
            },
            success: function(response) {
                $("#id_delete").val(response.type_kendaraan.id);
            }
        });
    });

    $("#delete_form").submit(function(e) {
        e.preventDefault();
        let id = $("#id_delete").val();

        $.ajax({
            url: '/admin/type_kendaraan/delete',
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
                }, 1000)
            },
            error: function(response) {
                $('.button_delete').html('<i class="bi bi-trash"></i> Delete');
                $('.button_delete').prop('disabled', false);
                Swal.fire({
                    icon: 'error',
                    title: `Data Gagal di Hapus!`,
                });
            }
        });
    });

    $(document).on('click', "#edit", function(e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        $.ajax({
            url: '/admin/type_kendaraan/edit',
            method: 'get',
            dataType: 'JSON',
            data: {
                id: id,
            },
            success: function(response) {

                let jenis_kendaraan_data = `<option value=""> </option>`;

                response.jenis_kendaraan.forEach(function(e) {
                    jenis_kendaraan_data += `<option value="${e.id}"> ${e.jenis_kendaraan} </option>`;
                });

                $("#jenis_kendaraan_id_edit").html(jenis_kendaraan_data);

                $("#id_edit").val(response.type_kendaraan.id);
                $("#jenis_kendaraan_id_edit").val(response.type_kendaraan.jenis_kendaraan_id).trigger('change');
                $("#type_kendaraan_edit").val(response.type_kendaraan.type_kendaraan);


            }
        });
    });

    $("#edit_type_kendaraan").submit(function(e) {
        e.preventDefault();
        let id = $('#id_edit').val();
        let jenis_kendaraan_id = $('#jenis_kendaraan_id_edit').val();
        let type_kendaraan = $('#type_kendaraan_edit').val();

        $.ajax({
            url: '/admin/type_kendaraan/update',
            method: 'post',
            dataType: 'JSON',
            data: {
                id: id,
                jenis_kendaraan_id: jenis_kendaraan_id,
                type_kendaraan: type_kendaraan,
            },
            beforeSend: function() {
                $('.update').html('<i class="bi bi-box-arrow-in-right"></i>');
                $('.update').prop('disabled', true);
            },
            success: function(response) {
                $('.update').html('<i class="bi bi-box-arrow-in-right"></i> Kirim');
                $('.update').prop('disabled', false);
                if (response.error) {
                    if (response.error.jenis_kendaraan_id) {
                        $("#jenis_kendaraan_id_edit").addClass('is-invalid');
                        $(".error-jenis-kendaraan-edit").html(response.error.jenis_kendaraan_id);
                    } else {
                        $("#jenis_kendaraan_id_edit").removeClass('is-invalid');
                        $(".error-jenis-kendaraan-edit").html('');
                    }
                    if (response.error.type_kendaraan) {
                        $("#type_kendaraan_edit").addClass('is-invalid');
                        $(".error-type-kendaraan-edit").html(response.error.type_kendaraan);
                    } else {
                        $("#type_kendaraan_edit").removeClass('is-invalid');
                        $(".error-type-kendaraan-edit").html('');
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