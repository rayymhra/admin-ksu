@extends('layouts.admin')

@section('content')


<!-- Content Header -->
<div class="content-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1>Kelola Produk</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Produk</li>
                </ol>
            </nav>
        </div>
        <button type="button" class="btn btn-primary-custom" data-bs-toggle="modal" data-bs-target="#addProductModal">
        <i class="bi bi-plus-circle"></i> Tambah Produk
    </button>
    </div>
</div>

<div class="px-4">

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="row">
        @foreach($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="Product Image" style="height: 250px; object-fit: cover;">
                <div class="card-body">
                    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="image_{{ $product->id }}" class="form-label">Gambar Produk</label>
                            <input class="form-control" type="file" id="image_{{ $product->id }}" name="image">
                        </div>

                        <div class="mb-3">
                            <label for="product_name_{{ $product->id }}" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" id="product_name_{{ $product->id }}" name="product_name" value="{{ $product->product_name }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="brand_name_{{ $product->id }}" class="form-label">Nama Brand</label>
                            <input type="text" class="form-control" id="brand_name_{{ $product->id }}" name="brand_name" value="{{ $product->brand_name }}" required>
                        </div>

                        <button type="submit" class="btn btn-sm btn-danger">Perbarui</button>
                    </form>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="mt-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Add Product Modal -->
    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Tambah Produk Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="image" class="form-label">Gambar Produk</label>
                            <input class="form-control" type="file" id="image" name="image" required>
                        </div>
                        <div class="mb-3">
                            <label for="product_name" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" id="product_name" name="product_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="brand_name" class="form-label">Nama Brand</label>
                            <input type="text" class="form-control" id="brand_name" name="brand_name" required>
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
</div>
@endsection
