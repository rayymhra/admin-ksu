@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Kelola Carousel</h1>
</div>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="row">
    @foreach($slides as $slide)
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-header bg-danger text-white">
                Slide {{ $slide->order }}
            </div>
            <div class="card-body">
                <form action="{{ route('carousel.update', $slide->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="mobile_image_{{ $slide->id }}" class="form-label">Gambar Mobile</label>
                        @if($slide->images->where('platform', 'mobile')->first())
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $slide->images->where('platform', 'mobile')->first()->image) }}" class="img-fluid" alt="Mobile Image">
                        </div>
                        @endif
                        <input class="form-control" type="file" id="mobile_image_{{ $slide->id }}" name="mobile_image">
                    </div>

                    <div class="mb-3">
                        <label for="tablet_image_{{ $slide->id }}" class="form-label">Gambar Tablet</label>
                        @if($slide->images->where('platform', 'tablet')->first())
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $slide->images->where('platform', 'tablet')->first()->image) }}" class="img-fluid" alt="Tablet Image">
                        </div>
                        @endif
                        <input class="form-control" type="file" id="tablet_image_{{ $slide->id }}" name="tablet_image">
                    </div>

                    <div class="mb-3">
                        <label for="desktop_image_{{ $slide->id }}" class="form-label">Gambar Desktop</label>
                        @if($slide->images->where('platform', 'desktop')->first())
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $slide->images->where('platform', 'desktop')->first()->image) }}" class="img-fluid" alt="Desktop Image">
                        </div>
                        @endif
                        <input class="form-control" type="file" id="desktop_image_{{ $slide->id }}" name="desktop_image">
                    </div>

                    <button type="submit" class="btn btn-danger">Perbarui</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
