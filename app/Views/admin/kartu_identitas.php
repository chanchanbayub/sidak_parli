<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<main id="main" class="main">

    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">PAGES</li>
                <li class="breadcrumb-item"><a href="/admin/status_penderekan"><?= $title ?> </a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <h5 class="card-title"><?= $title ?></h5>
                            <p>
                                <button class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#smallModal">Tambah Kartu Identitas</button>
                            </p>
                            <div class="table-responsive">
                                <!-- Table with stripped rows -->
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Kartu Identitas</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($kartu_identitas as $data) : ?>
                                            <tr>
                                                <th scope="row"><?= $no++ ?> </th>
                                                <td><?= $data->kartu_identitas ?> </td>
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
        </div>
    </section>
</main><!-- End #main -->

<!-- Modal Tambah UKPD -->
<div class="modal fade" id="smallModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Kartu Identitas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="tambah_form" autocomplete="off">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label for="kartu_identitas" class="col-form-label">Kartu Identitas:</label>
                        <input type="text" class="form-control" id="kartu_identitas" name="kartu_identitas" placeholder="cth : KTP">
                        <div class="invalid-feedback error-kartu-identitas">

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
                <h5 class="modal-title">Delete Status Penderekan</h5>
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
                <h5 class="modal-title">Edit Kartu Identitas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit_form" autocomplete="off">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="id_edit" name="id">
                        <label for="kartu_identitas_edit" class="col-form-label">Kartu Identitas:</label>
                        <input type="text" class="form-control" id="kartu_identitas_edit" name="kartu_identitas">
                        <div class="invalid-feedback error-kartu-identitas-edit">

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
    $("#tambah_form").submit(function(e) {
        e.preventDefault();
        let kartu_identitas = $('#kartu_identitas').val();

        $.ajax({
            url: '/admin/kartu_identitas/insert',
            method: 'post',
            dataType: 'JSON',
            data: {
                kartu_identitas: kartu_identitas,
            },
            beforeSend: function() {
                $('.save').html('<i class="bi bi-box-arrow-in-right"></i>');
                $('.save').prop('disabled', true);
            },
            success: function(response) {
                $('.save').html('<i class="bi bi-box-arrow-in-right"></i> Kirim');
                $('.save').prop('disabled', false);
                if (response.error) {
                    if (response.error.kartu_identitas) {
                        $("#kartu_identitas").addClass('is-invalid');
                        $(".error-kartu-identitas").html(response.error.kartu_identitas);
                    } else {
                        $("#kartu_identitas").removeClass('is-invalid');
                        $(".error-kartu-identitas").html('');
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
                $('.save').html('<i class="bi bi-box-arrow-in-right"></i> Kirim');
                $('.save').prop('disabled', false);
                Swal.fire({
                    icon: 'success',
                    title: `${response.success}`,
                });
            }
        });
    });

    $(document).on('click', "#delete", function(e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        $.ajax({
            url: '/admin/kartu_identitas/edit',
            method: 'get',
            dataType: 'JSON',
            data: {
                id: id,
            },
            success: function(response) {
                $("#id_delete").val(response.id);
            }
        });
    });

    $("#delete_form").submit(function(e) {
        e.preventDefault();
        let id = $("#id_delete").val();
        $.ajax({
            url: '/admin/kartu_identitas/delete',
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
            url: '/admin/kartu_identitas/edit',
            method: 'get',
            dataType: 'JSON',
            data: {
                id: id,
            },
            success: function(response) {
                $("#id_edit").val(response.id);
                $("#kartu_identitas_edit").val(response.kartu_identitas);


            }
        });
    });

    $("#edit_form").submit(function(e) {
        e.preventDefault();
        let id = $('#id_edit').val();
        let kartu_identitas = $('#kartu_identitas_edit').val();
        $.ajax({
            url: '/admin/kartu_identitas/update',
            method: 'post',
            dataType: 'JSON',
            data: {
                id: id,
                kartu_identitas: kartu_identitas,
            },
            beforeSend: function() {
                $('.update').html('<i class="bi bi-box-arrow-in-right"></i>');
                $('.update').prop('disabled', true);
            },
            success: function(response) {
                $('.update').html('<i class="bi bi-box-arrow-in-right"></i> Kirim');
                $('.update').prop('disabled', false);
                if (response.error) {
                    if (response.error.kartu_identitas) {
                        $("#kartu_identitas_edit").addClass('is-invalid');
                        $(".error-kartu-identitas-edit").html(response.error.kartu_identitas);
                    } else {
                        $("#kartu_identitas_edit").removeClass('is-invalid');
                        $(".error-kartu-identitas-edit").html('');
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
            error: function(response) {
                $('.update').html('<i class="bi bi-box-arrow-in-right"></i> Kirim');
                $('.update').prop('disabled', false);
                Swal.fire({
                    icon: 'error',
                    title: `Data Gagal di Ubah!`,
                });
            }
        });
    });
</script>
<?= $this->endSection(); ?>