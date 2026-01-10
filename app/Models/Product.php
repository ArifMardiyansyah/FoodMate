<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'category',
        'description',
        'price',
        'image_path',
        'rating',
        'is_active',
        'default_daily_stock',
        'use_stock_system',
        'minimum_stock',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'rating' => 'float',
        'use_stock_system' => 'boolean',
    ];

    // Relasi ke DailyStock
    public function dailyStocks()
    {
        return $this->hasMany(DailyStock::class);
    }

    // Relasi ke OrderItems
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Relasi ke Favorites
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function favoritedByUsers()
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }

    // Method untuk mendapatkan jumlah user yang memfavoritkan produk ini
    public function getFavoritesCountAttribute()
    {
        return $this->favorites()->count();
    }

    // Method untuk mendapatkan stok hari ini
    public function getTodayStock()
    {
        return $this->dailyStocks()->today()->first();
    }

    // Method untuk cek apakah produk tersedia hari ini
    public function isAvailableToday()
    {
        // Jika tidak menggunakan sistem stok, selalu tersedia
        if (!$this->use_stock_system) {
            return $this->is_active;
        }

        $todayStock = $this->getTodayStock();
        
        // Jika belum ada stok hari ini, buat otomatis dari default
        if (!$todayStock) {
            $todayStock = $this->createTodayStock();
        }

        return $this->is_active && $todayStock && $todayStock->is_available && $todayStock->current_stock > 0;
    }

    // Method untuk mendapatkan stok tersisa hari ini
    public function getCurrentStock()
    {
        if (!$this->use_stock_system) {
            return null; // Unlimited
        }

        $todayStock = $this->getTodayStock();
        
        if (!$todayStock) {
            $todayStock = $this->createTodayStock();
        }

        return $todayStock ? $todayStock->current_stock : 0;
    }

    // Method untuk membuat stok hari ini otomatis
    public function createTodayStock()
    {
        return DailyStock::create([
            'product_id' => $this->id,
            'date' => Carbon::today(),
            'initial_stock' => $this->default_daily_stock,
            'current_stock' => $this->default_daily_stock,
            'sold_quantity' => 0,
            'is_available' => true,
        ]);
    }

    // Method untuk mengurangi stok saat ada pembelian
    public function reduceStock($quantity)
    {
        if (!$this->use_stock_system) {
            return true; // Tidak perlu kurangi stok jika tidak menggunakan sistem stok
        }

        $todayStock = $this->getTodayStock();
        
        if (!$todayStock) {
            $todayStock = $this->createTodayStock();
        }

        return $todayStock->decreaseStock($quantity);
    }

    // Scope untuk produk yang tersedia hari ini
    public function scopeAvailableToday($query)
    {
        return $query->where('is_active', true)
            ->where(function ($q) {
                // Produk yang tidak menggunakan stok sistem
                $q->where('use_stock_system', false)
                  // Atau produk yang punya stok hari ini
                  ->orWhereHas('dailyStocks', function ($stockQuery) {
                      $stockQuery->today()
                                 ->where('is_available', true)
                                 ->where('current_stock', '>', 0);
                  });
            });
    }
}
