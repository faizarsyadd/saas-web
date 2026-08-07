<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Table;
use Illuminate\Support\Facades\Hash;

class FnbSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Akun Admin & Kasir
        User::create([
            'name' => 'Admin FnB',
            'email' => 'admin@dineflow.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Kasir Utama',
            'email' => 'kasir@dineflow.com',
            'password' => Hash::make('password123'),
            'role' => 'kasir',
        ]);

        // 2. Kategori Menu
        $makanan = Category::create(['name' => 'Makanan Utama']);
        $minuman = Category::create(['name' => 'Minuman']);
        $snack = Category::create(['name' => 'Cemilan']);

        // 3. Menu
        Menu::create([
            'category_id' => $makanan->id,
            'name' => 'Nasi Goreng Spesial',
            'description' => 'Nasi goreng dengan telur, ayam suwir, dan kerupuk',
            'price' => 25000,
            'is_available' => true,
        ]);

        Menu::create([
            'category_id' => $makanan->id,
            'name' => 'Mie Goreng Seafood',
            'description' => 'Mie goreng dengan udang dan cumi segar',
            'price' => 30000,
            'is_available' => true,
        ]);

        Menu::create([
            'category_id' => $minuman->id,
            'name' => 'Es Teh Manis',
            'description' => 'Es teh segar manis pas',
            'price' => 5000,
            'is_available' => true,
        ]);

        Menu::create([
            'category_id' => $minuman->id,
            'name' => 'Kopi Latte',
            'description' => 'Espresso dengan susu segar hangat/dingin',
            'price' => 18000,
            'is_available' => true,
        ]);

        // 4. Meja Resto
        for ($i = 1; $i <= 10; $i++) {
            Table::create([
                'table_number' => 'Meja ' . sprintf('%02d', $i),
                'qr_code_key' => 'table-' . $i,
                'status' => 'available',
            ]);
        }
    }
}