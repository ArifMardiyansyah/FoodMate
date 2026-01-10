<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'session_id',
        'user_id',
        'customer_name',
        'customer_phone',
        'customer_address',
        'latitude',
        'longitude',
        'payment_method',
        'payment_status',
        'payment_confirmed_at',
        'snap_token',
        'notes',
        'subtotal',
        'delivery_charge',
        'discount',
        'total',
        'status',
        'is_confirmed',
        'confirmed_at',
        'cooking_started_at',
        'cooking_completed_at',
        'delivery_started_at',
        'delivered_at',
        'feedback_rating',
        'feedback_comment',
        'feedback_submitted_at',
    ];

    protected $casts = [
        'latitude' => 'float',
        'longitude' => 'float',
        'feedback_rating' => 'integer',
        'is_confirmed' => 'boolean',
        'cooking_started_at' => 'datetime',
        'cooking_completed_at' => 'datetime',
        'delivery_started_at' => 'datetime',
        'delivered_at' => 'datetime',
        'confirmed_at' => 'datetime',
        'payment_confirmed_at' => 'datetime',
        'feedback_submitted_at' => 'datetime',
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function notifications()
    {
        return $this->hasMany(OrderNotification::class);
    }

    public function getStatusLabelAttribute()
    {
        return match($this->status) {
            'pending' => 'Menunggu Konfirmasi',
            'cooking' => 'Sedang Dimasak',
            'delivering' => 'Sedang Diantar',
            'completed' => 'Selesai',
            'cancelled' => 'Dibatalkan',
            default => ucfirst($this->status),
        };
    }

    public function getPaymentStatusLabelAttribute()
    {
        return match($this->payment_status) {
            'pending' => 'Menunggu Pembayaran',
            'paid' => 'Sudah Dibayar',
            'failed' => 'Gagal',
            'cancelled' => 'Dibatalkan',
            default => ucfirst($this->payment_status),
        };
    }

    public function getPaymentStatusColorAttribute()
    {
        return match($this->payment_status) {
            'pending' => 'warning',
            'paid' => 'success',
            'failed' => 'danger',
            'cancelled' => 'secondary',
            default => 'secondary',
        };
    }
}
