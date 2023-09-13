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

    <section class="section profile">
        <div class="row">

            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <?php if ($kdo != null) : ?>
                            <img src="/kdo/<?= $kdo->foto_kendaraan_dinas ?>" alt="Profile" class="img-fluid">
                            <h4><?= $kdo->merk_kendaraan_dinas ?></h4>
                            <h4><?= $kdo->nomor_kendaraan_dinas ?></h4>
                        <?php else : ?>
                            <h3>Foto Kendaraan Tidak ada</h3>
                        <?php endif; ?>

                    </div>
                </div>

            </div>

            <div class="col-md-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Personel Unit / Regu</button>
                            </li>
                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">NIP</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($personel_unit as $unit) : ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $unit->nama ?></td>
                                                <td><?= $unit->nip ?></td>
                                                <td><?= $unit->status_petugas ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>


                </div>
            </div>
    </section>
</main><!-- End #main -->
<script src="/assets/vendor/jquery/jquery.js"></script>
<script>
    $(document).ready(function() {
        $('#ukpd_id').select2({
            theme: 'bootstrap4',
        });

        $('#unit_id').select2({
            theme: 'bootstrap4',
        });

        $('#jabatan_id').select2({
            theme: 'bootstrap4',
        });

        $('#role_id').select2({
            theme: 'bootstrap4',
        });

        $('#status_id').select2({
            theme: 'bootstrap4',
        });
    });

    $("#update_profile").submit(function(e) {
        e.preventDefault();

        let id = $("#id").val();
        let ukpd_id = $('#ukpd_id').val();
        let unit_id = $('#unit_id').val();
        let nama = $('#nama').val();
        let username = $('#username').val();
        let nip = $('#nip').val();
        let golongan = $('#golongan').val();
        let pangkat = $('#pangkat').val();
        let jabatan_id = $('#jabatan_id').val();
        let role_id = $('#role_id').val();
        let status_id = $('#status_id').val();

        // alert(nama);

        $.ajax({
            url: '/admin/user_profile/update',
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
                status_id: status_id
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
                    if (response.error.username) {
                        $("#username").addClass('is-invalid');
                        $(".error-username").html(response.error.username);
                    } else {
                        $("#username").removeClass('is-invalid');
                        $(".error-username").html('');
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
                        window.location.replace(`${response.url}`);
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
</script>


<?= $this->endSection(); ?>