@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard Admin</h1>
</div>

<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Carousel</h5>
                <p class="card-text">Kelola gambar carousel untuk desktop, tablet, dan mobile</p>
                <a href="{{ route('carousel.index') }}" class="btn btn-danger">Kelola</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Brands</h5>
                <p class="card-text">Kelola logo brand yang ditampilkan di website</p>
                <a href="{{ route('brands.index') }}" class="btn btn-danger">Kelola</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Promo</h5>
                <p class="card-text">Kelola konten promo dan gambar</p>
                <a href="{{ route('promo.index') }}" class="btn btn-danger">Kelola</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Produk Unggulan</h5>
                <p class="card-text">Kelola produk unggulan yang ditampilkan</p>
                <a href="{{ route('featured-products.index') }}" class="btn btn-danger">Kelola</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Testimonials</h5>
                <p class="card-text">Kelola testimonial dari pelanggan</p>
                <a href="{{ route('testimonials.index') }}" class="btn btn-danger">Kelola</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Gallery</h5>
                <p class="card-text">Kelola gambar gallery kegiatan</p>
                <a href="{{ route('gallery.index') }}" class="btn btn-danger">Kelola</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">FAQs</h5>
                <p class="card-text">Kelola pertanyaan yang sering diajukan</p>
                <a href="{{ route('faqs.index') }}" class="btn btn-danger">Kelola</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Tentang Kami</h5>
                <p class="card-text">Kelola konten tentang perusahaan</p>
                <a href="{{ route('about-us.index') }}" class="btn btn-danger">Kelola</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Produk</h5>
                <p class="card-text">Kelola semua produk yang dijual</p>
                <a href="{{ route('products.index') }}" class="btn btn-danger">Kelola</a>
            </div>
        </div>
    </div>
</div>
@endsection 
