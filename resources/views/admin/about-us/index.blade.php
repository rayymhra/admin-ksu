@extends('layouts.admin')

@section('content')
<!-- Content Header -->
<div class="content-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1>Kelola Tentang Kami</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Tentang Kami</li>
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
        <div class="col-md-12 mb-4">
            <div class="card">
                <div class="card-header bg-danger text-white">
                    Deskripsi Tentang Kami
                </div>
                <div class="card-body">
                    <form action="{{ route('about-us.update', $aboutUs->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="description" name="description" rows="5" required>{{ $aboutUs->description }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-danger">Perbarui Deskripsi</button>
                    </form>
                </div>
            </div>
        </div>

        @foreach($aboutUsImages as $image)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header bg-danger text-white">
                    Gambar {{ $image->column_position == 'left' ? 'Kiri' : 'Kanan' }}
                </div>
                <img src="{{ asset('storage/' . $image->image) }}" class="card-img-top" alt="About Us Image" style="height: 250px; object-fit: cover;">
                <div class="card-body">
                    <form action="{{ route('about-us-image.update', $image->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="image_{{ $image->id }}" class="form-label">Ganti Gambar</label>
                            <input class="form-control" type="file" id="image_{{ $image->id }}" name="image" required>
                        </div>
                        <button type="submit" class="btn btn-sm btn-danger">Perbarui</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
