@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Kelola Promo</h1>
</div>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('promo.update', $promo->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar Promo</label>
                        @if($promo->image)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $promo->image) }}" class="img-fluid" alt="Promo Image" style="max-height: 300px;">
                        </div>
                        @endif
                        <input class="form-control" type="file" id="image" name="image">
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $promo->title }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="description" name="description" rows="5" required>{{ $promo->description }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-danger">Perbarui Promo</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
