@extends('layouts.app')

@section('title', 'Products')

@section('content')
<div class="product-hero-section py-5 mb-4" style="margin-top: 7rem;">
    <div class="container">
        <div class="row g-4">
            @foreach($products as $product)
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card h-100">
                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->product_name }}">
                    <div class="card-body text-center">
                        <h5>{{ $product->product_name }}</h5>
                        <h6 class="text-danger">{{ $product->brand_name }}</h6>
                        <a href="" class="btn btn-danger mt-3">Beli Sekarang</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
