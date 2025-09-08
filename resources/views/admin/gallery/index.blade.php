@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Kelola Gallery</h1>
</div>

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
@endsection
