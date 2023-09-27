<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<main id="main" class="main">

    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">PAGES</li>
                <li class="breadcrumb-item"><a href="/admin/spt">SPT</a></li>
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
                            <button class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#smallModal">Tambah Surat Penugasan</button>
                        </p>
                        <div class="table-responsive">
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">UKPD</th>
                                        <th scope="col">Nomor Surat</th>
                                        <th scope="col">Tanggal Surat</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($spt as $data) : ?>
                                        <tr>
                                            <th scope="row"><?= $no++ ?> </th>
                                            <td><?= $data->ukpd ?> </td>
                                            <td><?= $data->nomor_surat ?> </td>
                                            <td><?= date_indo(date('Y-m-d', strtotime($data->tanggal_surat)))  ?> </td>
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
                <h5 class="modal-title">Tambah Surat Penugasan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="tambah_spt" autocomplete="off">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label for="ukpd_id" class="col-form-label">UKPD:</label>
                        <select class="form-control" name="ukpd_id" id="ukpd_id">
                            <option value=""> Silahkan Pilih</option>
                            <?php foreach ($ukpd as $data) : ?>
                                <?php if ($data->id == session()->get('ukpd_id')) : ?>
                                    <option value="<?= $data->id ?>" selected><?= $data->ukpd ?></option>
                                <?php else : ?>
                                    <option value="<?= $data->id ?>"><?= $data->ukpd ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback error-ukpd">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nomor_surat" class="col-form-label">Nomor Surat Tugas:</label>
                        <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" placeholder="masukan nomor surat ukpd cth : 123 / PH 06.00">
                        <div class="invalid-feedback error-nomor-surat">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_surat" class="col-form-label">Nomor Surat Tugas:</label>
                        <input type="date" class="form-control" id="tanggal_surat" name="tanggal_surat">
                        <div class="invalid-feedback error-tanggal-surat">
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
                    <input type="text" class="form-control" id="id_delete" name="id">
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
                <h5 class="modal-title">Edit Nomor Surat Tugas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit_spt" autocomplete="off">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="id_edit" name="id">
                        <label for="ukpd_id_edit" class="col-form-label">UKPD:</label>
                        <select name="ukpd_id" id="ukpd_id_edit" class="form-control">
                            <option value=""></option>
                        </select>
                        <div class="invalid-feedback error-ukpd-edit">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nomor_surat" class="col-form-label">Nomor Surat:</label>
                        <input type="text" class="form-control" id="nomor_surat_edit" name="nomor_surat">
                        <div class="invalid-feedback error-nomor-surat-edit">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_surat" class="col-form-label">Tanggal Surat:</label>
                        <input type="date" class="form-control" id="tanggal_surat_edit" name="tanggal_surat">
                        <div class="invalid-feedback error-tanggal-surat-edit">
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
        $('#ukpd_id').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#smallModal')
        });

        $('#ukpd_id_edit').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#editModal')
        });
    });

    $("#tambah_spt").submit(function(e) {
        e.preventDefault();
        let ukpd_id = $('#ukpd_id').val();
        let nomor_surat = $("#nomor_surat").val();
        let tanggal_surat = $("#tanggal_surat").val();
        $.ajax({
            url: '/admin/spt/insert',
            method: 'post',
            dataType: 'JSON',
            data: {
                ukpd_id: ukpd_id,
                nomor_surat: nomor_surat,
                tanggal_surat: tanggal_surat
            },
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
                    if (response.error.nomor_surat) {
                        $("#nomor_surat").addClass('is-invalid');
                        $(".error-nomor-surat").html(response.error.nomor_surat);
                    } else {
                        $("#nomor_surat").removeClass('is-invalid');
                        $(".error-nomor-surat").html('');
                    }
                    if (response.error.tanggal_surat) {
                        $("#tanggal_surat").addClass('is-invalid');
                        $(".error-tanggal-surat").html(response.error.tanggal_surat);
                    } else {
                        $("#tanggal_surat").removeClass('is-invalid');
                        $(".error-tanggal-surat").html('');
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
            }
        });
    });

    $(document).on('click', "#delete", function(e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        $.ajax({
            url: '/admin/spt/edit',
            method: 'get',
            dataType: 'JSON',
            data: {
                id: id,
            },
            success: function(response) {
                $("#id_delete").val(response.spt.id);
            }
        });
    });

    $("#delete_form").submit(function(e) {
        e.preventDefault();
        let id = $("#id_delete").val();

        $.ajax({
            url: '/admin/spt/delete',
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
                alert('Data Gagal di Hapus');
            }
        });
    });

    $(document).on('click', "#edit", function(e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        $.ajax({
            url: '/admin/spt/edit',
            method: 'get',
            dataType: 'JSON',
            data: {
                id: id,
            },
            success: function(response) {

                let ukpd_data = `<option value=""> </option>`;

                response.ukpd.forEach(function(e) {
                    ukpd_data += `<option value="${e.id}"> ${e.ukpd} </option>`;
                });

                $("#ukpd_id_edit").html(ukpd_data);

                $("#id_edit").val(response.spt.id);
                $("#ukpd_id_edit").val(response.spt.ukpd_id).trigger('change');
                $("#nomor_surat_edit").val(response.spt.nomor_surat);
                $("#tanggal_surat_edit").val(response.spt.tanggal_surat);

            }
        });
    });

    $("#edit_spt").submit(function(e) {
        e.preventDefault();
        let id = $('#id_edit').val();
        let ukpd_id = $('#ukpd_id_edit').val();
        let nomor_surat = $("#nomor_surat_edit").val();
        let tanggal_surat = $("#tanggal_surat_edit").val();
        $.ajax({
            url: '/admin/spt/update',
            method: 'post',
            dataType: 'JSON',
            data: {
                id: id,
                ukpd_id: ukpd_id,
                nomor_surat: nomor_surat,
                tanggal_surat: tanggal_surat
            },
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
                        $(".error-ukpd-edit").html(response.error.ukpd);
                    } else {
                        $("#ukpd_id_edit").removeClass('is-invalid');
                        $(".error-ukpd-edit").html('');
                    }
                    if (response.error.nomor_surat) {
                        $("#nomor_surat_edit").addClass('is-invalid');
                        $(".error-nomor-surat-edit").html(response.error.nomor_surat);
                    } else {
                        $("#nomor_surat_edit").removeClass('is-invalid');
                        $(".error-nomor-surat-edit").html('');
                    }
                    if (response.error.tanggal_surat) {
                        $("#tanggal_surat_edit").addClass('is-invalid');
                        $(".error-tanggal-surat-edit").html(response.error.tanggal_surat);
                    } else {
                        $("#tanggal_surat_edit").removeClass('is-invalid');
                        $(".error-tanggal-surat-edit").html('');
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
                    title: `Data Gagal di Update!`,
                });
            }
        });
    });
</script>
<?= $this->endSection(); ?>