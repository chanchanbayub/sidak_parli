<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<main id="main" class="main">

    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">PAGES</li>
                <li class="breadcrumb-item"><a href="/admin/ukpd">UKPD</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">UNIT KERJA PEMERINTAH DAERAH</h5>
                        <p>
                            <button class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#smallModal">Tambah UKPD</button>
                        </p>
                        <div class="table-responsive">
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">UKPD</th>
                                        <th scope="col">Nama Dinas</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($ukpd as $data) : ?>
                                        <tr>
                                            <th scope="row"><?= $no++ ?> </th>
                                            <td><?= $data->ukpd ?> </td>
                                            <td><?= $data->nama_dinas ?> </td>
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

<!-- Modal Tambah UKPD -->
<div class="modal fade" id="smallModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah UKPD</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="tambah_ukpd" autocomplete="off">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label for="ukpd" class="col-form-label">UKPD:</label>
                        <input type="text" class="form-control" id="ukpd" name="ukpd" placeholder="masukan nama ukpd cth : dalops">
                        <div class="invalid-feedback error-ukpd">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama_dinas" class="col-form-label">Nama Intansi:</label>
                        <input type="text" class="form-control" id="nama_dinas" name="nama_dinas" placeholder="masukan nama ukpd cth : Bidang Dalops">
                        <div class="invalid-feedback error-nama-dinas">
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
                <h5 class="modal-title">Delete UKPD</h5>
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
                <h5 class="modal-title">Edit UKPD</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit_ukpd" autocomplete="off">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="id_edit" name="id">
                        <label for="ukpd" class="col-form-label">UKPD:</label>
                        <input type="text" class="form-control" id="ukpd_edit" name="ukpd">
                        <div class="invalid-feedback error-ukpd-edit">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama_dinas" class="col-form-label">Nama Intansi:</label>
                        <input type="text" class="form-control" id="nama_dinas_edit" name="nama_dinas">
                        <div class="invalid-feedback error-nama-dinas-edit">
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
    $("#tambah_ukpd").submit(function(e) {
        e.preventDefault();
        let ukpd = $('#ukpd').val();
        let nama_dinas = $("#nama_dinas").val();
        $.ajax({
            url: '/admin/ukpd/insert',
            method: 'post',
            dataType: 'JSON',
            data: {
                ukpd: ukpd,
                nama_dinas: nama_dinas
            },
            beforeSend: function() {
                $('.save').html('<i class="bi bi-box-arrow-in-right"></i>');
                $('.save').prop('disabled', true);
            },
            success: function(response) {
                $('.save').html('<i class="bi bi-box-arrow-in-right"></i> Kirim');
                $('.save').prop('disabled', false);
                if (response.error) {
                    if (response.error.ukpd) {
                        $("#ukpd").addClass('is-invalid');
                        $(".error-ukpd").html(response.error.ukpd);
                    } else {
                        $("#ukpd").removeClass('is-invalid');
                        $(".error-ukpd").html('');
                    }
                    if (response.error.nama_dinas) {
                        $("#nama_dinas").addClass('is-invalid');
                        $(".error-nama-dinas").html(response.error.nama_dinas);
                    } else {
                        $("#nama_dinas").removeClass('is-invalid');
                        $(".error-nama-dinas").html('');
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
                $('.save').prop('disabled', false);
            }
        });
    });

    $(document).on('click', "#delete", function(e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        $.ajax({
            url: '/admin/ukpd/edit',
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
            url: '/admin/ukpd/delete',
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

                alert('Data Gagal di Hapus');
            }
        });
    });

    $(document).on('click', "#edit", function(e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        $.ajax({
            url: '/admin/ukpd/edit',
            method: 'get',
            dataType: 'JSON',
            data: {
                id: id,
            },
            success: function(response) {
                $("#id_edit").val(response.id);
                $("#ukpd_edit").val(response.ukpd);
                $("#nama_dinas_edit").val(response.nama_dinas);

            }
        });
    });

    $("#edit_ukpd").submit(function(e) {
        e.preventDefault();
        let id = $('#id_edit').val();
        let ukpd = $('#ukpd_edit').val();
        let nama_dinas = $("#nama_dinas_edit").val();
        $.ajax({
            url: '/admin/ukpd/update',
            method: 'post',
            dataType: 'JSON',
            data: {
                id: id,
                ukpd: ukpd,
                nama_dinas: nama_dinas
            },
            beforeSend: function() {
                $('.update').html('<i class="bi bi-box-arrow-in-right"></i>');
                $('.update').prop('disabled', true);
            },
            success: function(response) {
                $('.update').html('<i class="bi bi-box-arrow-in-right"></i> Kirim');
                $('.update').prop('disabled', false);
                if (response.error) {
                    if (response.error.ukpd) {
                        $("#ukpd_edit").addClass('is-invalid');
                        $(".error-ukpd-edit").html(response.error.ukpd);
                    } else {
                        $("#ukpd_edit").removeClass('is-invalid');
                        $(".error-ukpd-edit").html('');
                    }
                    if (response.error.nama_dinas) {
                        $("#nama_dinas_edit").addClass('is-invalid');
                        $(".error-nama-dinas-edit").html(response.error.nama_dinas);
                    } else {
                        $("#nama_dinas_edit").removeClass('is-invalid');
                        $(".error-nama-dinas-edit").html('');
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
                $('.update').prop('disabled', false);
            }
        });
    });
</script>
<?= $this->endSection(); ?>