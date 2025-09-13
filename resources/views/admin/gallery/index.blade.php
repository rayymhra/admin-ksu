@extends('layouts.admin')

@section('content')
<!-- Content Header -->
<div class="content-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1>Kelola Galeri</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Galeri</li>
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
        @foreach($gallery as $item)
        <div class="col-md-3 mb-4">
            <div class="card">
                <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="Gallery Image" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <form action="{{ route('gallery.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="image_{{ $item->id }}" class="form-label">Ganti Gambar</label>
                            <input class="form-control" type="file" id="image_{{ $item->id }}" name="image" required>
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
