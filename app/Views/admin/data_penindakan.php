<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<main id="main" class="main">

    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">PAGES</li>
                <li class="breadcrumb-item"><a href="/admin/data_penindakan"><?= $title ?></a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $title ?></h5>
                        <div class="btn-group-sm" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                Action
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                <?php if (session()->get('role_id') == 1 || session()->get('role_id') == 2) : ?>
                                    <a href="/admin/data_penindakan/tambah_penindakan" class="dropdown-item btn-sm"><i class="bi bi-plus"></i>Tambah Data</a>
                                    <a href="/exportExcel" class="dropdown-item btn-sm"><i class="bi bi-file-earmark-excel"></i> Export Excel</a>
                                <?php endif; ?>
                            </ul>
                        </div>
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
                                            <td>
                                                <div class="btn-group-sm" role="group">
                                                    <button id="btnGroupDrop1" type="button" class="btn btn-outline-secondary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Action
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                        <?php if (session()->get('role_id') == 1) : ?>
                                                            <a class="dropdown-item btn-sm" href="/admin/data_penindakan/detail/<?= $data->nomor_bap ?>"> <i class="bi bi-eye"></i> Lihat Detail</a>
                                                            <a class="dropdown-item btn-sm" id="delete" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="<?= $data->id ?>">
                                                                <i class="bi bi-trash"></i> Hapus
                                                            </a>
                                                        <?php endif; ?>
                                                        <?php if ($data->status_bap_id == 3 || $data->status_bap_id == 4 || $data->status_bap_id == 5) : ?>
                                                            <a class="dropdown-item btn-sm" target="_blank" href="/pdf/bap_digital/<?= $data->nomor_bap ?>"><i class="bi bi-download"></i>Download BAP</a>
                                                        <?php endif; ?>
                                                    </ul>
                                                </div>
                                            </td>

                                            <td><?= $data->nomor_kendaraan ?> </td>
                                            <td><?= $data->jenis_penindakan ?> </td>
                                            <td><a href="https://goo.gl/maps/DPPnRATpuFLpvhet8"><?= $data->tempat_penyimpanan ?></a></td>
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

<!-- modal status pembayaran -->
<div class="modal fade" id="ubahStatus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Status Kendaraan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form_status">
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <input type="hidden" name="id" id="id_ubah_status" class="form-control">
                        <input type="hidden" name="bap_id" id="bap_id" class="form-control">
                        <label for="nomor_kendaraan" class="col-form-label">Nomor Kendaraan:</label>
                        <input type="text" class="form-control" id="nomor_kendaraan" name="nomor_kendaraan" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_spk_id">Jenis Surat Pengeluaran</label>
                        <select name="jenis_spk_id" id="jenis_spk_id" class="form-select">
                            <option value="">--silahkan pilih--</option>
                            <?php foreach ($jenis_spk as $jenis_spk) : ?>
                                <option value="<?= $jenis_spk->id ?>"><?= $jenis_spk->jenis_spk ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nomor_surat" class="col-form-label">Nomor Surat Pengeluaran:</label>
                        <input type="text" class="form-control" id="nomor_surat">
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
<!-- end modal pembayaran -->
<script src="/assets/vendor/jquery/jquery.js"></script>
<script>
    $(document).ready(function() {
        $('#jenis_spk_id').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#ubahStatus')
        });
    })

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
                }, 1000)
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