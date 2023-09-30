<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<main id="main" class="main">

    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">PAGES</li>
                <li class="breadcrumb-item"><a href="/admin/type_kendaraan">TEMPAT PENYIMPANAN</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">TEMPAT PENYIMPANAN</h5>
                        <p>
                            <button class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#smallModal">Tambah Tempat Penyimpanan</button>
                        </p>
                        <div class="table-responsive">
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">UKPD</th>
                                        <th scope="col">Tempat Penyimpanan</th>
                                        <th scope="col">Link Google Maps</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($tempat_penyimpanan as $data) : ?>
                                        <tr>
                                            <th scope="row"><?= $no++ ?>. </th>
                                            <td><?= $data->ukpd ?> </td>
                                            <td><?= $data->tempat_penyimpanan ?> </td>
                                            <?php if ($data->ukpd_id == 1 || $data->ukpd_id == 2) : ?>
                                                <td> <a href="https://maps.app.goo.gl/J9vsbKenvkYBAsJG8" class="btn btn-outline-secondary btn-sm" target="_blank"> <i class="bi bi-pin-map"></i> Lihat Lokasi</a> </td>
                                            <?php elseif ($data->ukpd_id == 3) : ?>
                                                <td> <a href="https://maps.app.goo.gl/fZQutJk8LvA72ffG7" class="btn btn-outline-secondary btn-sm" target="_blank"> <i class="bi bi-pin-map"></i> Lihat Lokasi</a> </td>
                                            <?php elseif ($data->ukpd_id == 4) : ?>
                                                <td> <a href="https://maps.app.goo.gl/93AJwFwyh9wcoz4t8" class="btn btn-outline-secondary btn-sm" target="_blank"> <i class="bi bi-pin-map"></i> Lihat Lokasi</a> </td>
                                            <?php elseif ($data->ukpd_id == 5) : ?>
                                                <td> <a href="https://maps.app.goo.gl/Hk8zbUnE6MhK1eXN9" class="btn btn-outline-secondary btn-sm" target="_blank"> <i class="bi bi-pin-map"></i> Lihat Lokasi</a> </td>
                                            <?php elseif ($data->ukpd_id == 6) : ?>
                                                <td> <a href="https://maps.app.goo.gl/zd9hLUzBP5z1kzLH7" class="btn btn-outline-secondary btn-sm" target="_blank"> <i class="bi bi-pin-map"></i> Lihat Lokasi</a> </td>
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
                            <!-- End Table with stripped rows -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->

<!-- Modal Tempat Penyimpanan -->
<div class="modal fade" id="smallModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Tempat Penyimpanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="tambah_tempat_penyimpanan" autocomplete="off">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label for="ukpd_id" class="col-form-label">UKPD:</label>
                        <select class="form-control" name="ukpd_id" id="ukpd_id">
                            <option value=""> Silahkan Pilih</option>
                            <?php foreach ($ukpd as $data) : ?>
                                <option value="<?= $data->id ?>"><?= $data->ukpd ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback error-ukpd">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tempat_penyimpanan" class="col-form-label">Tempat Penyimpanan:</label>
                        <input type="text" class="form-control" id="tempat_penyimpanan" name="tempat_penyimpanan" placeholder="cth :IRTI MONAS">
                        <div class="invalid-feedback error-tempat-penyimpanan">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="latitude" class="col-form-label">Latitude:</label>
                        <input name="latitude" id="latitude" class="form-control">
                        <div class="invalid-feedback error-latitude">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="longitude" class="col-form-label">Longitude:</label>
                        <input name="longitude" id="longitude" class="form-control">
                        <div class="invalid-feedback error-longitude">
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

<!-- Modal hapus Tempat Penyimpanan -->
<div class="modal fade" id="deleteModal" tabindex="0">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Tempat Penyimpanan</h5>
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

