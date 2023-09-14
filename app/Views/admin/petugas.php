<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<main id="main" class="main">

    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">PAGES</li>
                <li class="breadcrumb-item"><a href="/admin/petugas">PETUGAS</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">PETUGAS</h5>
                        <p>
                            <button class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#smallModal">Tambah Petugas</button>
                        </p>
                        <div class="table-responsive">
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">UKPD</th>
                                        <th scope="col">Unit </th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">NIP </th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($petugas as $data) : ?>
                                        <tr>
                                            <th scope="row"><?= $no++ ?> </th>
                                            <td><?= $data->ukpd ?> </td>
                                            <td><?= $data->unit_regu ?> </td>
                                            <td><?= $data->nama ?> </td>
                                            <td><?= $data->username ?> </td>
                                            <td><?= $data->nip ?> </td>
                                            <td>
                                                <a href="/admin/petugas/detail/<?= $data->nip ?>" class="btn btn-sm btn-primary"> <i class="bi bi-eye-fill"></i> </a>
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
                <h5 class="modal-title">Tambah Petugas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="tambah_petugas" autocomplete="off">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label for="ukpd_id" class="col-form-label">UKPD :</label>
                        <select name="ukpd_id" id="ukpd_id" class="form-control">
                            <option value="">--Silahkan Pilih--</option>
                            <?php foreach ($ukpd as $ukpd) : ?>
                                <option value="<?= $ukpd->id ?>"><?= $ukpd->ukpd ?> </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback error-ukpd">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="unit_id" class="col-form-label">Unit / Regu :</label>
                        <select name="unit_id" id="unit_id" class="form-control">
                            <option value="">--Silahkan Pilih--</option>
                            <?php foreach ($unit_regu as $unit_regu) : ?>
                                <option value="<?= $unit_regu->id ?>"><?= $unit_regu->unit_regu ?> </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback error-unit">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama" class="col-form-label">Nama :</label>
                        <input type="text" name="nama" id="nama" class="form-control">
                        <div class="invalid-feedback error-nama">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nip" class="col-form-label">NIP / NPTT / NPJLP :</label>
                        <input type="text" name="nip" id="nip" class="form-control">
                        <div class="invalid-feedback error-nip">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="golongan" class="col-form-label">Golongan (opsional) :</label>
                        <input type="text" name="golongan" id="golongan" class="form-control">
                        <div class="invalid-feedback error-golongan">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pangkat" class="col-form-label">Pangkat (opsional) :</label>
                        <input type="text" name="pangkat" id="pangkat" class="form-control">
                        <div class="invalid-feedback error-pangkat">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="jabatan_id" class="col-form-label">Jabatan :</label>
                        <select name="jabatan_id" id="jabatan_id" class="form-control">
                            <option value="">--Silahkan Pilih--</option>
                            <?php foreach ($jabatan as $jabatan) : ?>
                                <option value="<?= $jabatan->id ?>"><?= $jabatan->jabatan ?> </option>
                            <?php endforeach; ?>
                        </select>
                        </select>
                        <div class="invalid-feedback error-jabatan">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="role_id" class="col-form-label">Role Management :</label>
                        <select name="role_id" id="role_id" class="form-control">
                            <option value="">--Silahkan Pilih--</option>
                            <?php foreach ($role_management as $role_management) : ?>
                                <option value="<?= $role_management->id ?>"><?= $role_management->role_management ?> </option>
                            <?php endforeach; ?>
                        </select>
                        </select>
                        <div class="invalid-feedback error-role">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="status_id" class="col-form-label">Status Petugas :</label>
                        <select name="status_id" id="status_id" class="form-control">
                            <option value="">--Silahkan Pilih--</option>
                            <?php foreach ($status_petugas as $status_petugas) : ?>
                                <option value="<?= $status_petugas->id ?>"><?= $status_petugas->status_petugas ?> </option>
                            <?php endforeach; ?>
                        </select>
                        </select>
                        <div class="invalid-feedback error-status">

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> <i class="bi bi-x-lg"></i> Batal</button>
                        <button type="submit" class="btn btn-primary save"> <i class="bi bi-box-arrow-in-right"></i> Kirim</button>
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
                <h5 class="modal-title">Delete Petugas</h5>
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
                <h5 class="modal-title">Edit Petugas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit_petugas" autocomplete="off">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="id_edit" name="id">
                    </div>
                    <div class="form-group">
                        <label for="ukpd_id_edit" class="col-form-label">UKPD :</label>
                        <select name="ukpd_id" id="ukpd_id_edit" class="form-control">
                            <option value="">--Silahkan Pilih--</option>

                        </select>
                        <div class="invalid-feedback error-ukpd-edit">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="unit_id_edit" class="col-form-label">Unit / Regu :</label>
                        <select name="unit_id" id="unit_id_edit" class="form-control">
                            <option value="">--Silahkan Pilih--</option>

                        </select>
                        <div class="invalid-feedback error-unit-edit">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama_edit" class="col-form-label">Nama :</label>
                        <input type="text" name="nama" id="nama_edit" class="form-control">
                        <div class="invalid-feedback error-nama-edit">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="username_edit" class="col-form-label">username :</label>
                        <input type="text" name="username" id="username_edit" class="form-control">
                        <div class="invalid-feedback error-username-edit">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nip_edit" class="col-form-label">NIP / NPTT / NPJLP :</label>
                        <input type="text" name="nip" id="nip_edit" class="form-control">
                        <div class="invalid-feedback error-nip-edit">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="golongan_edit" class="col-form-label">Golongan (opsional) :</label>
                        <input type="text" name="golongan" id="golongan_edit" class="form-control">
                        <div class="invalid-feedback error-golongan-edit">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pangkat_edit" class="col-form-label">Pangkat (opsional) :</label>
                        <input type="text" name="pangkat" id="pangkat_edit" class="form-control">
                        <div class="invalid-feedback error-pangkat-edit">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="jabatan_id_edit" class="col-form-label">Jabatan :</label>
                        <select name="jabatan_id" id="jabatan_id_edit" class="form-control">
                            <option value="">--Silahkan Pilih--</option>

                        </select>
                        </select>
                        <div class="invalid-feedback error-jabatan-edit">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="role_id_edit" class="col-form-label">Role Management :</label>
                        <select name="role_id" id="role_id_edit" class="form-control">
                            <option value="">--Silahkan Pilih--</option>

                        </select>
                        </select>
                        <div class="invalid-feedback error-role-edit">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status_id_edit" class="col-form-label">Status Petugas :</label>
                        <select name="status_id" id="status_id_edit" class="form-control">
                            <option value="">--Silahkan Pilih--</option>

                        </select>
                        </select>
                        <div class="invalid-feedback error-status-edit">

                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> <i class="bi bi-x-lg"></i> Batal</button>
                <button type="submit" class="btn btn-primary update"> <i class="bi bi-spinner bi-spin"></i> Kirim</button>
            </div>
            </form>
        </div>
    </div>

