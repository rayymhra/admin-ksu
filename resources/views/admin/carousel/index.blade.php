@extends('layouts.admin')

@section('content')
<!-- Content Header -->
<div class="content-header">
    <h1>Kelola Carousel</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Carousel</li>
        </ol>
    </nav>
</div>

<div class="px-4">
    @if(session('success'))
    <div class="alert alert-success d-flex align-items-center mb-4">
        <i class="bi bi-check-circle-fill me-3 fs-5"></i>
        <div>{{ session('success') }}</div>
    </div>
    @endif

    <!-- Instructions Card -->
    <div class="card mb-4">
        <div class="card-header d-flex align-items-center">
            <i class="bi bi-info-circle me-2"></i>
            Panduan Ukuran Gambar Carousel
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="d-flex align-items-center p-3 bg-light rounded-3 mb-3 mb-md-0">
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                            <i class="bi bi-laptop fs-5"></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-1 fw-bold">Desktop</h6>
                            <p class="mb-0 text-muted">1920 × 700 px</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex align-items-center p-3 bg-light rounded-3 mb-3 mb-md-0">
                        <div class="bg-info text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                            <i class="bi bi-tablet fs-5"></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-1 fw-bold">Tablet</h6>
                            <p class="mb-0 text-muted">1024 × 500 px</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex align-items-center p-3 bg-light rounded-3">
                        <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                            <i class="bi bi-phone fs-5"></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-1 fw-bold">Mobile</h6>
                            <p class="mb-0 text-muted">360 × 510 px</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-3 p-3 bg-warning bg-opacity-10 border border-warning rounded-3">
                <div class="d-flex align-items-start">
                    <i class="bi bi-exclamation-triangle text-warning me-2 mt-1"></i>
                    <div>
                        <strong>Catatan Penting:</strong>
                        <p class="mb-0 mt-1">Pastikan menggunakan gambar dengan ukuran yang sesuai untuk hasil tampilan yang optimal. Format yang didukung: JPG, PNG (maksimal 5MB per file).</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Carousel Slides -->
    <div class="row">
        @foreach($slides as $slide)
        <div class="col-lg-6 col-xl-4 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <span><i class="bi bi-layers me-2"></i>Slide {{ $slide->order }}</span>
                    <span class="badge bg-light text-dark">{{ $slide->is_active ? 'Aktif' : 'Nonaktif' }}</span>
                </div>
                <div class="card-body">
                    <form action="{{ route('carousel.update', $slide->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Mobile Image -->
                        <div class="mb-4">
                            <label for="mobile_image_{{ $slide->id }}" class="form-label d-flex align-items-center">
                                <i class="bi bi-phone text-success me-2"></i>
                                Gambar Mobile
                                <span class="badge bg-success ms-2">360×510px</span>
                            </label>
                            @if($slide->images->where('platform', 'mobile')->first())
                            <div class="mb-3">
                                <img src="{{ asset('storage/' . $slide->images->where('platform', 'mobile')->first()->image) }}"
                                     class="img-fluid rounded-3 shadow-sm"
                                     alt="Mobile Image"
                                     style="max-height: 120px; width: 100%; object-fit: cover;">
                                <small class="text-muted d-block mt-1">Gambar saat ini</small>
                            </div>
                            @endif
                            <input class="form-control" type="file" id="mobile_image_{{ $slide->id }}" name="mobile_image" accept="image/*">
                            <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
                        </div>

                        <!-- Tablet Image -->
                        <div class="mb-4">
                            <label for="tablet_image_{{ $slide->id }}" class="form-label d-flex align-items-center">
                                <i class="bi bi-tablet text-info me-2"></i>
                                Gambar Tablet
                                <span class="badge bg-info ms-2">1024×500px</span>
                            </label>
                            @if($slide->images->where('platform', 'tablet')->first())
                            <div class="mb-3">
                                <img src="{{ asset('storage/' . $slide->images->where('platform', 'tablet')->first()->image) }}"
                                     class="img-fluid rounded-3 shadow-sm"
                                     alt="Tablet Image"
                                     style="max-height: 120px; width: 100%; object-fit: cover;">
                                <small class="text-muted d-block mt-1">Gambar saat ini</small>
                            </div>
                            @endif
                            <input class="form-control" type="file" id="tablet_image_{{ $slide->id }}" name="tablet_image" accept="image/*">
                            <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
                        </div>

                        <!-- Desktop Image -->
                        <div class="mb-4">
                            <label for="desktop_image_{{ $slide->id }}" class="form-label d-flex align-items-center">
                                <i class="bi bi-laptop text-primary me-2"></i>
                                Gambar Desktop
                                <span class="badge bg-primary ms-2">1920×700px</span>
                            </label>
                            @if($slide->images->where('platform', 'desktop')->first())
                            <div class="mb-3">
                                <img src="{{ asset('storage/' . $slide->images->where('platform', 'desktop')->first()->image) }}"
                                     class="img-fluid rounded-3 shadow-sm"
                                     alt="Desktop Image"
                                     style="max-height: 120px; width: 100%; object-fit: cover;">
                                <small class="text-muted d-block mt-1">Gambar saat ini</small>
                            </div>
                            @endif
                            <input class="form-control" type="file" id="desktop_image_{{ $slide->id }}" name="desktop_image" accept="image/*">
                            <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-cloud-upload me-2"></i>
                                Perbarui Slide
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @if($slides->isEmpty())
    <div class="card">
        <div class="card-body text-center py-5">
            <div class="mb-4">
                <i class="bi bi-images text-muted" style="font-size: 4rem;"></i>
            </div>
            <h5 class="text-muted">Belum Ada Slide Carousel</h5>
            <p class="text-muted">Silakan tambah slide carousel untuk menampilkan gambar di halaman utama website.</p>
        </div>
    </div>
    @endif
</div>

<style>
    .badge {
        font-size: 0.75rem;
        font-weight: 500;
    }

    .form-control:focus {
        border-color: #CB423F;
        box-shadow: 0 0 0 0.2rem rgba(203, 66, 63, 0.15);
    }

    .card img {
        transition: transform 0.2s ease;
    }

    .card:hover img {
        transform: scale(1.02);
    }

    .bg-light {
        background-color: #f8f9fa !important;
    }
</style>
@endsection
