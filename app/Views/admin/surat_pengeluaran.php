<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<main id="main" class="main">

    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">PAGES</li>
                <li class="breadcrumb-item"><a href="/admin/surat_pengeluaran">SURAT PENGELUARAN</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">SURAT PENGELUARAN</h5>
                        <p>
                            <button class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#ubahStatus">Tambah SPK</button>
                        </p>

                        <div class="table-responsive">
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nomor Kendaraan</th>
                                        <th scope="col">Jenis Surat (SPK)</th>
                                        <th scope="col">Nomor Surat</th>
                                        <th scope="col">Status Kendaraan</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($surat_pengeluaran as $data) : ?>
                                        <tr>
                                            <th scope="row"><?= $no++ ?>.</th>
                                            <td><?= $data->nomor_kendaraan ?> </td>
                                            <td><?= $data->jenis_spk ?> </td>
                                            <td> <a href="/spk/<?= $data->nomor_surat ?>" target="_blank"><?= $data->jenis_spk ?></a> </td>
                                            <?php if ($data->status_bap_id == 2 || $data->status_bap_id == 1) : ?>
                                                <td> <span class="badge bg-warning"><?= $data->status_penderekan ?></span> </td>
                                            <?php elseif ($data->status_bap_id == 3) : ?>
                                                <td> <span class="badge bg-danger"><?= $data->status_penderekan ?></span> </td>
                                            <?php elseif ($data->status_bap_id == 4) : ?>
                                                <td> <span class="badge bg-success"><?= $data->status_penderekan ?></span> </td>
                                            <?php elseif ($data->status_bap_id == 5) : ?>
                                                <td> <span class="badge bg-danger"><?= $data->status_penderekan ?></span> </td>
                                            <?php endif; ?>
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
                        </div>
                        <!-- End Table with stripped rows -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->

<div class="modal fade" id="ubahStatus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah SPK </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form_status">
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label for="bap_id">Nomor Kendaraan</label>
                        <select name="bap_id" id="bap_id" class="form-select">
                            <option value="">--silahkan pilih--</option>
                            <?php foreach ($data_penindakan as $data) : ?>
                                <option value="<?= $data->bap_id ?>"> <?= $data->nomor_bap ?> - <?= $data->nomor_kendaraan ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback error-bap">

                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_spk_id">Jenis Surat Pengeluaran</label>
                        <select name="jenis_spk_id" id="jenis_spk_id" class="form-select">
                            <option value="">--silahkan pilih--</option>
                            <?php foreach ($jenis_spk as $jenis_spk) : ?>
                                <option value="<?= $jenis_spk->id ?>"><?= $jenis_spk->jenis_spk ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback error-jenis-spk">

                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="nomor_surat" class="col-form-label">Surat SPK (PDF)</label>
                        <input type="file" class="form-control" id="nomor_surat" name="nomor_surat">
                        <div class="invalid-feedback error-nomor-surat">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="update_status" class="btn btn-primary">Ubah Status</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- Modal hapus UKPD -->
<div class="modal fade" id="deleteModal" tabindex="0">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Surat Pengeluaran</h5>
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
                <h5 class="modal-title">Edit Nomor Surat Pengeluaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form_edit_status">
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <input type="hidden" name="id_edit" id="id_edit">
                        <input type="hidden" name="spk_lama" id="spk_lama">
                        <label for="jenis_spk_id">Jenis Surat Pengeluaran</label>
                        <select name="jenis_spk_id" id="jenis_spk_id_edit" class="form-select">
                            <option value="">--silahkan pilih--</option>
                        </select>
                        <div class="invalid-feedback error-jenis-spk-edit">

                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="nomor_surat_edit" class="col-form-label">Surat Pengeluaran Kendaraan (PDF):</label>
                        <input type="file" class="form-control" id="nomor_surat_edit" name="nomor_surat">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="update_status" class="btn btn-primary">Update Status Kendaraan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><!-- End Edit Modal-->

<script src="/assets/vendor/jquery/jquery.js"></script>

