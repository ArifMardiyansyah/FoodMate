<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Update orders yang belum memiliki user_id
        // Kita akan mencoba mencocokkan berdasarkan session_id dengan user yang sedang login
        // Atau bisa juga berdasarkan customer_phone dengan phone di tabel users
        
        DB::statement('
            UPDATE orders o
            INNER JOIN users u ON o.customer_phone = u.phone
            SET o.user_id = u.id
            WHERE o.user_id IS NULL
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Tidak perlu rollback karena ini hanya update data
    }
};
