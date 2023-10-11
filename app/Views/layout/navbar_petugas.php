<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="/petugas/dashboard">
                <i class="bi bi-speedometer"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#penindakan-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-database-lock"></i><span>Penindakan Roda 4 </span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="penindakan-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/petugas/data_penindakan">
                        <i class="bi bi-circle"></i><span>Data Penderekan</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#angkut-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bicycle"></i><span>Penindakan Roda 2 </span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="angkut-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/petugas/angkut_motor">
                        <i class="bi bi-circle"></i><span>Angkut Motor</span>
                    </a>
                </li>
                <li>
                    <a href="/petugas/ocp">
                        <i class="bi bi-circle"></i><span>OPS Cabut Pentil</span>
                    </a>
                </li>

            </ul>
        </li><!-- End Components Nav -->

    </ul>

</aside><!-- End Sidebar-->