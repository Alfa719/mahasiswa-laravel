<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <h2>
            <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
              <i class="ni ni-atom"></i>
            </div>
            Mahasiswa
          </h2>
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link {{ request()->is('/') ? 'active text-white bg-orange font-weight-bold' : '' }}" href="{{route('dashboard')}}">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Beranda</span>
              </a>
            </li>
          </ul>
          <!-- Divider -->
          <hr class="my-3">
          <!-- Heading -->
          <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Data</span>
          </h6>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link {{ request()->is('mahasiswa') ? 'active text-white bg-orange font-weight-bold' : '' }}" href="{{route('IndexMahasiswa')}}">
                <i class="ni ni-single-02 text-green"></i>
                <span class="nav-link-text">Mahasiswa</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->is('dosen') ? 'active text-white bg-orange font-weight-bold' : '' }}" href="{{route('IndexDosen')}}">
                <i class="ni ni-single-02 text-primary"></i>
                <span class="nav-link-text">Dosen</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->is('prodi') ? 'active text-white bg-orange font-weight-bold' : '' }}" href="{{route('IndexProdi')}}">
                <i class="ni ni-bullet-list-67 text-default"></i>
                <span class="nav-link-text">Prodi</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->is('matkul') ? 'active text-white bg-orange font-weight-bold' : '' }}" href="{{route('IndexMatkul')}}">
                <i class="ni ni-books text-green"></i>
                <span class="nav-link-text">Mata Kuliah</span>
              </a>
            </li>
          </ul>
          <!-- Divider -->
          <hr class="my-3">
          <!-- Heading -->
          <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Features</span>
          </h6>
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link {{ request()->is('jadwal') ? 'active text-white bg-orange font-weight-bold' : '' }}" href="{{route('IndexJadwal')}}">
                <i class="ni ni-calendar-grid-58 text-primary"></i>
                <span class="nav-link-text">Jadwal</span>
              </a>
            </li>
          </ul>
          <!-- Divider -->
          <hr class="my-3">
          <!-- Heading -->
          <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Settings</span>
          </h6>
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link {{ request()->is('pengaturan') ? 'active text-white bg-orange font-weight-bold' : '' }}" href="{{route('PengaturanProfil')}}">
                <i class="ni ni-settings-gear-65 text-defaut"></i>
                <span class="nav-link-text">Pengaturan</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>