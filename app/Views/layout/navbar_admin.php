<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="/admin/dashboard">
                <i class="bi bi-speedometer"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-app"></i><span>Master Data </span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/admin/ukpd">
                        <i class="bi bi-circle"></i><span>UKPD</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/jenis_penindakan">
                        <i class="bi bi-circle"></i><span>Jenis Penindakan</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/spt">
                        <i class="bi bi-circle"></i><span>Nomor Surat Tugas</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/jenis_kendaraan">
                        <i class="bi bi-circle"></i><span>Jenis Kendaraan</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/type_kendaraan">
                        <i class="bi bi-circle"></i><span>Type Kendaraan</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/tempat_penyimpanan">
                        <i class="bi bi-circle"></i><span>Tempat Penyimpanan</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/jenis_pelanggaran">
                        <i class="bi bi-circle"></i><span>Jenis Pelanggaran</span>
                    </a>
                </li>
                <?php if (session()->get('role_id') == 1) : ?>
                    <li>
                        <a href="/admin/role_management">
                            <i class="bi bi-circle"></i><span>Role Management</span>
                        </a>
                    </li>
                <?php endif; ?>
                <li>
                    <a href="/admin/jabatan">
                        <i class="bi bi-circle"></i><span>Jabatan</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/status_penderekan">
                        <i class="bi bi-circle"></i><span>Status Penderekan</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/jenis_spk">
                        <i class="bi bi-circle"></i><span>Jenis SPK</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/bap">
                        <i class="bi bi-circle"></i><span>BAP</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/kartu_identitas">
                        <i class="bi bi-circle"></i><span>Kartu Identitas</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/kendaraan_dinas">
                        <i class="bi bi-circle"></i><span>Kendaraan Dinas</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#petugas-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-columns-gap"></i><span>Master Data Petugas </span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="petugas-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/admin/unit_regu">
                        <i class="bi bi-circle"></i><span>Unit Regu</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/petugas">
                        <i class="bi bi-circle"></i><span>Petugas</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/status_petugas">
                        <i class="bi bi-circle"></i><span>Status Petugas</span>
                    </a>
                </li>

                <li>
                    <a href="/admin/tanda_tangan_petugas">
                        <i class="bi bi-circle"></i><span>Tanda Tangan Petugas</span>
                    </a>
                </li>

            </ul>
        </li><!-- End Components Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#penindakan-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-car-front"></i><span>Master Data Penderekan </span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="penindakan-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/admin/data_penindakan">
                        <i class="bi bi-circle"></i><span>Data Penderekan</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#ocp-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bicycle"></i><span>Penindakan Roda 2 </span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="ocp-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/admin/ocp">
                        <i class="bi bi-circle"></i><span>OCP</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/angkut_motor">
                        <i class="bi bi-circle"></i><span>Angkut Motor </span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#pengeluaran-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-database-lock"></i><span>Surat Pengeluaran </span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="pengeluaran-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/admin/surat_pengeluaran">
                        <i class="bi bi-circle"></i><span>Surat Pengeluaran Kendaraan</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->

    </ul>

</aside><!-- End Sidebar-->