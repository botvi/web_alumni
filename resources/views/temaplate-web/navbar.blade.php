<nav id="navmenu" class="navmenu">
    <ul>
      <li><a href="{{ route('web.index') }}" class="{{ request()->routeIs('web.index') ? 'active' : '' }}">Halaman Utama</a></li>
      @if(!request()->routeIs('lengkapi-data.*'))
        <li><a href="{{ route('tentang.index') }}" class="{{ request()->routeIs('tentang.index') ? 'active' : '' }}">Tentang Kami</a></li>
        <li><a href="{{ route('lowongan-kerja.index') }}" class="{{ request()->routeIs('lowongan-kerja.index') ? 'active' : '' }}">Lowongan Kerja</a></li>
        <li><a href="{{ route('daftar-kegiatan-alumni.index') }}" class="{{ request()->routeIs('daftar-kegiatan-alumni.index') ? 'active' : '' }}">Daftar Kegiatan Alumni</a></li>
      @endif
    </ul>
    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
  </nav>