<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            ['name' => 'Mie Goreng', 'category' => 'Makanan', 'price' => 12000, 'image_path' => 'images/food/mie_goreng.jpg', 'description' => 'Mie goreng dengan ayam, telur, dan sayur.', 'rating' => 5],
            ['name' => 'Mie Rebus', 'category' => 'Makanan', 'price' => 12000, 'image_path' => 'images/food/mie_rebus.jpg', 'description' => 'Mie rebus kuah gurih dengan topping ayam dan telur.', 'rating' => 5],
            ['name' => 'Soto', 'category' => 'Makanan', 'price' => 15000, 'image_path' => 'images/food/soto.jpeg', 'description' => 'Soto hangat dengan kuah kuning dan nasi.', 'rating' => 5],
            ['name' => 'Sup Daging Sapi', 'category' => 'Makanan', 'price' => 20000, 'image_path' => 'images/food/sup_daging.jpeg', 'description' => 'Sup daging sapi dengan sayuran segar.', 'rating' => 5],
            ['name' => 'Risol Sayur', 'category' => 'Snack', 'price' => 3000, 'image_path' => 'images/food/risol.jpeg', 'description' => 'Risol sayur renyah isi wortel dan kentang.', 'rating' => 5],
            ['name' => 'Donat Kentang', 'category' => 'Snack', 'price' => 5000, 'image_path' => 'images/food/donat.jpg', 'description' => 'Donat kentang lembut dengan taburan gula halus.', 'rating' => 5],
            ['name' => 'Pecel Lele', 'category' => 'Makanan', 'price' => 20000, 'image_path' => 'images/food/pecel_lele.png', 'description' => 'Pecel lele goreng dengan sambal dan lalapan.', 'rating' => 5],
            ['name' => 'Pecal Ayam', 'category' => 'Makanan', 'price' => 18000, 'image_path' => 'images/food/pecel_ayam.png', 'description' => 'Pecel ayam lengkap sambal kacang.', 'rating' => 5],
            ['name' => 'Nasi Goreng', 'category' => 'Makanan', 'price' => 15000, 'image_path' => 'images/food/nasi_goreng.jpg', 'description' => 'Nasi goreng spesial dengan telur dan ayam.', 'rating' => 5],
            ['name' => 'Nasi Uduk', 'category' => 'Makanan', 'price' => 15000, 'image_path' => 'images/food/nasi_uduk.png', 'description' => 'Nasi uduk gurih dengan lauk lengkap.', 'rating' => 5],
            ['name' => 'Gado-Gado', 'category' => 'Makanan', 'price' => 14000, 'image_path' => 'images/food/gado_gado.jpg', 'description' => 'Gado-gado dengan saus kacang kental.', 'rating' => 5],
            ['name' => 'Sate Ayam', 'category' => 'Makanan', 'price' => 18000, 'image_path' => 'images/food/sate_ayam.png', 'description' => 'Sate ayam bumbu kacang.', 'rating' => 5],
            ['name' => 'Air Mineral', 'category' => 'Minuman', 'price' => 4000, 'image_path' => 'images/drink/air_mineral.jpeg', 'description' => 'Air mineral dingin.', 'rating' => 5],
            ['name' => 'Es Teh', 'category' => 'Minuman', 'price' => 5000, 'image_path' => 'images/drink/es_teh.jpeg', 'description' => 'Es teh manis segar.', 'rating' => 5],
            ['name' => 'Es Teh Hijau', 'category' => 'Minuman', 'price' => 6000, 'image_path' => 'images/drink/es_teh_hijau.jpeg', 'description' => 'Es teh hijau dengan sedikit madu.', 'rating' => 5],
            ['name' => 'Kopi', 'category' => 'Minuman', 'price' => 6000, 'image_path' => 'images/drink/kopi.jpeg', 'description' => 'Kopi panas pekat.', 'rating' => 5],
            ['name' => 'Minuman Boba', 'category' => 'Minuman', 'price' => 15000, 'image_path' => 'images/drink/boba.jpeg', 'description' => 'Minuman boba manis dan kenyal.', 'rating' => 5],
            ['name' => 'Minuman Matcha', 'category' => 'Minuman', 'price' => 17000, 'image_path' => 'images/drink/matcha.jpeg', 'description' => 'Matcha latte dingin.', 'rating' => 5],
            ['name' => 'Minuman Jus', 'category' => 'Minuman', 'price' => 12000, 'image_path' => 'images/drink/jus.jpeg', 'description' => 'Jus buah segar.', 'rating' => 5],
            ['name' => 'Es Durian Asli', 'category' => 'Minuman', 'price' => 18000, 'image_path' => 'images/drink/es_durian.jpeg', 'description' => 'Es durian asli.', 'rating' => 5],
            ['name' => 'Es Cendol', 'category' => 'Minuman', 'price' => 10000, 'image_path' => 'images/drink/es_cendol.jpeg', 'description' => 'Es cendol legit.', 'rating' => 5],
            ['name' => 'Sop Buah', 'category' => 'Minuman', 'price' => 14000, 'image_path' => 'images/drink/sop_buah.jpeg', 'description' => 'Sop buah segar.', 'rating' => 5],
            ['name' => 'Susu Kedelai', 'category' => 'Minuman', 'price' => 7000, 'image_path' => 'images/drink/susu_kedelai.jpeg', 'description' => 'Susu kedelai hangat.', 'rating' => 5],
        ];

        foreach ($products as $item) {
            Product::updateOrCreate(
                ['slug' => Str::slug($item['name'])],
                [
                    'name' => $item['name'],
                    'slug' => Str::slug($item['name']),
                    'category' => $item['category'],
                    'description' => $item['description'],
                    'price' => $item['price'],
                    'image_path' => $item['image_path'],
                    'rating' => $item['rating'],
                    'is_active' => true,
                ]
            );
        }
    }
}
