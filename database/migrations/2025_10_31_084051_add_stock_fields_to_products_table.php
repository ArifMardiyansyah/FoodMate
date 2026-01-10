<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Default stock untuk produk (stok standar per hari)
            $table->unsignedInteger('default_daily_stock')->default(50)->after('is_active');
            
            // Apakah produk ini menggunakan sistem stok
            $table->boolean('use_stock_system')->default(true)->after('default_daily_stock');
            
            // Stok minimum sebelum warning
            $table->unsignedInteger('minimum_stock')->default(5)->after('use_stock_system');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['default_daily_stock', 'use_stock_system', 'minimum_stock']);
        });
    }
};
