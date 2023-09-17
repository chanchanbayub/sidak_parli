<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<main id="main" class="main">

    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">PAGES</li>
                <li class="breadcrumb-item"><a href="/petugas/data_penindakan"><?= $title ?></a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title"><?= $title ?></h5>
                        <span>
                            <a href="/petugas/data_penindakan/tambah_penindakan" class="btn btn-outline-secondary btn-sm"><i class="bi bi-plus">Tambah Data</i></a>
                        </span>

                        <!-- Table with stripped rows -->
                        <div class="table-responsive">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">UKPD</th>
                                        <th scope="col">Detail Data</th>
                                        <th scope="col">Nomor Kendaraan</th>
                                        <th scope="col">Jenis Penindakan</th>
                                        <th scope="col">Tempat Penyimpanan</th>
                                        <th scope="col">Tanggal Penindakan</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($data_penindakan as $data) : ?>
                                        <tr>
                                            <th scope="row"><?= $no++ ?>.</th>
                                            <td><?= $data->ukpd ?> </td>
                                            <td> <a href="data_penindakan/detail/<?= $data->nomor_bap ?>">Lihat Detail</a> </td>
                                            <td><?= $data->nomor_kendaraan ?> </td>
                                            <td><?= $data->jenis_penindakan ?> </td>
                                            <td><a href="https://goo.gl/maps/DPPnRATpuFLpvhet8" target="_blank"><?= $data->tempat_penyimpanan ?></a> </td>
                                            <td><?= $data->tanggal_pelanggaran ?></td>
                                            <?php if ($data->status_bap_id == 2 || $data->status_bap_id == 1) : ?>
                                                <td> <span class="badge bg-warning"><?= $data->status_penderekan ?></span> </td>
                                            <?php elseif ($data->status_bap_id == 3) : ?>
                                                <td> <span class="badge bg-danger"><?= $data->status_penderekan ?></span> </td>
                                            <?php elseif ($data->status_bap_id == 4) : ?>
                                                <td> <span class="badge bg-success"><?= $data->status_penderekan ?></span> </td>
                                            <?php elseif ($data->status_bap_id == 5) : ?>
                                                <td> <span class="badge bg-danger"><?= $data->status_penderekan ?></span> </td>
                                            <?php endif; ?>
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

<!-- Modal hapus Data Penindakan -->
<div class="modal fade" id="deleteModal" tabindex="0">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Data Penindakan</h5>
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
<script>
    $(document).on('click', "#delete", function(e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        $.ajax({
            url: '/admin/data_penindakan/edit',
            method: 'get',
            dataType: 'JSON',
            data: {
                id: id,
            },
            success: function(response) {
                console.log(response);
                $("#id_delete").val(response.id);

            }
        });
    });

    $("#delete_form").submit(function(e) {
        e.preventDefault();
        let id = $("#id_delete").val();
        $.ajax({
            url: '/admin/data_penindakan/delete',
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
                Swal.fire({
                    icon: 'error',
                    title: `Data Belum Tersimpan!`,
                });
            }
        });
    });
</script>


<?= $this->endSection(); ?>