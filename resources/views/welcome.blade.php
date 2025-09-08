<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rumah KSU</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Your custom CSS here -->
</head>
<body>
    <!-- Hero Section with Dynamic Carousel -->
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
                        <img src="assets/placeholder.jpg" class="d-block w-100" alt="Slide {{ $index + 1 }}">
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

    <!-- Our Brand Section with Dynamic Brands -->
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

    <!-- Continue with other sections following the same pattern -->
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

    <!-- Add all other sections following the same pattern -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Your custom JS here -->
</body>
</html>