</div><!-- End Edit Modal-->

<script src="/assets/vendor/jquery/jquery.js"></script>

<script>
    $(document).ready(function() {
        // Form Tambah
        $('#ukpd_id').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#smallModal')
        });

        $('#unit_id').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#smallModal')
        });

        $('#jabatan_id').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#smallModal')
        });

        $('#role_id').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#smallModal')
        });

        $('#status_id').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#smallModal')
        });
        // Form Edit
        $('#ukpd_id_edit').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#editModal')
        });

        $('#unit_id_edit').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#editModal')
        });

        $('#jabatan_id_edit').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#editModal')
        });

        $('#role_id_edit').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#editModal')
        });

        $('#status_id_edit').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#editModal')
        });
    });

    $("#tambah_petugas").submit(function(e) {
        e.preventDefault();
        let ukpd_id = $('#ukpd_id').val();
        let unit_id = $('#unit_id').val();
        let nama = $('#nama').val();
        let nip = $('#nip').val();
        let golongan = $('#golongan').val();
        let pangkat = $('#pangkat').val();
        let jabatan_id = $('#jabatan_id').val();
        let role_id = $('#role_id').val();
        let status_id = $('#status_id').val();

        $.ajax({
            url: '/admin/petugas/insert',
            method: 'post',
            dataType: 'JSON',
            data: {
                ukpd_id: ukpd_id,
                unit_id: unit_id,
                nama: nama,
                nip: nip,
                golongan: golongan,
                pangkat: pangkat,
                jabatan_id: jabatan_id,
                role_id: role_id,
                status_id: status_id
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
                    if (response.error.unit_id) {
                        $("#unit_id").addClass('is-invalid');
                        $(".error-unit").html(response.error.unit_id);
                    } else {
                        $("#unit_id").removeClass('is-invalid');
                        $(".error-unit").html('');
                    }
                    if (response.error.nama) {
                        $("#nama").addClass('is-invalid');
                        $(".error-nama").html(response.error.nama);
                    } else {
                        $("#nama").removeClass('is-invalid');
                        $(".error-nama").html('');
                    }
                    if (response.error.nip) {
                        $("#nip").addClass('is-invalid');
                        $(".error-nip").html(response.error.nip);
                    } else {
                        $("#nip").removeClass('is-invalid');
                        $(".error-nip").html('');
                    }
                    if (response.error.jabatan_id) {
                        $("#jabatan_id").addClass('is-invalid');
                        $(".error-jabatan").html(response.error.jabatan_id);
                    } else {
                        $("#jabatan_id").removeClass('is-invalid');
                        $(".error-jabatan").html('');
                    }
                    if (response.error.role_id) {
                        $("#role_id").addClass('is-invalid');
                        $(".error-role").html(response.error.role_id);
                    } else {
                        $("#role_id").removeClass('is-invalid');
                        $(".error-role").html('');
                    }
                    if (response.error.status_id) {
                        $("#status_id").addClass('is-invalid');
                        $(".error-status").html(response.error.status_id);
                    } else {
                        $("#status_id").removeClass('is-invalid');
                        $(".error-status").html('');
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
                    title: `Data Gagal di Simpan!`,
                });
            }
        });
    });

    $(document).on('click', "#delete", function(e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        $.ajax({
            url: '/admin/petugas/edit',
            method: 'get',
            dataType: 'JSON',
            data: {
                id: id,
            },
            success: function(response) {
                $("#id_delete").val(response.petugas.id);
            }
        });
    });

    $("#delete_form").submit(function(e) {
        e.preventDefault();
        let id = $("#id_delete").val();
        $.ajax({
            url: '/admin/petugas/delete',
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
                console.log(response);
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
            url: '/admin/petugas/edit',
            method: 'get',
            dataType: 'JSON',
            data: {
                id: id,
            },
            success: function(response) {
                // ukpd
                let ukpd_data = `<option value="">--Silahkan Pilih--</option>`;

                response.ukpd.forEach(function(e) {
                    ukpd_data += `<option value="${e.id}">${e.ukpd}</option>`;
                })

                $("#ukpd_id_edit").html(ukpd_data);
                // unit regu
                let unit_data = `<option value="">--Silahkan Pilih--</option>`;

                response.unit_regu.forEach(function(e) {
                    unit_data += `<option value="${e.id}">${e.unit_regu}</option>`;
                })

                $("#unit_id_edit").html(unit_data);
                // jabatan
                let jabatan_data = `<option value="">--Silahkan Pilih--</option>`;

                response.jabatan.forEach(function(e) {
                    jabatan_data += `<option value="${e.id}">${e.jabatan}</option>`;
                })

                $("#jabatan_id_edit").html(jabatan_data);
                // role
                let role_data = `<option value="">--Silahkan Pilih--</option>`;

                response.role_management.forEach(function(e) {
                    role_data += `<option value="${e.id}">${e.role_management}</option>`;
                })

                $("#role_id_edit").html(role_data);

                // status_petugas
                let status_data = `<option value="">--Silahkan Pilih--</option>`;

                response.status_petugas.forEach(function(e) {
                    status_data += `<option value="${e.id}">${e.status_petugas}</option>`;
                })

                $("#status_id_edit").html(status_data);

                $("#id_edit").val(response.petugas.id);
                $("#nama_edit").val(response.petugas.nama);
                $("#username_edit").val(response.petugas.username);
                $("#nip_edit").val(response.petugas.nip);
                $("#golongan_edit").val(response.petugas.golongan);
                $("#pangkat_edit").val(response.petugas.pangkat);

                $("#ukpd_id_edit").val(response.petugas.ukpd_id).trigger('change');
                $("#unit_id_edit").val(response.petugas.unit_id).trigger('change');
                $("#jabatan_id_edit").val(response.petugas.jabatan_id).trigger('change');
                $("#role_id_edit").val(response.petugas.role_id).trigger('change');
                $("#status_id_edit").val(response.petugas.status_id).trigger('change');

            }
        });
    });

    $("#edit_petugas").submit(function(e) {
        e.preventDefault();
        let id = $('#id_edit').val();
        let ukpd_id = $('#ukpd_id_edit').val();
        let unit_id = $('#unit_id_edit').val();
        let nama = $('#nama_edit').val();
        let username = $('#username_edit').val();
        let nip = $('#nip_edit').val();
        let golongan = $('#golongan_edit').val();
        let pangkat = $('#pangkat_edit').val();
        let jabatan_id = $('#jabatan_id_edit').val();
        let role_id = $('#role_id_edit').val();
        let status_id = $('#status_id_edit').val();
        $.ajax({
            url: '/admin/petugas/update',
            method: 'post',
            dataType: 'JSON',
            data: {
                id: id,
                ukpd_id: ukpd_id,
                unit_id: unit_id,
                nama: nama,
                username: username,
                nip: nip,
                golongan: golongan,
                pangkat: pangkat,
                jabatan_id: jabatan_id,
                role_id: role_id,
                status_id: status_id,
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
                        $(".error-ukpd-edit").html(response.error.ukpd_id);
                    } else {
                        $("#ukpd_id_edit").removeClass('is-invalid');
                        $(".error-ukpd-edit").html('');
                    }
                    if (response.error.unit_id) {
                        $("#unit_id_edit").addClass('is-invalid');
                        $(".error-unit-edit").html(response.error.unit_id);
                    } else {
                        $("#unit_id_edit").removeClass('is-invalid');
                        $(".error-unit-edit").html('');
                    }
                    if (response.error.nama) {
                        $("#nama_edit").addClass('is-invalid');
                        $(".error-nama-edit").html(response.error.nama);
                    } else {
                        $("#nama_edit").removeClass('is-invalid');
                        $(".error-nama-edit").html('');
                    }
                    if (response.error.username) {
                        $("#username_edit").addClass('is-invalid');
                        $(".error-username-edit").html(response.error.username);
                    } else {
                        $("#username_edit").removeClass('is-invalid');
                        $(".error-username-edit").html('');
                    }
                    if (response.error.nip) {
                        $("#nip_edit").addClass('is-invalid');
                        $(".error-nip-edit").html(response.error.nip);
                    } else {
                        $("#nip_edit").removeClass('is-invalid');
                        $(".error-nip-edit").html('');
                    }
                    if (response.error.golongan) {
                        $("#golongan_edit").addClass('is-invalid');
                        $(".error-golongan-edit").html(response.error.golongan);
                    } else {
                        $("#golongan_edit").removeClass('is-invalid');
                        $(".error-golongan-edit").html('');
                    }
                    if (response.error.pangkat) {
                        $("#pangkat_edit").addClass('is-invalid');
                        $(".error-pangkat-edit").html(response.error.pangkat);
                    } else {
                        $("#pangkat_edit").removeClass('is-invalid');
                        $(".error-pangkat-edit").html('');
                    }
                    if (response.error.jabatan_id) {
                        $("#jabatan_id_edit").addClass('is-invalid');
                        $(".error-jabatan-edit").html(response.error.jabatan_id);
                    } else {
                        $("#jabatan_id_edit").removeClass('is-invalid');
                        $(".error-jabatan-edit").html('');
                    }
                    if (response.error.role_id) {
                        $("#role_id_edit").addClass('is-invalid');
                        $(".error-role-edit").html(response.error.role_id);
                    } else {
                        $("#role_id_edit").removeClass('is-invalid');
                        $(".error-role-edit").html('');
                    }
                    if (response.error.status_id) {
                        $("#status_id_edit").addClass('is-invalid');
                        $(".error-status-edit").html(response.error.status_id);
                    } else {
                        $("#status_id_edit").removeClass('is-invalid');
                        $(".error-status-edit").html('');
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
                    title: `Data Gagal Di Update`,
                });
            }
        });
    });
</script>
<?= $this->endSection(); ?>