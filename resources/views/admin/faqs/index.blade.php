@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Kelola FAQs</h1>
</div>

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
@endsection
