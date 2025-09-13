@extends('layouts.app')

@section('title', 'Home')

@section('content')
<!-- Hero Section -->
<div class="hero-section">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @foreach($carouselSlides as $index => $slide)
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}" aria-label="Slide {{ $index + 1 }}"></button>
            @endforeach
        </div>

        <div class="carousel-inner mx-auto">
            @foreach($carouselSlides as $index => $slide)
            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                <picture>
                    @php
                    $mobileImage = $slide->images->where('platform', 'mobile')->first();
                    $tabletImage = $slide->images->where('platform', 'tablet')->first();
                    $desktopImage = $slide->images->where('platform', 'desktop')->first();
                    @endphp

                    @if($mobileImage)
                    <source srcset="{{ asset('storage/' . $mobileImage->image) }}" media="(max-width: 767px)">
                        @endif

                        @if($tabletImage)
                        <source srcset="{{ asset('storage/' . $tabletImage->image) }}" media="(min-width: 768px) and (max-width: 1023px)">
                            @endif

                            @if($desktopImage)
                            <img src="{{ asset('storage/' . $desktopImage->image) }}" class="d-block w-100" alt="Slide {{ $index + 1 }}">
                            @else
                            <img src="{{ asset('assets/images/placeholder.jpg') }}" class="d-block w-100" alt="Slide {{ $index + 1 }}">
                            @endif
                        </picture>
                    </div>
                    @endforeach
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <!-- Our Brand Section -->
        <div class="our-brand-section py-5" id="our-brand">
            <div class="container">
                <h6 class="text-center text-white mb-4">Our Brands:</h6>
                <div class="brand-slider">
                    <div class="brand-track">
                        @foreach($brands as $brand)
                        <img src="{{ asset('storage/' . $brand->image) }}" alt="Brand Image">
                        @endforeach

                        <!-- Duplicate for seamless looping -->
                        @foreach($brands as $brand)
                        <img src="{{ asset('storage/' . $brand->image) }}" alt="Brand Image">
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Promo Section -->
        @if($promo)
        <div class="featured-video-section py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-7">
                        <div class="text-video pe-md-5 text-center text-md-start">
                            <h3 class="mb-3">{{ $promo->title }}</h3>
                            <p>{{ $promo->description }}</p>
                        </div>
                    </div>

                    <div class="col-md-5 mb-4 mb-md-0">
                        <img src="{{ asset('storage/' . $promo->image) }}" alt="Promo Image" class="w-100 rounded-3">
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- Featured Products Section -->
        <div class="produk-unggulan-section py-5">
            <div class="container">
                <h2 class="fw-medium mb-3">Produk unggulan kami</h2>
                <p class="mb-5">Temukan camilan favorit pilihan pelanggan kami.</p>

                <div class="row g-4">
                    @foreach($featuredProducts as $product)
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card h-100">
                            <div class="ratio ratio-1x1">
                                <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->product_name }}">
                            </div>

                            <div class="card-body text-center">
                                <h5>{{ $product->product_name }}</h5>
                                <h6 class="text-danger">{{ $product->brand_name }}</h6>
                                <div class="btn btn-danger mt-3">Beli Sekarang</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="text-center mt-5">
                    <a href="{{ route('products') }}" class="btn btn-danger btn-lg">Explore all products</a>
                </div>
            </div>
        </div>

        <!-- Testimonials Section -->
        <div class="testimonials-section py-5 position-relative">
            <div class="container">
                <h2 class="border-bottom border-danger border-3 pb-1 fw-medium">Apa kata mereka?</h2>

                <div id="testimonialCarousel" class="carousel slide mt-3" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($testimonials->chunk(2) as $index => $chunk)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <div class="row justify-content-center g-4">
                                @foreach($chunk as $testimonial)
                                <div class="col-lg-5 col-md-6 col-12">
                                    <div class="card rounded-4 h-100">
                                        <div class="card-body">
                                            <div class="testimonial-img-wrapper ratio ratio-16x9">
                                                <img src="{{ asset('storage/' . $testimonial->image) }}"
                                                alt="Testimonial"
                                                class="img-fluid border rounded testimonial-img object-fit-cover"
                                                data-bs-toggle="modal"
                                                data-bs-target="#testimonialModal"
                                                data-img="{{ asset('storage/' . $testimonial->image) }}">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Custom Controls (outside the images) -->
                    <div class="custom-carousel-controls">
                        <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Testimonial Image Modal -->
        <div class="modal fade" id="testimonialModal" tabindex="-1" aria-labelledby="testimonialModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content bg-transparent border-0">
                    <img src="" id="testimonialModalImage" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>


        <!-- Gallery Section -->
        <div class="gallery-section py-5">
            <div class="container">
                <h2 class="fw-medium">Galeri kegiatan kami</h2>
                <p>Momen di balik layar, proses produksi, hingga kegiatan tim kami.</p>
                <div class="card">
                    <div class="card-body">
                        <div class="row gx-2 gy-3 p-3">
                            @foreach($gallery as $item)
                            <div class="col-6 col-sm-6 col-md-4">
                                <div class="ratio ratio-1x1">
                                    <img src="{{ asset('storage/' . $item->image) }}"
                                    alt="Galeri Gambar"
                                    class="w-100 h-100 border rounded-2 object-fit-cover gallery-img"
                                    data-bs-toggle="modal"
                                    data-bs-target="#imageModal"
                                    onclick="showImage('{{ asset('storage/' . $item->image) }}')">
                                </div>
                            </div>

                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for gallery close up looks -->
        <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content bg-transparent border-0">
                    <div class="modal-body text-center p-0">
                        <img src="" id="modalImage" class="img-fluid rounded-3 shadow">
                    </div>
                    <button type="button" class="btn-close position-absolute top-0 end-0 m-3 bg-light p-3 rounded-pill" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="faq-section py-5">
            <div class="container">
                <h2 class="mb-5 fw-medium">Pertanyaan yang sering diajukan (FAQ)</h2>
                <div class="row">
                    <div class="col-12 col-md-6 mb-5">
                        <div class="card border-danger-subtle rounded-3">
                            <div class="card-body rounded-3">
                                <div class="text-center mt-3 mb-5">
                                    <h4 class="text-danger">Tentang Rumah KSU</h4>
                                </div>

                                <div class="faq-white m-1">
                                    <div class="accordion m-1" id="faqAccordion">
                                        @foreach($faqs as $index => $faq)
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button {{ $index === 0 ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#faq{{ $index }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="faq{{ $index }}">
                                                    {{ $faq->question }}
                                                </button>
                                            </h2>
                                            <div id="faq{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" data-bs-parent="#faqAccordion">
                                                <div class="accordion-body">
                                                    {{ $faq->answer }}
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 mb-5">
                        <div class="card border-danger-subtle rounded-3">
                            <div class="card-body rounded-3">
                                <div class="text-center mt-3 mb-5">
                                    <h4 class="text-danger">Tentang Produk Rumah KSU</h4>
                                </div>

                                <div class="faq-white m-1">
                                    <div class="accordion m-1" id="faqAccordionProduct">
                                        @foreach($faqProducts as $index => $faqProduct)
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button {{ $index === 0 ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#faqProduct{{ $index }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="faqProduct{{ $index }}">
                                                    {{ $faqProduct->question }}
                                                </button>
                                            </h2>
                                            <div id="faqProduct{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" data-bs-parent="#faqAccordionProduct">
                                                <div class="accordion-body">
                                                    {{ $faqProduct->answer }}
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function showImage(src) {
                const modalImage = document.getElementById('modalImage');
                modalImage.src = src;
            }

            // Auto slider image, looping image
            window.addEventListener('DOMContentLoaded', () => {
                const track = document.querySelector('.brand-track');
                if (track) {
                    const clone = track.innerHTML;
                    track.innerHTML += clone; // Double the image list
                }
            });
        </script>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const modalImage = document.getElementById("testimonialModalImage");
                const testimonialImgs = document.querySelectorAll(".testimonial-img");

                testimonialImgs.forEach(img => {
                    img.addEventListener("click", () => {
                        modalImage.src = img.getAttribute("data-img");
                    });
                });
            });
        </script>

        @endsection
