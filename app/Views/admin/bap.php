<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<main id="main" class="main">

    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">PAGES</li>
                <li class="breadcrumb-item"><a href="/admin/bap"><?= $title ?></a></li>
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
                            <button class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#smallModal">Tambah Nomor BAP</button>
                        </p>
                        <div class="table-responsive" id="data">
                            <!-- Table with stripped rows -->
                            <table class=" table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">UKPD</th>
                                        <th scope="col">Jenis Penindakan</th>
                                        <th scope="col">Nomor BAP</th>
                                        <th scope="col">Regu</th>
                                        <th scope="col">Status BAP</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($bap as $data) : ?>
                                        <tr>
                                            <th scope="row"><?= $no++ ?>. </th>
                                            <td><?= $data->ukpd ?> </td>
                                            <td><?= $data->jenis_penindakan ?> </td>
                                            <?php if ($data->status_bap_id == 4) : ?>
                                                <td> <a href="/admin/data_penindakan/detail/<?= $data->nomor_bap ?>"><?= $data->nomor_bap ?></a> </td>
                                            <?php else : ?>
                                                <td><?= $data->nomor_bap ?></td>
                                            <?php endif; ?>
                                            <td><?= $data->unit_regu ?> </td>
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
                                                <div class="btn-group-sm" role="group">
                                                    <button id="btnGroupDrop1" type="button" class="btn btn-outline-secondary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Action
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                        <?php if (session()->get('role_id') == 1) : ?>
                                                            <a class="dropdown-item btn-sm" id="delete" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="<?= $data->id ?>">
                                                                <i class=" bi bi-trash"></i> Hapus
                                                            </a>
                                                        <?php endif; ?>
                                                        <a class="dropdown-item btn-sm" id="edit" data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?= $data->id ?>">
                                                            <i class="bi bi-pencil-square"></i> Edit
                                                        </a>

                                                    </ul>
                                                </div>
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

<!-- Modal Nomor BAP  -->
<div class="modal fade" id="smallModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Nomor BAP</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="tambah_form" autocomplete="off">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label for="ukpd_id" class="col-form-label">UKPD :</label>
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
                        <label for="jenis_penindakan_id" class="col-form-label">Jenis Penindakan :</label>
                        <select class="form-control" name="jenis_penindakan_id" id="jenis_penindakan_id">
                            <option value=""> Silahkan Pilih</option>
                            <?php foreach ($jenis_penindakan as $data) : ?>
                                <option value="<?= $data->id ?>"><?= $data->jenis_penindakan ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback error-jenis-penindakan">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nomor_bap_awal" class="col-form-label">Nomor BAP AWAL:</label>
                        <input type="text" class="form-control" id="nomor_bap_awal" name="nomor_bap_awal" placeholder="cth : 1">
                        <div class="invalid-feedback error-nomor-bap-awal">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nomor_bap_akhir" class="col-form-label">Nomor BAP Akhir:</label>
                        <input type="text" class="form-control" id="nomor_bap_akhir" name="nomor_bap_akhir" placeholder="cth : 5">
                        <div class="invalid-feedback error-nomor-bap-akhir">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="unit_id" class="col-form-label"> Pilih Regu :</label>
                        <select class="form-select" name="unit_id" id="unit_id">
                            <option value=""> Silahkan Pilih</option>
                            <?php foreach ($unit_regu as $data) : ?>
                                <option value="<?= $data->id ?>"><?= $data->unit_regu ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback error-status-bap">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status_bap_id" class="col-form-label">Status BAP :</label>
                        <select class="form-select" name="status_bap_id" id="status_bap_id">
                            <option value=""> Silahkan Pilih</option>
                            <?php foreach ($status_penderekan as $data) : ?>
                                <option value="<?= $data->id ?>"><?= $data->status_penderekan ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback error-status-bap">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> <i class="bi bi-x-lg"></i> Batal</button>
                        <button type="submit" class="btn btn-primary save"> <i class="bi bi-send"></i> Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End tambah Modal-->

<!-- Modal hapus UKPD -->
<div class="modal fade" id="deleteModal" tabindex="0">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Nomor BAP</h5>
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

