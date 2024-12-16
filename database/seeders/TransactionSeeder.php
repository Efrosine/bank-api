<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transaction::create([
            'user_id' => 1, // Menyesuaikan dengan ID pengguna yang ada
            'type' => 'deposit',
            'amount' => 1000000, // 1 juta Rupiah
            'transaction_date' => Carbon::now(),
        ]);

        Transaction::create([
            'user_id' => 2,
            'type' => 'payment',
            'amount' => 200000, // 200 ribu Rupiah
            'transaction_date' => Carbon::now(),
        ]);

        Transaction::create([
            'user_id' => 3,
            'type' => 'deposit',
            'amount' => 500000, // 500 ribu Rupiah
            'transaction_date' => Carbon::now(),
        ]);

        Transaction::create([
            'user_id' => 4,
            'type' => 'payment',
            'amount' => 300000, // 300 ribu Rupiah
            'transaction_date' => Carbon::now(),
        ]);

        Transaction::create([
            'user_id' => 5,
            'type' => 'deposit',
            'amount' => 1500000, // 1.5 juta Rupiah
            'transaction_date' => Carbon::now(),
        ]);
    }
}
