@extends('layouts.app')

@section('title', 'About Us')

@section('content')
<div class="about-hero-section py-5" style="margin-top: 7rem;">
    <div class="container">
        <h2 class="text-danger fw-bold">
            Keripik Saji Unggul
        </h2>
        <h6 class="fw-normal text-justify">
            {{ $aboutUs->description }}
        </h6>
    </div>
</div>

<div class="tentang-kami-section py-5">
    <div class="container">
        <div class="row">
            @php
            $leftImage = $aboutUsImages->where('column_position', 'left')->first();
            $rightImages = $aboutUsImages->where('column_position', 'right');
            @endphp

            @if($leftImage)
<div class="col-12 col-md-6 mb-4 mb-md-0">
    <div class="ratio ratio-1x1">
        <img src="{{ asset('storage/' . $leftImage->image) }}"
             alt="Group Photo"
             class="rounded w-100 h-100 object-fit-cover">
    </div>
</div>
@endif

            <div class="col-12 col-md-6">
                @foreach($rightImages as $image)
    <div class="ratio ratio-573x237 mb-4">
        <img src="{{ asset('storage/' . $image->image) }}"
             alt="About Us Image"
             class="rounded w-100 h-100 object-fit-cover">
    </div>
    @endforeach
            </div>
        </div>
    </div>
</div>

<div class="why-section py-5 mb-5">
    <div class="container">
        <div class="text-center">
            <h2 class="fw-bold">Kenapa Memilih Kami</h2>
            <p class="text-center text-danger">Kami ahli di dua dunia: Rasa dan Visual.</p>
        </div>
        <div class="row mt-5">
            <!-- Card 1 -->
            <div class="col-12 col-md-4 mb-4 mb-md-0">
                <div class="card shadow rounded-5">
                    <div class="card-body text-center">
                        <i class="bi bi-award"></i>
                        <h4>Berpengalaman sejak 2004</h4>
                    </div>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="col-12 col-md-4 mb-4 mb-md-0">
                <div class="card shadow rounded-5">
                    <div class="card-body text-center">
                        <i class="bi bi-easel"></i>
                        <h4>Kreativitas yang terpadu</h4>
                    </div>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="col-12 col-md-4">
                <div class="card shadow rounded-5">
                    <div class="card-body text-center">
                        <i class="bi bi-people"></i>
                        <h4>Siap berkolaborasi bersama</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
