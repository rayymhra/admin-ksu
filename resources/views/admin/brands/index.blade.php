@extends('layouts.admin')

@section('content')
<!-- Content Header -->
<div class="content-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1>Kelola Brand</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Brand</li>
                </ol>
            </nav>
        </div>
        <button type="button" class="btn btn-primary-custom" data-bs-toggle="modal" data-bs-target="#addBrandModal">
            <i class="bi bi-plus-circle me-2"></i>Tambah Brand
        </button>
    </div>
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
            Panduan Mengelola Brand
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <p class="mb-2"><strong>Tips untuk logo brand yang baik:</strong></p>
                    <ul class="mb-0">
                        <li>Gunakan format PNG dengan background transparan untuk hasil terbaik</li>
                        <li>Ukuran recommended: 300 × 150 px (rasio 2:1)</li>
                        <li>Pastikan logo memiliki kualitas tinggi dan tidak pecah</li>
                        <li>Ukuran file maksimal: 2MB</li>
                    </ul>
                </div>
                <div class="col-md-4 text-center">
                    <div class="bg-light rounded-3 p-3">
                        <i class="bi bi-image text-muted fs-1 mb-2 d-block"></i>
                        <small class="text-muted">Format: PNG, JPG, SVG</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Brand Cards -->
    @if($brands->count() > 0)
    <div class="row">
        @foreach($brands as $brand)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100 brand-card">
                <div class="card-header bg-light border-bottom">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-0 fw-bold">Brand #{{ $brand->id }}</h6>
                        {{-- <span class="badge bg-success">Aktif</span> --}}
                    </div>
                </div>

                <div class="brand-image-container p-4 text-center bg-white">
                    <img src="{{ asset('storage/' . $brand->image) }}"
                         class="img-fluid brand-logo"
                         alt="Brand Logo"
                         style="max-height: 120px; max-width: 100%; object-fit: contain;">
                </div>

                <div class="card-body">
                    <form action="{{ route('brands.update', $brand->id) }}" method="POST" enctype="multipart/form-data" class="mb-3">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="image_{{ $brand->id }}" class="form-label fw-semibold">
                                <i class="bi bi-image me-2"></i>Ganti Logo Brand
                            </label>
                            <input class="form-control"
                                   type="file"
                                   id="image_{{ $brand->id }}"
                                   name="image"
                                   accept="image/*"
                                   required>
                            <small class="text-muted">Pilih file gambar baru untuk mengganti logo</small>
                        </div>
                        <button type="submit" class="btn btn-danger w-100">
                            <i class="bi bi-cloud-upload me-2"></i>
                            Perbarui Logo
                        </button>
                    </form>

                    <div class="border-top pt-3">
                        <form action="{{ route('brands.destroy', $brand->id) }}" method="POST" onsubmit="return confirmDelete()">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger w-100">
                                <i class="bi bi-trash me-2"></i>
                                Hapus Brand
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <!-- Empty State -->
    <div class="card">
        <div class="card-body text-center py-5">
            <div class="mb-4">
                <i class="bi bi-shop text-muted" style="font-size: 4rem;"></i>
            </div>
            <h5 class="text-muted">Belum Ada Brand</h5>
            <p class="text-muted mb-4">Mulai tambahkan brand partner untuk ditampilkan di website.</p>
            <button type="button" class="btn btn-primary-custom" data-bs-toggle="modal" data-bs-target="#addBrandModal">
                <i class="bi bi-plus-circle me-2"></i>Tambah Brand Pertama
            </button>
        </div>
    </div>
    @endif
</div>

