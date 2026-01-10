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
        Schema::table('orders', function (Blueprint $table) {
            $table->timestamp('cooking_started_at')->nullable()->after('status');
            $table->timestamp('cooking_completed_at')->nullable()->after('cooking_started_at');
            $table->timestamp('delivery_started_at')->nullable()->after('cooking_completed_at');
            $table->timestamp('delivered_at')->nullable()->after('delivery_started_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['cooking_started_at', 'cooking_completed_at', 'delivery_started_at', 'delivered_at']);
        });
    }
};
