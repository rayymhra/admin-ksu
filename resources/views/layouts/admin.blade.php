<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Rumah KSU</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #CB423F;
            --primary-dark: #a73632;
            --primary-light: #e94e49;
            --bg-light: #f8fafc;
            --text-dark: #1e293b;
            --text-muted: #64748b;
            --border-light: #e2e8f0;
            --shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            --sidebar-width: 280px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: var(--bg-light);
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text-dark);
            line-height: 1.6;
        }

        /* Modern Sidebar */
        .sidebar {
            background: white;
            min-height: 100vh;
            width: var(--sidebar-width);
            box-shadow: var(--shadow-lg);
            border-right: 1px solid var(--border-light);
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease;
        }

        .sidebar .brand {
            padding: 1.5rem;
            border-bottom: 1px solid var(--border-light);
            background: white;
        }

        .sidebar .brand h4 {
            color: var(--primary-color);
            font-weight: 700;
            margin: 0;
            font-size: 1.25rem;
            letter-spacing: -0.025em;
        }

        .sidebar .nav-section {
            padding: 1rem 0;
            flex-grow: 1;
        }

        .sidebar .nav-link {
            color: var(--text-muted);
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            transition: all 0.2s ease;
            margin: 0.25rem 0.75rem;
            font-weight: 500;
            display: flex;
            align-items: center;
        }

        .sidebar .nav-link:hover {
            background: rgba(203, 66, 63, 0.08);
            color: var(--primary-color);
        }

        .sidebar .nav-link.active {
            background: var(--primary-color);
            color: white;
            box-shadow: 0 4px 6px rgba(203, 66, 63, 0.2);
        }

        .sidebar .nav-link i {
            width: 1.25rem;
            font-size: 1rem;
            margin-right: 0.75rem;
        }

        /* User Profile Section */
        .user-profile {
            padding: 1.5rem;
            border-top: 1px solid var(--border-light);
            background: white;
        }

        .user-profile .dropdown-toggle {
            background: transparent;
            border-radius: 0.5rem;
            padding: 0.75rem;
            width: 100%;
            text-align: left;
            border: 1px solid var(--border-light);
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
        }

        .user-profile .dropdown-toggle:hover {
            background: rgba(203, 66, 63, 0.05);
            border-color: var(--primary-light);
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 0.75rem;
        }

        /* Main Content */
        .main-content {
            background: var(--bg-light);
            min-height: 100vh;
            margin-left: var(--sidebar-width);
            transition: margin-left 0.3s ease;
        }

        .content-header {
            background: white;
            box-shadow: var(--shadow);
            border-bottom: 1px solid var(--border-light);
            padding: 1.5rem 2rem;
            margin-bottom: 2rem;
        }

        .content-header h1 {
            color: var(--text-dark);
            font-weight: 700;
            margin: 0;
            font-size: 1.75rem;
        }

        .content-header .breadcrumb {
            background: none;
            padding: 0;
            margin: 0.5rem 0 0 0;
        }

        .content-header .breadcrumb-item {
            color: var(--text-muted);
            font-size: 0.875rem;
        }

        .content-header .breadcrumb-item.active {
            color: var(--primary-color);
            font-weight: 500;
        }

        /* Cards */
        .card {
            border: none;
            border-radius: 0.75rem;
            box-shadow: var(--shadow);
            transition: all 0.2s ease;
            background: white;
            overflow: hidden;
        }

        .card:hover {
            box-shadow: var(--shadow-lg);
        }

        .card-header {
            background: white;
            color: var(--text-dark);
            border-bottom: 1px solid var(--border-light);
            padding: 1.25rem 1.5rem;
            font-weight: 600;
            display: flex;
            align-items: center;
        }

        .card-header i {
            margin-right: 0.5rem;
            color: var(--primary-color);
        }

        .card-body {
            padding: 1.5rem;
        }

        /* Buttons */
        .btn-primary-custom {
            background: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
            font-weight: 500;
            border-radius: 0.5rem;
            padding: 0.625rem 1.25rem;
            transition: all 0.2s ease;
        }

        .btn-primary-custom:hover {
            background: var(--primary-dark);
            border-color: var(--primary-dark);
            color: white;
            box-shadow: 0 4px 12px rgba(203, 66, 63, 0.3);
        }

        .btn-outline-primary-custom {
            border-color: var(--primary-color);
            color: var(--primary-color);
            font-weight: 500;
            border-radius: 0.5rem;
            padding: 0.625rem 1.25rem;
            transition: all 0.2s ease;
        }

        .btn-outline-primary-custom:hover {
            background: var(--primary-color);
            color: white;
        }

        /* Alerts */
        .alert {
            border: none;
            border-radius: 0.75rem;
            box-shadow: var(--shadow);
            padding: 1rem 1.25rem;
            display: flex;
            align-items: center;
        }

        .alert i {
            margin-right: 0.75rem;
            font-size: 1.25rem;
        }

        .alert-success {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
        }

        /* Form Elements */
        .form-control, .form-select {
            border: 1px solid var(--border-light);
            border-radius: 0.5rem;
            padding: 0.75rem 1rem;
            transition: all 0.2s ease;
            background: white;
            font-size: 0.9375rem;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(203, 66, 63, 0.15);
        }

        .form-label {
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
            font-size: 0.9375rem;
        }

        /* Tables */
        .table {
            border-radius: 0.75rem;
            overflow: hidden;
            box-shadow: var(--shadow);
        }

        .table thead th {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 1rem;
            font-weight: 600;
        }

        .table tbody td {
            padding: 1rem;
            vertical-align: middle;
            border-color: var(--border-light);
        }

        /* Badges */
        .badge {
            padding: 0.5rem 0.75rem;
            border-radius: 0.375rem;
            font-weight: 500;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .content-header {
                padding: 1.25rem;
                margin-bottom: 1.5rem;
            }
        }

        /* Loading States */
        .loading {
            opacity: 0.6;
            pointer-events: none;
        }

        /* Utilities */
        .section-title {
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 1.5rem;
            padding-bottom: 0.75rem;
            border-bottom: 2px solid var(--border-light);
        }

        .text-small {
            font-size: 0.875rem;
        }

        /* Image preview */
        .image-preview {
            border: 2px dashed var(--border-light);
            border-radius: 0.75rem;
            padding: 1.5rem;
            text-align: center;
            background: #fafafa;
            transition: all 0.3s ease;
        }

        .image-preview:hover {
            border-color: var(--primary-light);
        }

        /* Modal */
        .modal-content {
            border: none;
            border-radius: 0.75rem;
            box-shadow: var(--shadow-lg);
        }

        .modal-header {
            border-bottom: 1px solid var(--border-light);
            padding: 1.25rem 1.5rem;
        }

        .modal-body {
            padding: 1.5rem;
        }

        .modal-footer {
            border-top: 1px solid var(--border-light);
            padding: 1.25rem 1.5rem;
        }
    </style>
