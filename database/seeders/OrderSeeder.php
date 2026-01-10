<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil user pertama atau buat user baru jika belum ada
        $user = User::first();
        
        if (!$user) {
            $user = User::create([
                'name' => 'Test User',
                'email' => 'test@foodmate.com',
                'phone' => '081234567890',
                'password' => bcrypt('password'),
            ]);
        }

        // Ambil beberapa produk
        $products = Product::where('is_active', true)->limit(5)->get();

        if ($products->isEmpty()) {
            $this->command->warn('Tidak ada produk aktif. Silakan jalankan ProductSeeder terlebih dahulu.');
            return;
        }

        // Buat 5 order contoh
        for ($i = 1; $i <= 5; $i++) {
            $subtotal = 0;
            $orderItems = [];

            // Pilih 2-4 produk random untuk setiap order
            $selectedProducts = $products->random(rand(2, min(4, $products->count())));

            foreach ($selectedProducts as $product) {
                $quantity = rand(1, 3);
                $total = $product->price * $quantity;
                $subtotal += $total;

                $orderItems[] = [
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'product_slug' => $product->slug,
                    'product_image' => $product->image_path,
                    'product_price' => $product->price,
                    'quantity' => $quantity,
                    'total' => $total,
                ];
            }

            $deliveryCharge = 5000;
            $discount = 0;
            $total = $subtotal + $deliveryCharge - $discount;

            // Buat order
            $order = Order::create([
                'order_number' => 'ORD-' . now()->subDays($i)->format('YmdHis') . Str::upper(Str::random(4)),
                'session_id' => Str::random(40),
                'user_id' => $user->id,
                'customer_name' => $user->name,
                'customer_phone' => $user->phone,
                'customer_address' => 'Jl. Contoh No. ' . rand(1, 100) . ', Jakarta',
                'latitude' => -6.2088 + (rand(-100, 100) / 1000),
                'longitude' => 106.8456 + (rand(-100, 100) / 1000),
                'payment_method' => ['cash', 'transfer', 'e-wallet'][rand(0, 2)],
                'notes' => $i % 2 == 0 ? 'Tolong jangan pakai cabe' : null,
                'subtotal' => $subtotal,
                'delivery_charge' => $deliveryCharge,
                'discount' => $discount,
                'total' => $total,
                'status' => 'completed',
                'created_at' => now()->subDays($i),
                'updated_at' => now()->subDays($i),
            ]);

            // Buat order items
            foreach ($orderItems as $item) {
                OrderItem::create(array_merge($item, [
                    'order_id' => $order->id,
                    'created_at' => now()->subDays($i),
                    'updated_at' => now()->subDays($i),
                ]));
            }

            // Tambahkan feedback untuk beberapa order
            if ($i % 2 == 0) {
                $order->update([
                    'feedback_rating' => rand(4, 5),
                    'feedback_comment' => ['Makanannya enak!', 'Pengiriman cepat', 'Sangat puas', 'Recommended!'][rand(0, 3)],
                    'feedback_submitted_at' => now()->subDays($i)->addHours(2),
                ]);
            }
        }

        $this->command->info('Berhasil membuat 5 order contoh untuk user: ' . $user->name);
    }
}
