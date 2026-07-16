<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'PinkPark' }} - Sistem Manajemen Parkir</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <!-- Google Fonts Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #FF4F81;
            --secondary-color: #FF85A2;
            --bg-color: #FFF5F8;
            --text-dark: #333333;
            --text-muted: #6c757d;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-dark);
            overflow-x: hidden;
        }

        /* Sidebar Styling */
        #sidebar {
            min-width: 250px;
            max-width: 250px;
            min-height: 100vh;
            background: white;
            transition: all 0.3s;
            box-shadow: 2px 0 10px rgba(0,0,0,0.05);
            z-index: 1000;
        }

        #sidebar .sidebar-header {
            padding: 20px;
            background: white;
            text-align: center;
            border-bottom: 1px solid rgba(255, 79, 129, 0.1);
        }

        #sidebar .sidebar-header h3 {
            color: var(--primary-color);
            font-weight: 700;
            margin: 0;
            font-size: 1.5rem;
        }

        #sidebar ul p {
            color: var(--text-muted);
            padding: 10px;
        }

        #sidebar ul li a {
            padding: 12px 20px;
            font-size: 1rem;
            display: block;
            color: var(--text-dark);
            text-decoration: none;
            transition: all 0.3s;
            border-left: 4px solid transparent;
        }

        #sidebar ul li a:hover, #sidebar ul li.active > a {
            color: var(--primary-color);
            background: var(--bg-color);
            border-left: 4px solid var(--primary-color);
        }

        #sidebar ul li a i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        #sidebar ul li ul {
            background: #fafafa;
            padding-left: 0;
            list-style: none;
        }

        #sidebar ul li ul li a {
            padding-left: 50px;
            font-size: 0.9rem;
        }

        a[data-bs-toggle="collapse"] {
            position: relative;
        }

        .dropdown-toggle::after {
            display: block;
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
        }

        /* Content Styling */
        #content {
            width: 100%;
            min-height: 100vh;
            transition: all 0.3s;
            display: flex;
            flex-direction: column;
        }

        /* Navbar Styling */
        .navbar {
            padding: 15px 25px;
            background: white;
            border: none;
            border-radius: 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .navbar-btn {
            box-shadow: none;
            outline: none !important;
            border: none;
            background: var(--bg-color);
            color: var(--primary-color);
            border-radius: 8px;
            padding: 8px 15px;
        }

        .navbar-btn:hover {
            background: var(--primary-color);
            color: white;
        }

        .nav-link {
            color: var(--text-dark) !important;
            font-weight: 500;
        }

        .nav-link:hover {
            color: var(--primary-color) !important;
        }

        /* Badges */
        .badge-notification {
            position: absolute;
            top: 5px;
            right: 5px;
            background-color: var(--primary-color);
        }

        /* Profile Dropdown */
        .profile-img {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--primary-color);
        }

        /* Breadcrumb */
        .breadcrumb-wrapper {
            background: white;
            padding: 15px 25px;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.02);
        }

        .breadcrumb {
            margin-bottom: 0;
        }

        .breadcrumb-item a {
            color: var(--secondary-color);
            text-decoration: none;
        }

        .breadcrumb-item.active {
            color: var(--text-muted);
            font-weight: 500;
        }

        /* Main Content Area */
        .main-content {
            padding: 25px;
            flex-grow: 1;
        }

        /* Cards */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.03);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.06);
        }

        .card-header {
            background-color: white;
            border-bottom: 1px solid rgba(0,0,0,0.05);
            border-radius: 12px 12px 0 0 !important;
            padding: 15px 20px;
            font-weight: 600;
            color: var(--primary-color);
        }

        /* Buttons */
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            border-radius: 8px;
            padding: 8px 20px;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-primary:hover, .btn-primary:focus, .btn-primary:active {
            background-color: #e63968 !important;
            border-color: #e63968 !important;
            box-shadow: 0 4px 10px rgba(255, 79, 129, 0.3) !important;
        }

        /* Footer */
        footer {
            background: white;
            padding: 20px;
            text-align: center;
            color: var(--text-muted);
            font-size: 0.9rem;
            border-top: 1px solid rgba(0,0,0,0.05);
            margin-top: auto;
        }

        /* Responsive */
        @media (max-width: 768px) {
            #sidebar {
                margin-left: -250px;
                position: fixed;
                height: 100vh;
            }
            #sidebar.active {
                margin-left: 0;
            }
            .wrapper {
                display: flex;
            }
        }
        
        .wrapper {
            display: flex;
            align-items: stretch;
        }
    </style>
</head>
<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        @include('layouts.sidebar')

        <!-- Page Content  -->
        <div id="content">
            <!-- Navbar -->
            @include('layouts.navbar')

            <!-- Main Content -->
            <div class="main-content">
                <!-- Breadcrumb -->
                <div class="breadcrumb-wrapper d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 fw-bold" style="color: var(--text-dark);">{{ $title ?? 'Dashboard' }}</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fas fa-home"></i></a></li>
                            @if(isset($title) && $title !== 'Dashboard')
                                <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                            @endif
                        </ol>
                    </nav>
                </div>

                <!-- Flash Messages (Optional Placeholder) -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- Dynamic Content -->
                @yield('content')
            </div>

            <!-- Footer -->
            @include('layouts.footer')
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            const sidebarCollapse = document.getElementById('sidebarCollapse');
            const sidebar = document.getElementById('sidebar');

            sidebarCollapse.addEventListener('click', function() {
                sidebar.classList.toggle('active');
            });
        });
    </script>
</body>
</html>