<!-- Modal Edit Tempat Penyimpanan -->
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Tempat Penyimpanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit_tempat_penyimpanan" autocomplete="off">
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
                        <label for="tempat_penyimpanan" class="col-form-label">Tempat Penyimpanan:</label>
                        <input type="text" class="form-control" id="tempat_penyimpanan_edit" name="tempat_penyimpanan">
                        <div class="invalid-feedback error-tempat-penyimpanan-edit">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="link_gmaps" class="col-form-label">Tempat Penyimpanan:</label>
                        <textarea name="link_gmaps" id="link_gmaps_edit" class="form-control"></textarea>
                        <div class="invalid-feedback error-link-gmaps-edit">
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

    $("#tambah_tempat_penyimpanan").submit(function(e) {
        e.preventDefault();
        let ukpd_id = $('#ukpd_id').val();
        let tempat_penyimpanan = $("#tempat_penyimpanan").val();
        let latitude = $("#latitude").val();
        let longitude = $("#longitude").val();

        $.ajax({
            url: '/admin/tempat_penyimpanan/insert',
            method: 'post',
            dataType: 'JSON',
            data: {
                ukpd_id: ukpd_id,
                tempat_penyimpanan: tempat_penyimpanan,
                latitude: latitude,
                longitude: longitude,

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
                    if (response.error.tempat_penyimpanan) {
                        $("#tempat_penyimpanan").addClass('is-invalid');
                        $(".error-tempat-penyimpanan").html(response.error.tempat_penyimpanan);
                    } else {
                        $("#tempat_penyimpanan").removeClass('is-invalid');
                        $(".error-tempat-penyimpanan").html('');
                    }
                    if (response.error.latitude) {
                        $("#latitude").addClass('is-invalid');
                        $(".error-latitude").html(response.error.latitude);
                    } else {
                        $("#latitude").removeClass('is-invalid');
                        $(".error-latitude").html('');
                    }
                    if (response.error.longitude) {
                        $("#longitude").addClass('is-invalid');
                        $(".error-longitude").html(response.error.longitude);
                    } else {
                        $("#longitude").removeClass('is-invalid');
                        $(".error-longitude").html('');
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
                $('.save').prop('disabled', false);
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
            url: '/admin/tempat_penyimpanan/edit',
            method: 'get',
            dataType: 'JSON',
            data: {
                id: id,
            },
            success: function(response) {
                $("#id_delete").val(response.tempat_penyimpanan.id);
            }
        });
    });

    $("#delete_form").submit(function(e) {
        e.preventDefault();
        let id = $("#id_delete").val();

        $.ajax({
            url: '/admin/tempat_penyimpanan/delete',
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
            url: '/admin/tempat_penyimpanan/edit',
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

                $("#id_edit").val(response.tempat_penyimpanan.id);
                $("#ukpd_id_edit").val(response.tempat_penyimpanan.ukpd_id).trigger('change');
                $("#tempat_penyimpanan_edit").val(response.tempat_penyimpanan.tempat_penyimpanan);
                $("#link_gmaps_edit").val(response.tempat_penyimpanan.link_gmaps);


            }
        });
    });

    $("#edit_tempat_penyimpanan").submit(function(e) {
        e.preventDefault();
        let id = $('#id_edit').val();
        let ukpd_id = $('#ukpd_id_edit').val();
        let tempat_penyimpanan = $('#tempat_penyimpanan_edit').val();
        let link_gmaps = $('#link_gmaps_edit').val();

        $.ajax({
            url: '/admin/tempat_penyimpanan/update',
            method: 'post',
            dataType: 'JSON',
            data: {
                id: id,
                ukpd_id: ukpd_id,
                tempat_penyimpanan: tempat_penyimpanan,
                link_gmaps: link_gmaps,
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
                    if (response.error.tempat_penyimpanan) {
                        $("#tempat_penyimpanan_edit").addClass('is-invalid');
                        $(".error-tempat-penyimpanan-edit").html(response.error.tempat_penyimpanan);
                    } else {
                        $("#tempat_penyimpanan_edit").removeClass('is-invalid');
                        $(".error-tempat-penyimpanan-edit").html('');
                    }
                    if (response.error.link_gmaps) {
                        $("#link_gmaps_edit").addClass('is-invalid');
                        $(".error-link-gmaps-edit").html(response.error.link_gmaps);
                    } else {
                        $("#link_gmaps_edit").removeClass('is-invalid');
                        $(".error-link-gmaps-edit").html('');
                    }
                } else {
                    Swal.fire({
                        icon: 'success',
                        title: `${response.success}`,
                    });
                    setTimeout(function() {
                        location.reload();
                    }, 2000)
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