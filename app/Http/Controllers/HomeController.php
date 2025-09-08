<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\AboutUsImage;
use App\Models\Brand;
use App\Models\CarouselSlide;
use App\Models\Faq;
use App\Models\FaqProduct;
use App\Models\FeaturedProduct;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\Promo;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $carouselSlides = CarouselSlide::with('images')->orderBy('order')->get();
        $brands = Brand::all();
        $promo = Promo::first();
        $featuredProducts = FeaturedProduct::all();
        $testimonials = Testimonial::all();
        $gallery = Gallery::all();
        $faqs = Faq::all();
        $faqProducts = FaqProduct::all();
        $aboutUs = AboutUs::first();
        $aboutUsImages = AboutUsImage::all();
        $products = Product::all();

        return view('welcome', compact(
            'carouselSlides',
            'brands',
            'promo',
            'featuredProducts',
            'testimonials',
            'gallery',
            'faqs',
            'faqProducts',
            'aboutUs',
            'aboutUsImages',
            'products'
        ));
    }
}
