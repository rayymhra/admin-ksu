<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\AboutUsImage;
use App\Models\Brand;
use App\Models\CarouselImage;
use App\Models\CarouselSlide;
use App\Models\Faq;
use App\Models\FaqProduct;
use App\Models\FeaturedProduct;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\Promo;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    // Admin Dashboard
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // Carousel Management - Only Update
    public function carouselIndex()
    {
        $slides = CarouselSlide::with('images')->orderBy('order')->get();
        return view('admin.carousel.index', compact('slides'));
    }

    public function carouselUpdate(Request $request, $id)
    {
        $request->validate([
            'mobile_image.*' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tablet_image.*' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'desktop_image.*' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $slide = CarouselSlide::findOrFail($id);

        // Update mobile image
        if ($request->hasFile('mobile_image')) {
            $this->updateCarouselImage($slide, 'mobile', $request->file('mobile_image'));
        }

        // Update tablet image
        if ($request->hasFile('tablet_image')) {
            $this->updateCarouselImage($slide, 'tablet', $request->file('tablet_image'));
        }

        // Update desktop image
        if ($request->hasFile('desktop_image')) {
            $this->updateCarouselImage($slide, 'desktop', $request->file('desktop_image'));
        }

        return redirect()->route('carousel.index')
            ->with('success', 'Gambar carousel berhasil diperbarui.');
    }

    private function updateCarouselImage($slide, $platform, $file)
    {
        $image = $slide->images()->where('platform', $platform)->first();

        if ($image) {
            // Delete old image
            if (Storage::exists('public/' . $image->image)) {
                Storage::delete('public/' . $image->image);
            }

            // Store new image
            $path = $file->store('carousel', 'public');
            $image->update(['image' => $path]);
        }
    }

    // Brands Management - Create, Update, Delete
    public function brandsIndex()
    {
        $brands = Brand::all();
        return view('admin.brands.index', compact('brands'));
    }

    public function brandsStore(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $path = $request->file('image')->store('brands', 'public');

        Brand::create([
            'image' => $path,
        ]);

        return redirect()->route('brands.index')
            ->with('success', 'Brand berhasil ditambahkan.');
    }

    public function brandsUpdate(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $brand = Brand::findOrFail($id);

        // Delete old image
        if (Storage::exists('public/' . $brand->image)) {
            Storage::delete('public/' . $brand->image);
        }

        // Store new image
        $path = $request->file('image')->store('brands', 'public');
        $brand->update(['image' => $path]);

        return redirect()->route('brands.index')
            ->with('success', 'Brand berhasil diperbarui.');
    }

    public function brandsDestroy($id)
    {
        $brand = Brand::findOrFail($id);

        // Delete image
        if (Storage::exists('public/' . $brand->image)) {
            Storage::delete('public/' . $brand->image);
        }

        $brand->delete();

        return redirect()->route('brands.index')
            ->with('success', 'Brand berhasil dihapus.');
    }

    // Promo Management - Only Update
    public function promoIndex()
    {
        $promo = Promo::first();
        if (!$promo) {
            $promo = Promo::create([
                'image' => 'promo/default.jpg',
                'title' => 'Judul Promo',
                'description' => 'Deskripsi promo'
            ]);
        }
        return view('admin.promo.index', compact('promo'));
    }

    public function promoUpdate(Request $request, $id)
    {
        $request->validate([
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $promo = Promo::findOrFail($id);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
        ];

        if ($request->hasFile('image')) {
            // Delete old image
            if (Storage::exists('public/' . $promo->image)) {
                Storage::delete('public/' . $promo->image);
            }

            // Store new image
            $path = $request->file('image')->store('promo', 'public');
            $data['image'] = $path;
        }

        $promo->update($data);

        return redirect()->route('promo.index')
            ->with('success', 'Promo berhasil diperbarui.');
    }

    // Featured Products Management - Only Update
    public function featuredProductsIndex()
    {
        $products = FeaturedProduct::all();
        return view('admin.featured-products.index', compact('products'));
    }

    public function featuredProductsUpdate(Request $request, $id)
    {
        $request->validate([
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'product_name' => 'required|string|max:255',
            'brand_name' => 'required|string|max:255',
        ]);

        $product = FeaturedProduct::findOrFail($id);

        $data = [
            'product_name' => $request->product_name,
            'brand_name' => $request->brand_name,
        ];

        if ($request->hasFile('image')) {
            // Delete old image
            if (Storage::exists('public/' . $product->image)) {
                Storage::delete('public/' . $product->image);
            }

            // Store new image
            $path = $request->file('image')->store('featured-products', 'public');
            $data['image'] = $path;
        }

        $product->update($data);

        return redirect()->route('featured-products.index')
            ->with('success', 'Produk unggulan berhasil diperbarui.');
    }

    // Testimonials Management - Create, Update, Delete
    public function testimonialsIndex()
    {
        $testimonials = Testimonial::all();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function testimonialsStore(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $path = $request->file('image')->store('testimonials', 'public');

        Testimonial::create([
            'image' => $path,
        ]);

        return redirect()->route('testimonials.index')
            ->with('success', 'Testimonial berhasil ditambahkan.');
    }

    public function testimonialsUpdate(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $testimonial = Testimonial::findOrFail($id);

        // Delete old image
        if (Storage::exists('public/' . $testimonial->image)) {
            Storage::delete('public/' . $testimonial->image);
        }

        // Store new image
        $path = $request->file('image')->store('testimonials', 'public');
        $testimonial->update(['image' => $path]);

        return redirect()->route('testimonials.index')
            ->with('success', 'Testimonial berhasil diperbarui.');
    }

    public function testimonialsDestroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);

        // Delete image
        if (Storage::exists('public/' . $testimonial->image)) {
            Storage::delete('public/' . $testimonial->image);
        }

        $testimonial->delete();

        return redirect()->route('testimonials.index')
            ->with('success', 'Testimonial berhasil dihapus.');
    }

    // Gallery Management - Only Update
    public function galleryIndex()
    {
        $gallery = Gallery::all();
        return view('admin.gallery.index', compact('gallery'));
    }

    public function galleryUpdate(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $gallery = Gallery::findOrFail($id);

        // Delete old image
        if (Storage::exists('public/' . $gallery->image)) {
            Storage::delete('public/' . $gallery->image);
        }

        // Store new image
        $path = $request->file('image')->store('gallery', 'public');
        $gallery->update(['image' => $path]);

        return redirect()->route('gallery.index')
            ->with('success', 'Gambar galeri berhasil diperbarui.');
    }

    // FAQs Management - Only Update
    public function faqsIndex()
    {
        $faqs = Faq::all();
        $faqProducts = FaqProduct::all();
        return view('admin.faqs.index', compact('faqs', 'faqProducts'));
    }

    public function faqsUpdate(Request $request, $id)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        $faq = Faq::findOrFail($id);
        $faq->update([
            'question' => $request->question,
            'answer' => $request->answer,
        ]);

        return redirect()->route('faqs.index')
            ->with('success', 'FAQ berhasil diperbarui.');
    }

    public function faqProductsUpdate(Request $request, $id)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        $faqProduct = FaqProduct::findOrFail($id);
        $faqProduct->update([
            'question' => $request->question,
            'answer' => $request->answer,
        ]);

        return redirect()->route('faqs.index')
            ->with('success', 'FAQ produk berhasil diperbarui.');
    }

    // About Us Management - Only Update
    public function aboutUsIndex()
    {
        $aboutUs = AboutUs::first();
        if (!$aboutUs) {
            $aboutUs = AboutUs::create([
                'description' => 'Deskripsi tentang perusahaan'
            ]);
        }
        $aboutUsImages = AboutUsImage::all();
        return view('admin.about-us.index', compact('aboutUs', 'aboutUsImages'));
    }

    public function aboutUsUpdate(Request $request, $id)
    {
        $request->validate([
            'description' => 'required|string',
        ]);

        $aboutUs = AboutUs::findOrFail($id);
        $aboutUs->update([
            'description' => $request->description,
        ]);

        return redirect()->route('about-us.index')
            ->with('success', 'Tentang kami berhasil diperbarui.');
    }

    public function aboutUsImageUpdate(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $aboutUsImage = AboutUsImage::findOrFail($id);

        // Delete old image
        if (Storage::exists('public/' . $aboutUsImage->image)) {
            Storage::delete('public/' . $aboutUsImage->image);
        }

        // Store new image
        $path = $request->file('image')->store('about-us', 'public');
        $aboutUsImage->update(['image' => $path]);

        return redirect()->route('about-us.index')
            ->with('success', 'Gambar tentang kami berhasil diperbarui.');
    }

    // Products Management - Create, Update, Delete
    public function productsIndex()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function productsStore(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'product_name' => 'required|string|max:255',
            'brand_name' => 'required|string|max:255',
        ]);

        $path = $request->file('image')->store('products', 'public');

        Product::create([
            'product_name' => $request->product_name,
            'brand_name' => $request->brand_name,
            'image' => $path,
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    public function productsUpdate(Request $request, $id)
    {
        $request->validate([
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'product_name' => 'required|string|max:255',
            'brand_name' => 'required|string|max:255',
        ]);

        $product = Product::findOrFail($id);

        $data = [
            'product_name' => $request->product_name,
            'brand_name' => $request->brand_name,
        ];

        if ($request->hasFile('image')) {
            // Delete old image
            if (Storage::exists('public/' . $product->image)) {
                Storage::delete('public/' . $product->image);
            }

            // Store new image
            $path = $request->file('image')->store('products', 'public');
            $data['image'] = $path;
        }

        $product->update($data);

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil diperbarui.');
    }

    public function productsDestroy($id)
    {
        $product = Product::findOrFail($id);

        // Delete image
        if (Storage::exists('public/' . $product->image)) {
            Storage::delete('public/' . $product->image);
        }

        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil dihapus.');
    }
}
