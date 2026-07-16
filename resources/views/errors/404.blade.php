<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Halaman Tidak Ditemukan - PinkPark</title>
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
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="text-center">
        <i class="fa-solid fa-car-side text-pink mb-4" style="font-size: 5rem; color: #d81b60;"></i>
        <h1 class="display-1 fw-bold text-dark">404</h1>
        <h4 class="text-muted mb-4">Ups! Halaman yang Anda cari tidak ditemukan.</h4>
        <p class="text-secondary mb-4">Mungkin halaman telah dihapus, namanya berubah, atau sementara tidak tersedia.</p>
        <a href="{{ url('/') }}" class="btn text-white rounded-pill px-4 py-2" style="background-color: #d81b60;">
            <i class="fa-solid fa-house me-2"></i> Kembali ke Dashboard
        </a>
    </div>
</body>
</html>
