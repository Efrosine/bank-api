<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Andi Wijaya',
            'email' => 'andi@example.com',
            'password' => bcrypt('password123'),
            'balance' => 1000000, // 1 juta Rupiah
        ]);

        User::create([
            'name' => 'Siti Aisyah',
            'email' => 'siti@example.com',
            'password' => bcrypt('password123'),
            'balance' => 500000, // 500 ribu Rupiah
        ]);

        User::create([
            'name' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'password' => bcrypt('password123'),
            'balance' => 2000000, // 2 juta Rupiah
        ]);

        User::create([
            'name' => 'Rina Putri',
            'email' => 'rina@example.com',
            'password' => bcrypt('password123'),
            'balance' => 1500000, // 1.5 juta Rupiah
        ]);

        User::create([
            'name' => 'Dedi Rahman',
            'email' => 'dedi@example.com',
            'password' => bcrypt('password123'),
            'balance' => 750000, // 750 ribu Rupiah
        ]);
    }
}
