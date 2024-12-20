<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hệ thống quản lý phòng thực hành</title>

    <!-- Liên kết với Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Liên kết với Font Awesome (tùy chọn) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Thêm các style tùy chỉnh nếu cần -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding-top: 60px;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .navbar {
            background-color: #007bff;
        }
        .navbar .navbar-brand, .navbar .nav-link {
            color: #fff !important;
        }
        .navbar .nav-link:hover {
            color: #d4d4d4 !important;
        }
        .hero-section {
            text-align: center;
            padding: 30px 0;
            background: linear-gradient(to right, #007bff, #0056b3);
            color: #fff;
            margin-bottom: 20px;
            font-size: 1.2rem;
        }
        .container {
            max-width: 1200px;
        }
        .footer {
            background-color: #007bff;
            color: #fff;
            padding: 10px 0;
            text-align: center;
            margin-top: auto;
            font-size: 0.9rem;
        }
        .footer a {
            color: #d4d4d4;
            text-decoration: none;
        }
        .footer a:hover {
            color: #fff;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('issues.index') }}">
                <i class="fas fa-cogs"></i> Quản lý phòng thực hành
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('issues.index') }}">
                            <i class="fas fa-list"></i> Danh sách vấn đề
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('issues.create') }}">
                            <i class="fas fa-plus-circle"></i> Tạo vấn đề mới
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero-section">
        <h1>Chào mừng đến với hệ thống quản lý phòng thực hành</h1>
        <p>Quản lý các vấn đề một cách dễ dàng và hiệu quả</p>
    </div>

    <!-- Content -->
    <div class="container">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 Hệ thống quản lý phòng thực hành. Được phát triển bởi <a href="#">Nhóm của bạn</a>.</p>
        </div>
    </footer>

    <!-- Liên kết với Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
