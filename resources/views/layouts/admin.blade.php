<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard PinkPark')</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Inter', sans-serif;
        }

        .sidebar {
            background-color: #d81b60;
            /* Pink color */
            min-height: 100vh;
            color: white;
            box-shadow: 4px 0 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar a {
            color: rgba(255, 255, 255, 0.85);
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 12px 20px;
            border-radius: 8px;
            margin: 5px 15px;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
            transform: translateX(5px);
        }

        .sidebar .logo {
            font-size: 1.5rem;
            font-weight: 700;
            text-align: center;
            padding: 25px 0;
            margin-bottom: 10px;
            letter-spacing: 1px;
        }

        .content-area {
            flex: 1;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
        }

        .navbar-custom {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 15px 25px;
        }

        .text-pink {
            color: #d81b60 !important;
        }

        .bg-pink {
            background-color: #d81b60 !important;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #d81b60;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #c2185b;
        }

        /* Navbar Dropdown NiceAdmin Style */
        .navbar-custom .dropdown-menu {
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1) !important;
            border: none;
            padding: 0 0 10px 0;
            animation: fadeInDropdown 0.3s ease;
            min-width: 240px;
        }
        
        @keyframes fadeInDropdown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .navbar-custom .dropdown-item {
            padding: 10px 20px;
            font-size: 14.5px;
            font-weight: 500;
            color: #444;
            transition: all 0.2s ease-in-out;
        }

        .navbar-custom .dropdown-item:hover, 
        .navbar-custom .dropdown-item:focus {
            background-color: #fff0f5;
            color: #d81b60;
        }
        
        .navbar-custom .dropdown-item i {
            font-size: 16px;
            color: #899bbd;
            transition: all 0.2s ease-in-out;
        }

        .navbar-custom .dropdown-item:hover i {
            color: #d81b60;
        }

        .navbar-custom .dropdown-item.text-danger:hover {
            color: #dc3545;
            background-color: #f8d7da;
        }

        .navbar-custom .dropdown-item.text-danger i {
            color: #dc3545;
        }
    </style>
</head>

<body class="d-flex">

    <!-- Sidebar -->
    <div class="sidebar d-flex flex-column" style="width: 260px; flex-shrink: 0;">
        <div class="logo">
            <i class="fa-solid fa-car-side me-2"></i> PinkPark
        </div>
        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="fa-solid fa-house me-3 w-20px text-center"></i> Dashboard
        </a>
        @if (auth()->user() && auth()->user()->role === 'admin')
            <a href="{{ route('kategori.index') }}" class="{{ request()->routeIs('kategori.*') ? 'active' : '' }}">
                <i class="fa-solid fa-list me-3 w-20px text-center"></i> Kategori
            </a>
            <a href="{{ route('produk.index') }}" class="{{ request()->routeIs('produk.*') ? 'active' : '' }}">
                <i class="fa-solid fa-box me-3 w-20px text-center"></i> Produk
            </a>
            <a href="{{ route('member.index') }}" class="{{ request()->routeIs('member.*') ? 'active' : '' }}">
                <i class="fa-solid fa-users me-3 w-20px text-center"></i> Member
            </a>
        @endif
        <a href="{{ route('transaksi-parkir.index') }}"
            class="{{ request()->routeIs('transaksi-parkir.*') ? 'active' : '' }}">
            <i class="fa-solid fa-receipt me-3"></i>
            Transaksi Parkir
        </a>

        <div class="mt-auto mb-4">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"
                    class="text-white-50 hover-white">
                    <i class="fa-solid fa-right-from-bracket me-3 w-20px text-center"></i> Logout
                </a>
            </form>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="content-area">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-custom">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h4 fw-bold text-pink">@yield('header', 'Dashboard')</span>

                <div class="ms-auto d-flex align-items-center">
                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle border-0 bg-transparent fw-semibold d-flex align-items-center" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'User') }}&background=d81b60&color=fff&rounded=true"
                                alt="Avatar" class="rounded-circle me-2 shadow-sm" style="width: 38px; height: 38px; object-fit: cover;">
                            <span class="d-none d-md-block">{{ Auth::user()->name ?? 'User' }}</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end mt-2">
                            <li class="dropdown-header text-center p-3 border-bottom mb-2 bg-light rounded-top-3">
                                <h6 class="fw-bold mb-1 text-dark fs-6">{{ Auth::user()->name ?? 'User' }}</h6>
                                <span class="text-muted small text-capitalize">{{ Auth::user()->role ?? 'Admin' }}</span>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <i class="fa-regular fa-user me-3"></i>
                                    <span>Profil Saya</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <i class="fa-solid fa-gear me-3"></i>
                                    <span>Pengaturan Akun</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <i class="fa-solid fa-key me-3"></i>
                                    <span>Ubah Password</span>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider my-2">
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <i class="fa-regular fa-circle-question me-3"></i>
                                    <span>Bantuan</span>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider my-2">
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}" class="m-0 p-0">
                                    @csrf
                                    <button type="submit" class="dropdown-item d-flex align-items-center text-danger w-100 border-0 bg-transparent">
                                        <i class="fa-solid fa-right-from-bracket me-3"></i>
                                        <span>Keluar</span>
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Content -->
        <div class="p-4 flex-grow-1" style="overflow-y: auto;">
            @yield('content')
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Session Success Alert
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true
            });
        @endif

        // Delete Confirmation
        document.querySelectorAll('.form-delete').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d81b60',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
</body>

</html>
