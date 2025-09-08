@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Kelola Tentang Kami</h1>
</div>

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
@endsection