</head>
<body>
    <!-- Modern Sidebar -->
    <div class="sidebar">
        <!-- Brand -->
        <div class="brand">
            <h4>
                <i class="bi bi-house-heart me-2"></i>
                Rumah KSU
            </h4>
        </div>

        <!-- Navigation -->
        <nav class="nav-section">
            <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}">
                        <i class="bi bi-speedometer2"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('carousel.index') }}" class="nav-link {{ Request::is('admin/carousel*') ? 'active' : '' }}">
                        <i class="bi bi-images"></i>
                        Carousel
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('brands.index') }}" class="nav-link {{ Request::is('admin/brands*') ? 'active' : '' }}">
                        <i class="bi bi-shop"></i>
                        Brand
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('promo.index') }}" class="nav-link {{ Request::is('admin/promo*') ? 'active' : '' }}">
                        <i class="bi bi-tag"></i>
                        Promo
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('featured-products.index') }}" class="nav-link {{ Request::is('admin/featured-products*') ? 'active' : '' }}">
                        <i class="bi bi-star"></i>
                        Produk Unggulan
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('testimonials.index') }}" class="nav-link {{ Request::is('admin/testimonials*') ? 'active' : '' }}">
                        <i class="bi bi-chat-quote"></i>
                        Testimoni
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('gallery.index') }}" class="nav-link {{ Request::is('admin/gallery*') ? 'active' : '' }}">
                        <i class="bi bi-camera"></i>
                        Galeri
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('faqs.index') }}" class="nav-link {{ Request::is('admin/faqs*') ? 'active' : '' }}">
                        <i class="bi bi-question-circle"></i>
                        FAQ
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('about-us.index') }}" class="nav-link {{ Request::is('admin/about-us*') ? 'active' : '' }}">
                        <i class="bi bi-info-circle"></i>
                        Tentang Kami
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('products.index') }}" class="nav-link {{ Request::is('admin/products*') ? 'active' : '' }}">
                        <i class="bi bi-box"></i>
                        Produk
                    </a>
                </li>
            </ul>
        </nav>

        <!-- User Profile -->
        <div class="user-profile">
            <div class="dropdown">
                <button class="dropdown-toggle text-decoration-none d-flex align-items-center w-100" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="Admin" class="user-avatar">
                    <div class="flex-grow-1 text-start">
                        <div class="fw-semibold">{{ Auth::user()->name }}</div>
                        <small class="text-muted">Administrator</small>
                    </div>
                    <i class="bi bi-chevron-down text-muted"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="userDropdown">
                    <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i>Profil</a></li>
                    <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i>Pengaturan</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="bi bi-box-arrow-right me-2"></i>Keluar
                            </a>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main class="main-content">
        @yield('content')
    </main>

    <!-- Mobile Menu Toggle -->
    <button class="btn btn-primary-custom d-lg-none position-fixed" style="top: 1rem; left: 1rem; z-index: 1051;" onclick="toggleSidebar()">
        <i class="bi bi-list"></i>
    </button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSidebar() {
            document.querySelector('.sidebar').classList.toggle('show');
        }

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(e) {
            const sidebar = document.querySelector('.sidebar');
            const toggleBtn = document.querySelector('[onclick="toggleSidebar()"]');

            if (window.innerWidth <= 992 && !sidebar.contains(e.target) && !toggleBtn.contains(e.target)) {
                sidebar.classList.remove('show');
            }
        });

        // Form loading states
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function() {
                const submitBtn = form.querySelector('button[type="submit"]');
                if (submitBtn) {
                    submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Memproses...';
                    submitBtn.disabled = true;
                }
            });
        });
    </script>
</body>
</html>
