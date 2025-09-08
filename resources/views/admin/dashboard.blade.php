<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Rumah KSU</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        .sidebar {
            min-height: 100vh;
            background-color: #dc3545;
        }
        .sidebar .nav-link {
            color: white;
        }
        .sidebar .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }
        .admin-container {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 sidebar p-0">
                <div class="d-flex flex-column p-3">
                    <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-4">Rumah KSU</span>
                    </a>
                    <hr>
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li class="nav-item">
                            <a href="{{ route('admin.dashboard') }}" class="nav-link active" aria-current="page">
                                <i class="bi bi-speedometer2 me-2"></i>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('carousel.index') }}" class="nav-link text-white">
                                <i class="bi bi-images me-2"></i>
                                Carousel
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('brands.index') }}" class="nav-link text-white">
                                <i class="bi bi-shop me-2"></i>
                                Brands
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('promo.index') }}" class="nav-link text-white">
                                <i class="bi bi-tag me-2"></i>
                                Promo
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('featured-products.index') }}" class="nav-link text-white">
                                <i class="bi bi-star me-2"></i>
                                Produk Unggulan
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('testimonials.index') }}" class="nav-link text-white">
                                <i class="bi bi-chat-quote me-2"></i>
                                Testimonials
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('gallery.index') }}" class="nav-link text-white">
                                <i class="bi bi-camera me-2"></i>
                                Gallery
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('faqs.index') }}" class="nav-link text-white">
                                <i class="bi bi-question-circle me-2"></i>
                                FAQs
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('about-us.index') }}" class="nav-link text-white">
                                <i class="bi bi-info-circle me-2"></i>
                                Tentang Kami
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('products.index') }}" class="nav-link text-white">
                                <i class="bi bi-box me-2"></i>
                                Produk
                            </a>
                        </li>
                    </ul>
                    <hr>
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle me-2">
                            <strong>{{ Auth::user()->name }}</strong>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 admin-container">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard Admin</h1>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Carousel</h5>
                                <p class="card-text">Kelola gambar carousel untuk desktop, tablet, dan mobile</p>
                                <a href="{{ route('carousel.index') }}" class="btn btn-danger">Kelola</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Brands</h5>
                                <p class="card-text">Kelola logo brand yang ditampilkan di website</p>
                                <a href="{{ route('brands.index') }}" class="btn btn-danger">Kelola</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Promo</h5>
                                <p class="card-text">Kelala konten promo dan gambar</p>
                                <a href="{{ route('promo.index') }}" class="btn btn-danger">Kelola</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Produk Unggulan</h5>
                                <p class="card-text">Kelola produk unggulan yang ditampilkan</p>
                                <a href="{{ route('featured-products.index') }}" class="btn btn-danger">Kelola</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Testimonials</h5>
                                <p class="card-text">Kelala testimonial dari pelanggan</p>
                                <a href="{{ route('testimonials.index') }}" class="btn btn-danger">Kelola</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Gallery</h5>
                                <p class="card-text">Kelala gambar gallery kegiatan</p>
                                <a href="{{ route('gallery.index') }}" class="btn btn-danger">Kelola</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">FAQs</h5>
                                <p class="card-text">Kelala pertanyaan yang sering diajukan</p>
                                <a href="{{ route('faqs.index') }}" class="btn btn-danger">Kelola</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Tentang Kami</h5>
                                <p class="card-text">Kelala konten tentang perusahaan</p>
                                <a href="{{ route('about-us.index') }}" class="btn btn-danger">Kelola</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Produk</h5>
                                <p class="card-text">Kelala semua produk yang dijual</p>
                                <a href="{{ route('products.index') }}" class="btn btn-danger">Kelola</a>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
