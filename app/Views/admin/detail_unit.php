<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<main id="main" class="main">

    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">

                <li class="breadcrumb-item">PAGES</li>
                <li class="breadcrumb-item"><a href="/admin/dashboard">KEMBALI</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-12">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Data Unit / Regu<on>
                            </li>
                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                <div class="row">
                                    <table class="table">
                                        <?php $no = 1; ?>
                                        <?php foreach ($unit_regu as $unit) : ?>
                                            <thead>
                                                <tr>
                                                    <th><?= $no++; ?>.</th>
                                                    <th> <?= $unit->unit_regu ?> </th>
                                                    <th> <a href="unit_regu_detail/<?= $unit->id ?>" class="btn btn-outline-primary btn-sm"><i class="bi bi-eye"></i></a></th>
                                                </tr>
                                            </thead>
                                        <?php endforeach; ?>
                                    </table>

                                </div>


                            </div>


                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

</main><!-- End #main -->

<script src="/assets/vendor/jquery/jquery.js"></script>


<?= $this->endSection(); ?>