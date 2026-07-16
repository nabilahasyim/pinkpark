<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'PinkPark') }} - Login</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <!-- Google Fonts Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

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
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(255, 79, 129, 0.1);
            overflow: hidden;
            width: 100%;
            max-width: 450px;
        }

        .login-header {
            background-color: white;
            padding: 30px 20px 20px;
            text-align: center;
            border-bottom: 1px solid rgba(0,0,0,0.05);
        }

        .login-header h3 {
            color: var(--primary-color);
            font-weight: 700;
            margin-bottom: 0;
        }

        .login-body {
            background-color: white;
            padding: 30px;
        }

        .form-control {
            border-radius: 8px;
            padding: 12px 15px;
            border: 1px solid #e0e0e0;
        }

        .form-control:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 0.25rem rgba(255, 133, 162, 0.25);
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            border-radius: 8px;
            padding: 12px;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            background-color: #e63968;
            border-color: #e63968;
            box-shadow: 0 4px 10px rgba(255, 79, 129, 0.3);
        }
        
        .text-primary {
            color: var(--primary-color) !important;
        }
        
        a.text-primary:hover {
            color: #e63968 !important;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center">
        <div class="login-card">
            <div class="login-header">
                <h3><i class="fas fa-parking me-2"></i>PinkPark</h3>
                <p class="text-muted mt-2 mb-0">Sistem Manajemen Parkir</p>
            </div>
            <div class="login-body">
                {{ $slot }}
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
