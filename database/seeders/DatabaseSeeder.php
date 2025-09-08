<?php

namespace Database\Seeders;

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
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create carousel slides
        for ($i = 1; $i <= 3; $i++) {
            $slide = CarouselSlide::create(['order' => $i]);

            CarouselImage::create([
                'carousel_slide_id' => $slide->id,
                'platform' => 'mobile',
                'image' => 'carousel/mobile-hero-' . $i . '.png'
            ]);

            CarouselImage::create([
                'carousel_slide_id' => $slide->id,
                'platform' => 'tablet',
                'image' => 'carousel/tablet-hero-' . $i . '.png'
            ]);

            CarouselImage::create([
                'carousel_slide_id' => $slide->id,
                'platform' => 'desktop',
                'image' => 'carousel/desktop-hero-' . $i . '.png'
            ]);
        }

        // Create initial brands
        Brand::create([
            'image' => 'brands/keraji-brand.png'
        ]);

        Brand::create([
            'image' => 'brands/kaki-lima-brand.png'
        ]);

        Brand::create([
            'image' => 'brands/tuju-kreavi-brand.png'
        ]);

        // Create promo
        Promo::create([
            'image' => 'promo/video-img.avif',
            'title' => 'Camilan lezat & layanan kreatif dalam satu rumah',
            'description' => 'Rumah KSU adalah holding company asal Cileungsi yang menaungi brand camilan seperti Keraji dan Kaki Lima, serta layanan agensi desain melalui Tuju Kreavi. Sejak 2004, kami fokus pada kualitas dan kreativitas untuk menghadirkan produk dan layanan terbaik.'
        ]);

        // Create featured products
        FeaturedProduct::create([
            'product_name' => 'Singkong Balado 100g',
            'brand_name' => 'KERAJI',
            'image' => 'featured-products/singkong-balado-100g.webp'
        ]);

        FeaturedProduct::create([
            'product_name' => 'Singkong Balado 100g',
            'brand_name' => 'KERAJI',
            'image' => 'featured-products/singkong-balado-100g.webp'
        ]);

        FeaturedProduct::create([
            'product_name' => 'Singkong Balado 100g',
            'brand_name' => 'KERAJI',
            'image' => 'featured-products/singkong-balado-100g.webp'
        ]);

        // Create testimonials
        for ($i = 1; $i <= 4; $i++) {
            Testimonial::create([
                'image' => 'testimonials/review.jpeg'
            ]);
        }

        // Create gallery
        for ($i = 1; $i <= 6; $i++) {
            Gallery::create([
                'image' => 'gallery/singkong-balado-100g.webp'
            ]);
        }

        // Create FAQs about company
        Faq::create([
            'question' => 'Apa itu Rumah KSU?',
            'answer' => 'Rumah KSU (Keripik Saji Unggul) adalah holding company yang menaungi berbagai brand di bidang makanan ringan dan jasa desain kreatif. Kami telah beroperasi sejak tahun 2004 dan berbasis di Cileungsi, Bogor.'
        ]);

        Faq::create([
            'question' => 'Brand apa saja yang dikelola Rumah KSU?',
            'answer' => 'Kami mengelola KERAJI (brand keripik dan snack), Kaki Lima (layanan snack dan catering), dan Tuju Kreavi (jasa desain visual untuk UMKM dan perusahaan).'
        ]);

        Faq::create([
            'question' => 'Dimana lokasi produksi Rumah KSU?',
            'answer' => 'Produksi kami berada di Jalan Alternatif Cibubur Pasar Lama No. 74 Cileungsi, Bogor - Jawa Barat 16820. Semua produk dibuat dengan standar kebersihan dan kualitas yang tinggi.'
        ]);

        Faq::create([
            'question' => 'Apakah produk Rumah KSU halal?',
            'answer' => 'Ya, semua produk makanan kami telah bersertifikat halal dari MUI dan diproses dengan standar kebersihan yang ketat.'
        ]);

        // Create FAQs about products
        FaqProduct::create([
            'question' => 'Bagaimana cara memesan produk Rumah KSU?',
            'answer' => 'Anda dapat memesan melalui WhatsApp, Shopee, Tokopedia, atau datang langsung ke outlet kami. Untuk pemesanan dalam jumlah besar, silakan hubungi customer service kami.'
        ]);

        FaqProduct::create([
            'question' => 'Apakah Rumah KSU melayani pengiriman ke seluruh Indonesia?',
            'answer' => 'Ya, kami melayani pengiriman ke seluruh Indonesia melalui jasa ekspedisi terpercaya. Biaya pengiriman menyesuaikan dengan lokasi dan berat paket.'
        ]);

        FaqProduct::create([
            'question' => 'Berapa lama waktu pengiriman?',
            'answer' => 'Untuk area Jabodetabek, pengiriman biasanya memakan waktu 1-2 hari kerja. Untuk luar Jabodetabek, pengiriman memakan waktu 3-7 hari kerja tergantung lokasi.'
        ]);

        FaqProduct::create([
            'question' => 'Apakah ada garansi untuk produk?',
            'answer' => 'Kami menjamin kualitas semua produk kami. Jika Anda menerima produk yang rusak atau tidak sesuai pesanan, silakan hubungi customer service kami untuk proses penggantian.'
        ]);

        // Create about us
        AboutUs::create([
            'description' => 'Didirikan pada tahun 2004 di Cileungsi, Rumah KSU (Keripik Saji Unggul) adalah holding company yang menaungi berbagai brand di bidang makanan ringan dan jasa desain kreatif. Kami percaya bahwa camilan berkualitas dan identitas visual yang kuat adalah dua hal yang mampu menciptakan kesan mendalam bagi konsumen.'
        ]);

        // Create about us images
        AboutUsImage::create([
            'image' => 'about-us/group-photo.png',
            'column_position' => 'left'
        ]);

        AboutUsImage::create([
            'image' => 'about-us/grupp.png',
            'column_position' => 'right'
        ]);

        AboutUsImage::create([
            'image' => 'about-us/grup.png',
            'column_position' => 'right'
        ]);

        // Create products
        Product::create([
            'product_name' => 'Singkong Balado 100g',
            'brand_name' => 'KERAJI',
            'image' => 'products/singkong-balado-100g.webp'
        ]);

        Product::create([
            'product_name' => 'Singkong Balado 100g',
            'brand_name' => 'KERAJI',
            'image' => 'products/singkong-balado-100g.webp'
        ]);

        Product::create([
            'product_name' => 'Singkong Balado 100g',
            'brand_name' => 'KERAJI',
            'image' => 'products/singkong-balado-100g.webp'
        ]);

        Product::create([
            'product_name' => 'Singkong Balado 100g',
            'brand_name' => 'KERAJI',
            'image' => 'products/singkong-balado-100g.webp'
        ]);

        Product::create([
            'product_name' => 'Singkong Balado 100g',
            'brand_name' => 'KERAJI',
            'image' => 'products/singkong-balado-100g.webp'
        ]);

        Product::create([
            'product_name' => 'Singkong Balado 100g',
            'brand_name' => 'KERAJI',
            'image' => 'products/singkong-balado-100g.webp'
        ]);

        $this->command->info('Database seeded successfully with Indonesian content!');
    }
}
