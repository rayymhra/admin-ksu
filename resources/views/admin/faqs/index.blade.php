@extends('layouts.admin')

@section('content')
<!-- Content Header -->
<div class="content-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1>Kelola Faqs</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Faqs</li>
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
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header bg-danger text-white">
                    FAQ Tentang Perusahaan
                </div>
                <div class="card-body">
                    @foreach($faqs as $faq)
                    <form action="{{ route('faqs.update', $faq->id) }}" method="POST" class="mb-3">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="question_{{ $faq->id }}" class="form-label">Pertanyaan</label>
                            <input type="text" class="form-control" id="question_{{ $faq->id }}" name="question" value="{{ $faq->question }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="answer_{{ $faq->id }}" class="form-label">Jawaban</label>
                            <textarea class="form-control" id="answer_{{ $faq->id }}" name="answer" rows="3" required>{{ $faq->answer }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-sm btn-danger">Perbarui</button>
                    </form>
                    <hr>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-danger text-white">
                    FAQ Tentang Produk
                </div>
                <div class="card-body">
                    @foreach($faqProducts as $faqProduct)
                    <form action="{{ route('faq-products.update', $faqProduct->id) }}" method="POST" class="mb-3">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="question_product_{{ $faqProduct->id }}" class="form-label">Pertanyaan</label>
                            <input type="text" class="form-control" id="question_product_{{ $faqProduct->id }}" name="question" value="{{ $faqProduct->question }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="answer_product_{{ $faqProduct->id }}" class="form-label">Jawaban</label>
                            <textarea class="form-control" id="answer_product_{{ $faqProduct->id }}" name="answer" rows="3" required>{{ $faqProduct->answer }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-sm btn-danger">Perbarui</button>
                    </form>
                    <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
