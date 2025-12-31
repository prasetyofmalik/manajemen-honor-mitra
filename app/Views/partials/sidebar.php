<div class="collapse show collapse-horizontal border-end shadow-sm bg-sidebar text-white" id="sidebarMenu" style="width: 260px; min-height: 100vh;">
    <div class="d-flex flex-column p-3 h-100" style="width: 260px;">

        <div class="d-flex align-items-center mb-4 px-2">
            <div class="bg-white rounded-3 p-1 me-2">
                <i class="bi bi-database-fill-gear text-primary fs-4"></i>
            </div>
        </div>

        <!-- <hr class="border-light opacity-10 mb-4"> -->

        <ul class="nav nav-pills flex-column mb-auto gap-1">
            <li class="nav-item">
                <a href="/dashboard" class="nav-link <?= (current_url(true)->getSegment(1) == 'dashboard') ? 'active' : 'nav-link-custom' ?>">
                    <i class="bi bi-speedometer2 me-3"></i>Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="/kegiatan-mitra" class="nav-link <?= (current_url(true)->getSegment(1) == 'kegiatan-mitra') ? 'active' : 'nav-link-custom' ?>">
                    <i class="bi bi-pencil-square me-3"></i>Input Honor
                </a>
            </li>

            <li class="nav-item">
                <a href="/mitra" class="nav-link <?= (current_url(true)->getSegment(1) == 'mitra') ? 'active' : 'nav-link-custom' ?>">
                    <i class="bi bi-people me-3"></i>Database Mitra
                </a>
            </li>
            <li class="nav-item">
                <a href="/survei" class="nav-link <?= (current_url(true)->getSegment(1) == 'survei') ? 'active' : 'nav-link-custom' ?>">
                    <i class="bi bi-journal-text me-3"></i>Daftar Survei
                </a>
            </li>
        </ul>
    </div>
</div>