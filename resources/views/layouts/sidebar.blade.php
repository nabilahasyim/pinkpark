<nav id="sidebar">
    <div class="sidebar-header">
        <h3 class="fw-bold"><i class="fas fa-parking me-2"></i>PinkPark</h3>
    </div>

    <ul class="list-unstyled components mt-3">
        <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}">
                <i class="fas fa-home"></i> Dashboard
            </a>
        </li>
        
        <p class="text-uppercase fw-bold mb-0 mt-3" style="font-size: 0.75rem; letter-spacing: 1px;">Menu Utama</p>
        
        <li class="{{ request()->routeIs('master-data.*') ? 'active' : '' }}">
            <a href="#masterDataSubmenu" data-bs-toggle="collapse" aria-expanded="{{ request()->routeIs('master-data.*') ? 'true' : 'false' }}" class="dropdown-toggle">
                <i class="fas fa-database"></i> Master Data
            </a>
            <ul class="collapse list-unstyled {{ request()->routeIs('master-data.*') ? 'show' : '' }}" id="masterDataSubmenu">
                <li class="{{ request()->routeIs('master-data.jenis-kendaraan') ? 'active' : '' }}">
                    <a href="{{ route('master-data.jenis-kendaraan') }}">Jenis Kendaraan</a>
                </li>
                <li class="{{ request()->routeIs('master-data.kendaraan') ? 'active' : '' }}">
                    <a href="{{ route('master-data.kendaraan') }}">Kendaraan</a>
                </li>
                <li class="{{ request()->routeIs('master-data.anggota') ? 'active' : '' }}">
                    <a href="{{ route('master-data.anggota') }}">Anggota</a>
                </li>
                <li class="{{ request()->routeIs('master-data.area-parkir') ? 'active' : '' }}">
                    <a href="{{ route('master-data.area-parkir') }}">Area Parkir</a>
                </li>
                <li class="{{ request()->routeIs('master-data.slot-parkir') ? 'active' : '' }}">
                    <a href="{{ route('master-data.slot-parkir') }}">Slot Parkir</a>
                </li>
            </ul>
        </li>

        <li class="{{ request()->routeIs('transaksi.*') ? 'active' : '' }}">
            <a href="#transaksiSubmenu" data-bs-toggle="collapse" aria-expanded="{{ request()->routeIs('transaksi.*') ? 'true' : 'false' }}" class="dropdown-toggle">
                <i class="fas fa-exchange-alt"></i> Transaksi
            </a>
            <ul class="collapse list-unstyled {{ request()->routeIs('transaksi.*') ? 'show' : '' }}" id="transaksiSubmenu">
                <li class="{{ request()->routeIs('transaksi.masuk') ? 'active' : '' }}">
                    <a href="{{ route('transaksi.masuk') }}">Kendaraan Masuk</a>
                </li>
                <li class="{{ request()->routeIs('transaksi.keluar') ? 'active' : '' }}">
                    <a href="{{ route('transaksi.keluar') }}">Kendaraan Keluar</a>
                </li>
            </ul>
        </li>

        <li class="{{ request()->routeIs('pembayaran') ? 'active' : '' }}">
            <a href="{{ route('pembayaran') }}">
                <i class="fas fa-money-bill-wave"></i> Pembayaran
            </a>
        </li>

        <li class="{{ request()->routeIs('laporan') ? 'active' : '' }}">
            <a href="{{ route('laporan') }}">
                <i class="fas fa-chart-bar"></i> Laporan
            </a>
        </li>
        
        <p class="text-uppercase fw-bold mb-0 mt-3" style="font-size: 0.75rem; letter-spacing: 1px;">Pengaturan</p>
        
        <li class="{{ request()->routeIs('profil') ? 'active' : '' }}">
            <a href="{{ route('profil') }}">
                <i class="fas fa-user-circle"></i> Profil
            </a>
        </li>
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-link text-danger text-start text-decoration-none d-block w-100 p-0" style="padding: 12px 20px !important;">
                    <i class="fas fa-sign-out-alt"></i> Keluar
                </button>
            </form>
        </li>
    </ul>
</nav>