<!-- Add Brand Modal -->
<div class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="addBrandModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="addBrandModalLabel">
                    <i class="bi bi-plus-circle me-2"></i>Tambah Brand Baru
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('brands.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-4 text-center">
                        <div class="upload-preview bg-light rounded-3 p-4 mb-3" style="min-height: 150px; border: 2px dashed #dee2e6;">
                            <i class="bi bi-cloud-upload text-muted fs-1 mb-2 d-block"></i>
                            <p class="text-muted mb-0">Preview logo akan muncul di sini</p>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label fw-semibold">
                            <i class="bi bi-image me-2"></i>Logo Brand
                        </label>
                        <input class="form-control"
                               type="file"
                               id="image"
                               name="image"
                               accept="image/*"
                               required
                               onchange="previewImage(event)">
                        <small class="text-muted">Format yang didukung: PNG, JPG, SVG (maksimal 2MB)</small>
                    </div>

                    <div class="alert alert-info d-flex align-items-start">
                        <i class="bi bi-lightbulb me-2 mt-1"></i>
                        <div>
                            <strong>Tips:</strong> Gunakan logo dengan background transparan (PNG) untuk hasil terbaik. Pastikan logo terlihat jelas dan tidak pecah.
                        </div>
                    </div>
                </div>

                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle me-2"></i>Batal
                    </button>
                    <button type="submit" class="btn btn-primary-custom">
                        <i class="bi bi-check-circle me-2"></i>Simpan Brand
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .brand-card {
        transition: all 0.3s ease;
        border: none;
        box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    }

    .brand-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }

    .brand-image-container {
        background: linear-gradient(45deg, #f8f9fa 25%, transparent 25%),
                    linear-gradient(-45deg, #f8f9fa 25%, transparent 25%),
                    linear-gradient(45deg, transparent 75%, #f8f9fa 75%),
                    linear-gradient(-45deg, transparent 75%, #f8f9fa 75%);
        background-size: 20px 20px;
        background-position: 0 0, 0 10px, 10px -10px, -10px 0px;
    }

    .brand-logo {
        transition: transform 0.3s ease;
        filter: drop-shadow(0 2px 8px rgba(0,0,0,0.1));
    }

    .brand-card:hover .brand-logo {
        transform: scale(1.05);
    }

    .upload-preview {
        transition: all 0.3s ease;
    }

    .modal-content {
        border: none;
        box-shadow: 0 10px 40px rgba(0,0,0,0.15);
        border-radius: 0.75rem;
    }

    .modal-header {
        border-bottom: 1px solid var(--border-light);
        border-radius: 0.75rem 0.75rem 0 0;
    }

    .btn-primary-custom {
        background: var(--primary-color);
        border-color: var(--primary-color);
        color: white;
        font-weight: 600;
        border-radius: 0.5rem;
        padding: 0.625rem 1.25rem;
        transition: all 0.2s ease;
    }

    .btn-primary-custom:hover {
        background: var(--primary-dark);
        border-color: var(--primary-dark);
        color: white;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(203, 66, 63, 0.3);
    }
</style>

<script>
    function previewImage(event) {
        const file = event.target.files[0];
        const preview = document.querySelector('.upload-preview');

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.innerHTML = `
                    <img src="${e.target.result}"
                         class="img-fluid"
                         style="max-height: 120px; max-width: 100%; object-fit: contain;"
                         alt="Preview">
                    <p class="text-success mt-2 mb-0 fw-semibold">
                        <i class="bi bi-check-circle me-1"></i>Logo siap diupload
                    </p>
                `;
                preview.style.borderColor = '#28a745';
                preview.style.backgroundColor = '#f8fff9';
            };
            reader.readAsDataURL(file);
        }
    }

    function confirmDelete() {
        return confirm('Apakah Anda yakin ingin menghapus brand ini? Tindakan ini tidak dapat dibatalkan.');
    }

    // Form submission loading state
    document.querySelectorAll('form').forEach(form => {
        form.addEventListener('submit', function() {
            const submitBtn = form.querySelector('button[type="submit"]');
            if (submitBtn && !submitBtn.classList.contains('btn-outline-danger')) {
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Memproses...';
                submitBtn.disabled = true;

                // Re-enable after 5 seconds to prevent permanent disable if there's an error
                setTimeout(() => {
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                }, 5000);
            }
        });
    });
</script>
@endsection
