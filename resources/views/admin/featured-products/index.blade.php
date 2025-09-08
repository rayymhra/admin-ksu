@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Kelola Produk Unggulan</h1>
</div>

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
@endsection
