<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <button type="button" id="sidebarCollapse" class="navbar-btn d-md-none me-3">
            <i class="fas fa-bars"></i>
        </button>

        <form class="d-flex w-50 ms-3 d-none d-md-flex">
            <div class="input-group">
                <span class="input-group-text bg-light border-0" id="search-addon"><i class="fas fa-search text-muted"></i></span>
                <input type="text" class="form-control bg-light border-0 shadow-none" placeholder="Cari sesuatu..." aria-label="Search" aria-describedby="search-addon">
            </div>
        </form>

        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
            <!-- Notifications Dropdown -->
            <li class="nav-item dropdown me-3">
                <a class="nav-link position-relative" href="#" id="navbarDropdownNotification" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-bell fs-5"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger border border-light">
                        3
                        <span class="visually-hidden">notifikasi belum dibaca</span>
                    </span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2" aria-labelledby="navbarDropdownNotification">
                    <li><h6 class="dropdown-header">Notifikasi</h6></li>
                    <li><a class="dropdown-item py-2" href="#">
                        <div class="d-flex align-items-center">
                            <div class="bg-primary-subtle text-primary p-2 rounded-circle me-3"><i class="fas fa-car"></i></div>
                            <div>
                                <p class="mb-0 fw-semibold">B 1234 CD Masuk</p>
                                <small class="text-muted">2 menit yang lalu</small>
                            </div>
                        </div>
                    </a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item py-2" href="#">
                        <div class="d-flex align-items-center">
                            <div class="bg-success-subtle text-success p-2 rounded-circle me-3"><i class="fas fa-check"></i></div>
                            <div>
                                <p class="mb-0 fw-semibold">Pembayaran Sukses</p>
                                <small class="text-muted">15 menit yang lalu</small>
                            </div>
                        </div>
                    </a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-center text-primary fw-bold" href="#">Lihat Semua Notifikasi</a></li>
                </ul>
            </li>

            <!-- Profile Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdownProfile" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://ui-avatars.com/api/?name=Admin+PinkPark&background=FF4F81&color=fff" alt="Profile" class="profile-img me-2">
                    <span class="d-none d-md-inline fw-semibold">Admin</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2" aria-labelledby="navbarDropdownProfile">
                    <li><a class="dropdown-item" href="{{ route('profil') }}"><i class="fas fa-user fa-sm fa-fw me-2 text-muted"></i> Profil Saya</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-cog fa-sm fa-fw me-2 text-muted"></i> Pengaturan</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-danger" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2"></i> Keluar</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
