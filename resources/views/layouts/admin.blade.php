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
            background-color: #d81b60; /* Pink color */
            min-height: 100vh;
            color: white;
            box-shadow: 4px 0 10px rgba(0,0,0,0.1);
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
        .sidebar a:hover, .sidebar a.active {
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
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
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
        <a href="{{ route('kategori.index') }}" class="{{ request()->routeIs('kategori.*') ? 'active' : '' }}">
            <i class="fa-solid fa-list me-3 w-20px text-center"></i> Kategori
        </a>
        <a href="{{ route('produk.index') }}" class="{{ request()->routeIs('produk.*') ? 'active' : '' }}">
            <i class="fa-solid fa-box me-3 w-20px text-center"></i> Produk
        </a>
        <a href="{{ route('member.index') }}" class="{{ request()->routeIs('member.*') ? 'active' : '' }}">
            <i class="fa-solid fa-users me-3 w-20px text-center"></i> Member
        </a>
        <a href="{{ route('transaksi.index') }}" class="{{ request()->routeIs('transaksi.*') ? 'active' : '' }}">
            <i class="fa-solid fa-receipt me-3 w-20px text-center"></i> Transaksi Parkir
        </a>
        
        <div class="mt-auto mb-4">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="text-white-50 hover-white">
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
                        <button class="btn btn-light dropdown-toggle border-0 bg-transparent fw-semibold" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'User') }}&background=d81b60&color=fff&rounded=true" alt="Avatar" class="rounded-circle me-2" style="width: 35px; height: 35px;">
                            {{ Auth::user()->name ?? 'User' }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2">
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="fa-solid fa-right-from-bracket me-2"></i> Logout
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

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
