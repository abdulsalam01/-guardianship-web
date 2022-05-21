<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon">
            <i class="fab fa-laravel"></i>
        </div>
        <div class="sidebar-brand-text mx-3">K-PERWALIAN</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    @can('admin')
        <li class="nav-item {{ Request::is('admin') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
    @endcan

    @can('user')
        @if (Auth::user()->roles == 'student')
            <li class="nav-item {{ Request::is('mahasiswa') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('mahasiswa') }}">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Home</span></a>
            </li>
        @else
            <li class="nav-item {{ Request::is('dosen') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dosen') }}">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Home</span></a>
            </li>
        @endif
    @endCan

    <!-- Divider -->
    <hr class="sidebar-divider">

    @can('admin')
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                aria-controls="collapseOne">
                <i class="fas fa-fw fa-table"></i>
                <span>Master Data</span>
            </a>
            <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('user.index') }}">Mahasiswa</a>
                    <a class="collapse-item" href="{{ route('teacher.index') }}">Dosen</a>
                    <a class="collapse-item" href="{{ route('jurusan.index') }}">Jurusan</a>
                </div>
            </div>
        </li>
    @endcan

    @can('admin')
        <li class="nav-item {{ Request::is('admin/perwalian') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('perwalian.index') }}">
                <i class="fas fa-fw fa-user"></i>
                <span>Perwalian</span></a>
        </li>
    @endcan

    @can('user')
        @if (Auth::user()->roles == 'student')
            <li class="nav-item {{ Request::is('mahasiswa/perwalian') ? 'active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                    aria-controls="collapseOne">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Perwalian</span>
                </a>
                <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('perwalian-mahasiswa') }}">Input Perwalian</a>
                        <a class="collapse-item" href="{{ route('perwalian-mahasiswa.list') }}">Hasil Perwalian</a>
                    </div>
                </div>
            </li>

            <li class="nav-item {{ Request::is('mahasiswa/akun') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('akun-mahasiswa') }}">
                    <i class="fas fa-fw fa-user-cog"></i>
                    <span>Pengaturan Akun</span></a>
            </li>
        @else
            <li class="nav-item {{ Request::is('dosen/perwalian-dosen') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('perwalian-dosen.index') }}">
                    <i class="fas fa-fw fa-clipboard-list"></i>
                    <span>Perwalian</span></a>
            </li>
            <li class="nav-item {{ Request::is('dosen/akun') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('akun-dosen') }}">
                    <i class="fas fa-fw fa-user-cog"></i>
                    <span>Pengaturan Akun</span></a>
            </li>
        @endif
    @endcan

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline mt-5">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
