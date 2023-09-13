<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<link rel="stylesheet" href="/assets/signaturepad/jquery.signature.css">
<link rel="stylesheet" href="/assets/signaturepad/jquery.ui.css">

<main id="main" class="main">

    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">PAGES</li>
                <li class="breadcrumb-item"><a href="/admin/tanda_tangan_petugas">TANDA TANGAN PETUGAS</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">TANDA TANGAN PETUGAS</h5>
                        <p>
                            <button class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#smallModal">Tambah Tanda Tangan</button>
                        </p>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Petugas</th>
                                    <th scope="col">Tanda Tangan</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($tanda_tangan_petugas as $data) : ?>
                                    <tr>
                                        <th scope="row"><?= $no++ ?>. </th>
                                        <td style="vertical-align:middle;"><?= $data->nama ?> </td>
                                        <td style="vertical-align:middle;"> <img src="/<?= $data->tanda_tangan_petugas ?>" alt="" width="80"> </td>
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
    </section>
</main><!-- End #main -->

<!-- Modal Tempat Penyimpanan -->
<div class="modal fade" id="smallModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Tanda Tangan Petugas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form_tambah" autocomplete="off">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label for="petugas_id" class="col-form-label">Pilih Petugas:</label>
                        <select class="form-control" name="petugas_id" id="petugas_id">
                            <option value=""> Silahkan Pilih</option>
                            <?php foreach ($petugas as $data) : ?>
                                <option value="<?= $data->id ?>"><?= $data->nama ?> - <?= $data->nip ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback error-petugas">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="signature64" class="col-form-label">Tanda Tangan Petugas:</label>
                        <div class="signature">
                            <div id="canva"></div>
                            <div class="text-left">
                                <button id="clear" type="button" class="btn btn-outline-danger btn-xs"> <i class="fa fa-times"></i> Hapus </button>
                                <textarea id="signature64" name="tanda_tangan_petugas" style="display: none;"></textarea>
                            </div>
                            <div class="invalid-feedback error-tanda-tangan-petugas">

                            </div>
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



<script src="/assets/vendor/jquery/jquery.js"></script>
<!-- <script src="/assets/jquery/jquery.min.js"></script> -->
<script src="/assets/signaturepad/jquery.ui.min.js"></script>
<script src="/assets/signaturepad/jquery.signature.min.js"></script>
<script src="/assets/signaturepad/jquery.ui.touch-punch.min.js"></script>

<script>
    $('#widget').draggable();

    let signaturePad = $("#canva").signature({
        syncField: '#signature64',
        syncFormat: 'PNG',
        color: '#0000FF',
        scale: 2000,
        thickness: 3
        // guideline: true
    });

    $('#clear').click(function() {
        signaturePad.signature('clear');
    });

    $(document).ready(function() {
        $('#petugas_id').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#smallModal')
        });

        $('#ukpd_id_edit').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#editModal')
        });
    });

    $("#form_tambah").submit(function(e) {
        e.preventDefault();
        let petugas_id = $('#petugas_id').val();
        let tanda_tangan_petugas = $("#signature64").val();
        $.ajax({
            url: '/admin/tanda_tangan_petugas/insert',
            method: 'post',
            dataType: 'JSON',
            data: {
                petugas_id: petugas_id,
                tanda_tangan_petugas: tanda_tangan_petugas,

            },
            beforeSend: function() {
                $('.save').html('<i class="bi bi-box-arrow-in-right"></i>');
                $('.save').prop('disabled', true);
            },
            success: function(response) {
                console.log(response);
                $('.save').html('<i class="bi bi-box-arrow-in-right"></i> Kirim');
                $('.save').prop('disabled', false);
                if (response.error) {
                    if (response.error.petugas_id) {
                        $("#petugas_id").addClass('is-invalid');
                        $(".error-petugas").html(response.error.petugas_id);
                    } else {
                        $("#petugas_id").removeClass('is-invalid');
                        $(".error-petugas").html('');
                    }
                    if (response.error.tanda_tangan_petugas) {
                        $("#canva").addClass('is-invalid');
                        $(".error-tanda-tangan-petugas").html(response.error.tanda_tangan_petugas);
                    } else {
                        $("#canva").removeClass('is-invalid');
                        $(".error-tanda-tangan-petugas").html('');
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
                    icon: 'error',
                    title: `Tanda Tangan Belum Tersimpan!`,
                });
            }
        });
    });

    $(document).on('click', "#delete", function(e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        $.ajax({
            url: '/admin/tanda_tangan_petugas/edit',
            method: 'get',
            dataType: 'JSON',
            data: {
                id: id,
            },
            success: function(response) {
                console.log(response)
                $("#id_delete").val(response.id);
            }
        });
    });

    $("#delete_form").submit(function(e) {
        e.preventDefault();
        let id = $("#id_delete").val();

        $.ajax({
            url: '/admin/tanda_tangan_petugas/delete',
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
</script>
<?= $this->endSection(); ?>