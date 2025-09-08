<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Keripik Saji Unggul - @yield('title')</title>
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT"
    crossorigin="anonymous"
    />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    @stack('styles')
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm py-0 fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('assets/images/Logo-KSU-4.png') }}" alt="Logo" width="210" />
            </a>

            <!-- Hamburger button for mobile -->
            <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
            >
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapsible content -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto text-center text-lg-start">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active actived' : 'active' }}" aria-current="page" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('about') ? 'active actived' : 'active' }}" href="{{ route('about') }}">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('products') ? 'active actived' : 'active' }}" href="{{ route('products') }}">Products</a>
                </li>
                @auth
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin*') ? 'active actived' : 'active' }}" href="{{ route('admin.dashboard') }}">Admin</a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<main>
    @yield('content')
</main>

<footer class="pt-5 pb-3">
    <div class="container mb-5">
        <div class="row align-items-center">
            <div class="col-12 col-md-8 mb-3 mb-md-0">
                <img src="{{ asset('assets/images/Logo-KSU-5.png') }}" alt="" height="80">
                <p class="text-white fw-normal mt-2 mb-0">
                    Jalan Alternatif Cibubur Pasar Lama No. 74 Cileungsi, Bogor - Jawa Barat 16820
                </p>
            </div>
            <div class="col-12 col-md-4 text-md-end text-center mt-2">
                <div class="links d-inline-flex">
                    <a href="#"><img src="{{ asset('assets/icons/icons8-whatsapp-48.png') }}" alt="WhatsApp" class="me-3" height="35"></a>
                    <a href="#"><img src="{{ asset('assets/icons/icons8-shopee-48.png') }}" alt="Shopee" height="35"></a>
                </div>
            </div>
        </div>
    </div>
    <div class="border-top border-light">
        <div class="container">
            <div class="text-center text-white mt-3 small">
                Copyright © 2025. KSU. All Rights Reserved.
            </div>
        </div>
    </div>
</footer>

<script
src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
crossorigin="anonymous"
></script>

@stack('scripts')
</body>
</html>
