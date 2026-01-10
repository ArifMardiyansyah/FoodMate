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
        Schema::create('daily_stocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->date('date'); // Tanggal untuk stok ini
            $table->unsignedInteger('initial_stock'); // Stok awal hari ini
            $table->unsignedInteger('current_stock'); // Stok saat ini (berkurang saat ada pembelian)
            $table->unsignedInteger('sold_quantity')->default(0); // Jumlah yang sudah terjual
            $table->boolean('is_available')->default(true); // Apakah masih tersedia untuk dijual
            $table->text('admin_notes')->nullable(); // Catatan dari admin
            $table->timestamps();
            
            // Index untuk query cepat
            $table->unique(['product_id', 'date']);
            $table->index('date');
            $table->index('is_available');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_stocks');
    }
};