<!-- Modal Edit BAP -->
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Nomor BAP</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit_form" autocomplete="off">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="id_edit" name="id">
                        <label for="ukpd_id_edit" class="col-form-label">UKPD :</label>
                        <select class="form-control" name="ukpd_id" id="ukpd_id_edit">
                            <option value=""> Silahkan Pilih</option>

                        </select>
                        <div class="invalid-feedback error-ukpd-edit">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="jenis_penindakan_id_edit" class="col-form-label">Jenis Penindakan :</label>
                        <select class="form-select" name="jenis_penindakan_id" id="jenis_penindakan_id_edit">
                            <option value=""> Silahkan Pilih</option>

                        </select>
                        <div class="invalid-feedback error-jenis-penindakan-edit">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nomor_bap_edit" class="col-form-label">Nomor BAP :</label>
                        <input type="text" class="form-control" id="nomor_bap_edit" name="nomor_bap" placeholder="cth : 1">
                        <div class="invalid-feedback error-nomor-bap-awal-edit">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="unit_id_edit" class="col-form-label">Pilih Regu :</label>
                        <select class="form-select" name="unit_id" id="unit_id_edit">
                            <option value=""> Silahkan Pilih</option>

                        </select>
                        <div class="invalid-feedback error-unit-edit">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="status_bap_id_edit" class="col-form-label">Status BAP :</label>
                        <select class="form-control" name="status_bap_id" id="status_bap_id_edit">
                            <option value=""> Silahkan Pilih</option>

                        </select>
                        <div class="invalid-feedback error-status-bap-edit">

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> <i class="bi bi-x-lg"></i> Batal</button>
                        <button type="submit" class="btn btn-primary update"> <i class="bi bi-send"></i> Ubah Data</button>
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
        $('#unit_id').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#smallModal')
        });
        $('#status_bap_id').select2({
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

        $('#unit_id_edit').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#editModal')
        });

        $('#status_bap_id_edit').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#editModal')
        });
    });

    $("#tambah_form").submit(function(e) {
        e.preventDefault();
        let ukpd_id = $('#ukpd_id').val();
        let jenis_penindakan_id = $("#jenis_penindakan_id").val();
        let nomor_bap_awal = $("#nomor_bap_awal").val();
        let nomor_bap_akhir = $("#nomor_bap_akhir").val();
        let unit_id = $("#unit_id").val();
        let status_bap_id = $("#status_bap_id").val();
        $.ajax({
            url: '/admin/bap/insert',
            method: 'post',
            dataType: 'JSON',
            data: {
                ukpd_id: ukpd_id,
                jenis_penindakan_id: jenis_penindakan_id,
                nomor_bap_awal: nomor_bap_awal,
                nomor_bap_akhir: nomor_bap_akhir,
                unit_id: unit_id,
                status_bap_id: status_bap_id,
            },
            beforeSend: function() {
                $('.save').html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>Loading...");
                $(".save").prop('disabled', true);
            },
            success: function(response) {
                $('.save').html('<i class="bi bi-send"></i> Kirim');
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
                    if (response.error.nomor_bap_awal) {
                        $("#nomor_bap_awal").addClass('is-invalid');
                        $(".error-nomor-bap-awal").html(response.error.nomor_bap_awal);
                    } else {
                        $("#nomor_bap_awal").removeClass('is-invalid');
                        $(".error-nomor-bap-awal").html('');
                    }
                    if (response.error.nomor_bap_akhir) {
                        $("#nomor_bap_akhir").addClass('is-invalid');
                        $(".error-nomor-bap-akhir").html(response.error.nomor_bap_akhir);
                    } else {
                        $("#nomor_bap_akhir").removeClass('is-invalid');
                        $(".error-nomor-bap-akhir").html('');
                    }
                    if (response.error.nomor_bap_akhir) {
                        $("#nomor_bap_akhir").addClass('is-invalid');
                        $(".error-nomor-bap-akhir").html(response.error.nomor_bap_akhir);
                    } else {
                        $("#nomor_bap_akhir").removeClass('is-invalid');
                        $(".error-nomor-bap-akhir").html('');
                    }
                    if (response.error.unit_id) {
                        $("#unit_id").addClass('is-invalid');
                        $(".error-unit").html(response.error.unit_id);
                    } else {
                        $("#unit_id").removeClass('is-invalid');
                        $(".error-unit").html('');
                    }
                    if (response.error.status_bap_id) {
                        $("#status_bap_id").addClass('is-invalid');
                        $(".error-status-bap").html(response.error.status_bap_id);
                    } else {
                        $("#status_bap_id").removeClass('is-invalid');
                        $(".error-status-bap").html('');
                    }
                } else {
                    Swal.fire({
                        icon: 'success',
                        title: `${response.success}`,
                    });
                    setTimeout(function() {
                        location.reload(true);
                    }, 1000)
                }
            },
            error: function() {
                $('.save').html("<i class='bi bi-send'></i>Kirim");
                $(".save").prop('disabled', false);
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
            url: '/admin/bap/edit',
            method: 'get',
            dataType: 'JSON',
            data: {
                id: id,
            },
            success: function(response) {
                $("#id_delete").val(response.bap.id);
            }
        });
    });

    $("#delete_form").submit(function(e) {
        e.preventDefault();
        let id = $("#id_delete").val();

        $.ajax({
            url: '/admin/bap/delete',
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
            url: '/admin/bap/edit',
            method: 'get',
            dataType: 'JSON',
            data: {
                id: id,
            },
            success: function(response) {

                $("#id_edit").val(response.bap.id);
                $("#nomor_bap_edit").val(response.bap.nomor_bap);

                let ukpd_data = `<option value=""> </option>`;

                response.ukpd.forEach(function(e) {
                    ukpd_data += `<option value="${e.id}"> ${e.ukpd} </option>`;
                });
                $("#ukpd_id_edit").html(ukpd_data);
                $("#ukpd_id_edit").val(response.bap.ukpd_id).trigger('change');

                let jenis_penindakan_data = `<option value=""> </option>`;

                response.jenis_penindakan.forEach(function(e) {
                    jenis_penindakan_data += `<option value="${e.id}"> ${e.jenis_penindakan} </option>`;
                });
                $("#jenis_penindakan_id_edit").html(jenis_penindakan_data);
                $("#jenis_penindakan_id_edit").val(response.bap.jenis_penindakan_id).trigger('change');

                let unit_regu = `<option value=""> </option>`;

                response.unit_regu.forEach(function(e) {
                    unit_regu += `<option value="${e.id}"> ${e.unit_regu} </option>`;
                });
                $("#unit_id_edit").html(unit_regu);
                $("#unit_id_edit").val(response.bap.unit_id).trigger('change');

                let status_penderekan_data = `<option value=""> </option>`;

                response.status_penderekan.forEach(function(e) {
                    status_penderekan_data += `<option value="${e.id}"> ${e.status_penderekan} </option>`;
                });
                $("#status_bap_id_edit").html(status_penderekan_data);
                $("#status_bap_id_edit").val(response.bap.status_bap_id).trigger('change');


            }
        });
    });

    $("#edit_form").submit(function(e) {
        e.preventDefault();

        let id = $('#id_edit').val();
        let ukpd_id = $('#ukpd_id_edit').val();
        let jenis_penindakan_id = $('#jenis_penindakan_id_edit').val();
        let nomor_bap = $('#nomor_bap_edit').val();
        let unit_id = $('#unit_id_edit').val();
        let status_bap_id = $('#status_bap_id_edit').val();

        $.ajax({
            url: '/admin/bap/update',
            method: 'post',
            dataType: 'JSON',
            data: {
                id: id,
                ukpd_id: ukpd_id,
                jenis_penindakan_id: jenis_penindakan_id,
                nomor_bap: nomor_bap,
                unit_id: unit_id,
                status_bap_id: status_bap_id,
            },
            beforeSend: function() {
                $('.update').html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>Loading...");
                $('.update').prop('disabled', true);
            },
            success: function(response) {
                $('.update').html('<i class="bi bi-send"></i> Ubah Data');
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
                $('.update').html('<i class="bi bi-send"></i> Ubah Data');
                $('.update').prop('disabled', false);
                Swal.fire({
                    icon: 'error',
                    title: `Data Gagal di Simpan!`,
                });
            }
        });
    });
</script>
<?= $this->endSection(); ?>