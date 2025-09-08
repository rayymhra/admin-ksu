@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Kelola Testimonials</h1>
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#addTestimonialModal">
        <i class="bi bi-plus-circle"></i> Tambah Testimonial
    </button>
</div>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="row">
    @foreach($testimonials as $testimonial)
    <div class="col-md-4 mb-4">
        <div class="card">
            <img src="{{ asset('storage/' . $testimonial->image) }}" class="card-img-top" alt="Testimonial Image" style="height: 300px; object-fit: cover;">
            <div class="card-body">
                <form action="{{ route('testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="image_{{ $testimonial->id }}" class="form-label">Ganti Gambar</label>
                        <input class="form-control" type="file" id="image_{{ $testimonial->id }}" name="image" required>
                    </div>
                    <button type="submit" class="btn btn-sm btn-danger">Perbarui</button>
                </form>
                <form action="{{ route('testimonials.destroy', $testimonial->id) }}" method="POST" class="mt-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus testimonial ini?')">Hapus</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- Add Testimonial Modal -->
<div class="modal fade" id="addTestimonialModal" tabindex="-1" aria-labelledby="addTestimonialModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTestimonialModalLabel">Tambah Testimonial Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('testimonials.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar Testimonial</label>
                        <input class="form-control" type="file" id="image" name="image" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
