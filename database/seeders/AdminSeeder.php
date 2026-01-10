<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cek apakah admin sudah ada
        $adminExists = User::where('email', 'admin@foodmate.com')->exists();

        if (!$adminExists) {
            User::create([
                'name' => 'Admin FoodMate',
                'email' => 'admin@foodmate.com',
                'role' => 'admin',
                'phone' => '081234567890',
                'password' => Hash::make('admin123'),
            ]);

            $this->command->info('✅ Admin account created successfully!');
            $this->command->info('📧 Email: admin@foodmate.com');
            $this->command->info('🔑 Password: admin123');
            $this->command->warn('⚠️  PENTING: Ganti password setelah login pertama!');
        } else {
            $this->command->warn('⚠️  Admin account already exists.');
        }

        // Update existing users to have 'customer' role if they don't have a role
        $usersWithoutRole = User::whereNull('role')->orWhere('role', '')->get();
        
        if ($usersWithoutRole->count() > 0) {
            foreach ($usersWithoutRole as $user) {
                $user->role = 'customer';
                $user->save();
            }
            $this->command->info("✅ Updated {$usersWithoutRole->count()} users to 'customer' role.");
        }
    }
}
