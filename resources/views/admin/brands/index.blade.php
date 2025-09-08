@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Kelola Brands</h1>
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#addBrandModal">
        <i class="bi bi-plus-circle"></i> Tambah Brand
    </button>
</div>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="row">
    @foreach($brands as $brand)
    <div class="col-md-3 mb-4">
        <div class="card">
            <img src="{{ asset('storage/' . $brand->image) }}" class="card-img-top" alt="Brand Image" style="height: 200px; object-fit: cover;">
            <div class="card-body">
                <form action="{{ route('brands.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="image_{{ $brand->id }}" class="form-label">Ganti Gambar</label>
                        <input class="form-control" type="file" id="image_{{ $brand->id }}" name="image" required>
                    </div>
                    <button type="submit" class="btn btn-sm btn-danger">Perbarui</button>
                </form>
                <form action="{{ route('brands.destroy', $brand->id) }}" method="POST" class="mt-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus brand ini?')">Hapus</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- Add Brand Modal -->
<div class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="addBrandModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addBrandModalLabel">Tambah Brand Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('brands.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar Brand</label>
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