<script>
    $(document).ready(function() {
        $('#jenis_spk_id').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#ubahStatus')
        });
        $('#bap_id').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#ubahStatus')
        })

        $('#jenis_spk_id_edit').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#editModal')
        });
    })


    $('#form_status').submit(function(e) {
        e.preventDefault();

        let bap_id = $("#bap_id").val();
        let jenis_spk_id = $("#jenis_spk_id").val();
        let nomor_spk = $("#nomor_surat").val();

        let formData = new FormData(this);

        formData.append('bap_id', bap_id);
        formData.append('jenis_spk_id', jenis_spk_id);
        formData.append('nomor_surat', nomor_spk);

        $.ajax({
            url: '/admin/surat_pengeluaran/insert',
            data: formData,
            dataType: 'json',
            enctype: 'multipart/form-data',
            type: 'POST',
            contentType: false,
            processData: false,
            cache: false,
            beforeSend: function() {
                $('#update_status').html('<i class="bi bi-box-arrow-in-right"></i>');
                $('#update_status').prop('disabled', true);
            },
            success: function(response) {
                $('#update_status').html('<i class="bi bi-trash"></i> Delete');
                $('#update_status').prop('disabled', false);
                if (response.error) {
                    if (response.error.bap_id) {
                        $("#bap_id").addClass('is-invalid');
                        $(".error-bap").html(response.error.bap_id);
                    } else {
                        $("#bap_id").removeClass('is-invalid');
                        $(".error-bap").html('');
                    }
                    if (response.error.jenis_spk_id) {
                        $("#jenis_spk_id").addClass('is-invalid');
                        $(".error-jenis-spk").html(response.error.jenis_spk_id);
                    } else {
                        $("#jenis_spk_id").removeClass('is-invalid');
                        $(".error-jenis-spk").html('');
                    }
                    if (response.error.nomor_surat) {
                        $("#nomor_surat").addClass('is-invalid');
                        $(".error-nomor-surat").html(response.error.nomor_surat);
                    } else {
                        $("#nomor_surat").removeClass('is-invalid');
                        $(".error-nomor-surat").html('');
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
                $('#update_status').html('<i class="bi bi-trash"></i> Delete');
                $('#update_status').prop('disabled', false);
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
            url: '/admin/surat_pengeluaran/edit',
            method: 'get',
            dataType: 'JSON',
            data: {
                id: id,
            },
            success: function(response) {
                $("#id_delete").val(response.spk.id);
            }
        });
    });

    $("#delete_form").submit(function(e) {
        e.preventDefault();
        let id = $("#id_delete").val();
        $.ajax({
            url: '/admin/surat_pengeluaran/delete',
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
                }, 2000)
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
            url: '/admin/surat_pengeluaran/edit',
            method: 'get',
            dataType: 'JSON',
            data: {
                id: id,
            },
            success: function(response) {
                console.log(response);
                $("#id_edit").val(response.spk.id);
                let jenis_spk = `<option value="">--silahkan pilih--</option>`;
                response.jenis_spk.forEach(function(e) {
                    jenis_spk += `<option value="${e.id}">${e.jenis_spk}</option>`
                });

                $("#jenis_spk_id_edit").html(jenis_spk);
                $("#jenis_spk_id_edit").val(response.spk.jenis_spk_id).trigger('change');

                $("#spk_lama").val(response.spk.nomor_surat);
            }
        });
    });

    $("#form_edit_status").submit(function(e) {
        e.preventDefault();
        let id = $("#id_edit").val();
        let spk = $("#spk_lama").val();
        let jenis_spk_id = $("#jenis_spk_id_edit").val();
        let nomor_spk = $("#nomor_surat_edit").val();
        let bap_id = $("#bap_id").val();

        let formData = new FormData(this);

        formData.append('id', id);
        formData.append('bap_id', bap_id);
        formData.append('spk_lama', spk);
        formData.append('jenis_spk_id', jenis_spk_id);
        formData.append('nomor_surat', nomor_spk);

        $.ajax({
            url: '/admin/surat_pengeluaran/update',
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
                    if (response.error.jenis_spk_id) {
                        $("#jenis_spk_id_edit").addClass('is-invalid');
                        $(".error-jenis-spk-edit").html(response.error.jenis_spk_id);
                    } else {
                        $("#jenis_spk_id_edit").removeClass('is-invalid');
                        $(".error-jenis-spk-edit").html('');
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