@extends('layouts.admin')

@section('content')
<!-- Content Header -->
<div class="content-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1>Kelola Produk Unggulan</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Produk Unggulan</li>
                </ol>
            </nav>
        </div>
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
                <form action="{{ route('featured-products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
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

                    <button type="submit" class="btn btn-danger">Perbarui Produk</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>

</div>
@endsection
