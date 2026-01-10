<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class DailyStock extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'date',
        'initial_stock',
        'current_stock',
        'sold_quantity',
        'is_available',
        'admin_notes',
    ];

    protected $casts = [
        'date' => 'date',
        'is_available' => 'boolean',
    ];

    // Relasi ke Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Scope untuk mendapatkan stok hari ini
    public function scopeToday($query)
    {
        return $query->where('date', Carbon::today());
    }

    // Scope untuk mendapatkan stok yang masih tersedia
    public function scopeAvailable($query)
    {
        return $query->where('is_available', true)->where('current_stock', '>', 0);
    }

    // Method untuk mengurangi stok
    public function decreaseStock($quantity)
    {
        if ($this->current_stock >= $quantity) {
            $this->current_stock -= $quantity;
            $this->sold_quantity += $quantity;
            
            // Jika stok habis, set is_available = false
            if ($this->current_stock <= 0) {
                $this->is_available = false;
            }
            
            $this->save();
            return true;
        }
        
        return false;
    }

    // Method untuk menambah stok
    public function increaseStock($quantity)
    {
        $this->current_stock += $quantity;
        $this->initial_stock += $quantity;
        
        // Jika stok bertambah, set is_available = true
        if ($this->current_stock > 0) {
            $this->is_available = true;
        }
        
        $this->save();
        return true;
    }

    // Method untuk set ketersediaan manual oleh admin
    public function setAvailability($isAvailable, $notes = null)
    {
        $this->is_available = $isAvailable;
        if ($notes) {
            $this->admin_notes = $notes;
        }
        $this->save();
    }

    // Method untuk cek apakah stok menipis
    public function isLowStock()
    {
        return $this->current_stock <= $this->product->minimum_stock;
    }

    // Method untuk mendapatkan persentase stok tersisa
    public function getStockPercentage()
    {
        if ($this->initial_stock == 0) {
            return 0;
        }
        return round(($this->current_stock / $this->initial_stock) * 100);
    }
}
