@extends('layouts.admin')

@section('content')
<!-- Content Header -->
<div class="content-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1>Dashboard Admin</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div>
        <div class="text-end">
            <small class="text-muted">Terakhir login: {{ now()->format('d M Y, H:i') }}</small>
        </div>
    </div>
</div>

<div class="px-4">
    <!-- Welcome Card -->
    <div class="card mb-4 border-0" style="background: linear-gradient(135deg, #CB423F 0%, #a73632 100%);">
        <div class="card-body text-white p-4">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h3 class="mb-2">Selamat datang, {{ Auth::user()->name }}!</h3>
                    <p class="mb-0 opacity-90">Kelola semua konten website Rumah KSU dengan mudah dari panel admin ini. Pilih menu di samping untuk mulai mengelola konten.</p>
                </div>
                <div class="col-md-4 text-center">
                    <i class="bi bi-house-heart" style="font-size: 4rem; opacity: 0.2;"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Overview -->
    <div class="row mb-4">
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title text-muted">Total Produk</h6>
                            <h3 class="fw-bold">24</h3>
                        </div>
                        <div class="bg-primary bg-opacity-10 p-3 rounded-circle">
                            <i class="bi bi-box text-primary fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title text-muted">Total Brand</h6>
                            <h3 class="fw-bold">8</h3>
                        </div>
                        <div class="bg-success bg-opacity-10 p-3 rounded-circle">
                            <i class="bi bi-shop text-success fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title text-muted">Testimoni</h6>
                            <h3 class="fw-bold">12</h3>
                        </div>
                        <div class="bg-info bg-opacity-10 p-3 rounded-circle">
                            <i class="bi bi-chat-quote text-info fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title text-muted">Galeri</h6>
                            <h3 class="fw-bold">16</h3>
                        </div>
                        <div class="bg-warning bg-opacity-10 p-3 rounded-circle">
                            <i class="bi bi-images text-warning fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Management Cards -->
    <h4 class="section-title">Kelola Konten</h4>
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body text-center p-4">
                    <div class="mb-3">
                        <div class="bg-primary bg-opacity-10 rounded-circle mx-auto d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="bi bi-images text-primary fs-3"></i>
                        </div>
                    </div>
                    <h5 class="card-title fw-bold mb-2">Carousel</h5>
                    <p class="card-text text-muted small">Kelola gambar carousel untuk desktop, tablet, dan mobile dengan ukuran yang tepat</p>
                    <a href="{{ route('carousel.index') }}" class="btn btn-primary-custom btn-sm mt-2">
                        <i class="bi bi-gear me-2"></i>Kelola Carousel
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body text-center p-4">
                    <div class="mb-3">
                        <div class="bg-success bg-opacity-10 rounded-circle mx-auto d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="bi bi-shop text-success fs-3"></i>
                        </div>
                    </div>
                    <h5 class="card-title fw-bold mb-2">Brand</h5>
                    <p class="card-text text-muted small">Kelola logo brand yang ditampilkan di website untuk menunjukkan kemitraan</p>
                    <a href="{{ route('brands.index') }}" class="btn btn-primary-custom btn-sm mt-2">
                        <i class="bi bi-gear me-2"></i>Kelola Brand
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body text-center p-4">
                    <div class="mb-3">
                        <div class="bg-danger bg-opacity-10 rounded-circle mx-auto d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="bi bi-tag text-danger fs-3"></i>
                        </div>
                    </div>
                    <h5 class="card-title fw-bold mb-2">Promo</h5>
                    <p class="card-text text-muted small">Kelola konten promo dan gambar untuk menarik perhatian pelanggan</p>
                    <a href="{{ route('promo.index') }}" class="btn btn-primary-custom btn-sm mt-2">
                        <i class="bi bi-gear me-2"></i>Kelola Promo
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body text-center p-4">
                    <div class="mb-3">
                        <div class="bg-warning bg-opacity-10 rounded-circle mx-auto d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="bi bi-star text-warning fs-3"></i>
                        </div>
                    </div>
                    <h5 class="card-title fw-bold mb-2">Produk Unggulan</h5>
                    <p class="card-text text-muted small">Kelola produk unggulan yang akan ditampilkan di halaman utama</p>
                    <a href="{{ route('featured-products.index') }}" class="btn btn-primary-custom btn-sm mt-2">
                        <i class="bi bi-gear me-2"></i>Kelola Produk
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body text-center p-4">
                    <div class="mb-3">
                        <div class="bg-info bg-opacity-10 rounded-circle mx-auto d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="bi bi-chat-quote text-info fs-3"></i>
                        </div>
                    </div>
                    <h5 class="card-title fw-bold mb-2">Testimoni</h5>
                    <p class="card-text text-muted small">Kelola testimoni dari pelanggan untuk meningkatkan kepercayaan</p>
                    <a href="{{ route('testimonials.index') }}" class="btn btn-primary-custom btn-sm mt-2">
                        <i class="bi bi-gear me-2"></i>Kelola Testimoni
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body text-center p-4">
                    <div class="mb-3">
                        <div class="bg-secondary bg-opacity-10 rounded-circle mx-auto d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="bi bi-camera text-secondary fs-3"></i>
                        </div>
                    </div>
                    <h5 class="card-title fw-bold mb-2">Galeri</h5>
                    <p class="card-text text-muted small">Kelola gambar galeri kegiatan dan aktivitas perusahaan</p>
                    <a href="{{ route('gallery.index') }}" class="btn btn-primary-custom btn-sm mt-2">
                        <i class="bi bi-gear me-2"></i>Kelola Galeri
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body text-center p-4">
                    <div class="mb-3">
                        <div class="bg-dark bg-opacity-10 rounded-circle mx-auto d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="bi bi-question-circle text-dark fs-3"></i>
                        </div>
                    </div>
                    <h5 class="card-title fw-bold mb-2">FAQ</h5>
                    <p class="card-text text-muted small">Kelola pertanyaan yang sering diajukan tentang perusahaan dan produk</p>
                    <a href="{{ route('faqs.index') }}" class="btn btn-primary-custom btn-sm mt-2">
                        <i class="bi bi-gear me-2"></i>Kelola FAQ
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body text-center p-4">
                    <div class="mb-3">
                        <div class="bg-primary bg-opacity-10 rounded-circle mx-auto d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="bi bi-info-circle text-primary fs-3"></i>
                        </div>
                    </div>
                    <h5 class="card-title fw-bold mb-2">Tentang Kami</h5>
                    <p class="card-text text-muted small">Kelola konten tentang perusahaan dan informasi profil</p>
                    <a href="{{ route('about-us.index') }}" class="btn btn-primary-custom btn-sm mt-2">
                        <i class="bi bi-gear me-2"></i>Kelola Info
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body text-center p-4">
                    <div class="mb-3">
                        <div class="bg-success bg-opacity-10 rounded-circle mx-auto d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="bi bi-box text-success fs-3"></i>
                        </div>
                    </div>
                    <h5 class="card-title fw-bold mb-2">Produk</h5>
                    <p class="card-text text-muted small">Kelola semua produk yang dijual dengan informasi lengkap</p>
                    <a href="{{ route('products.index') }}" class="btn btn-primary-custom btn-sm mt-2">
                        <i class="bi bi-gear me-2"></i>Kelola Produk
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        transition: all 0.3s ease;
        border: none;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }
</style>
@endsection
