<?php

namespace Database\Seeders;

use App\Models\AccountBinding;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AccountBindingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AccountBinding::create([
            'user_id' => 1,
            'ecommerce_user_id' => 10001,
            'linked_at' => Carbon::now(),
            'status' => 'active',
        ]);

        AccountBinding::create([
            'user_id' => 2,
            'ecommerce_user_id' => 10002,
            'linked_at' => Carbon::now(),
            'status' => 'inactive',
        ]);

        AccountBinding::create([
            'user_id' => 3,
            'ecommerce_user_id' => 10003,
            'linked_at' => Carbon::now(),
            'status' => 'active',
        ]);

        AccountBinding::create([
            'user_id' => 4,
            'ecommerce_user_id' => 10004,
            'linked_at' => Carbon::now(),
            'status' => 'inactive',
        ]);

        AccountBinding::create([
            'user_id' => 5,
            'ecommerce_user_id' => 10005,
            'linked_at' => Carbon::now(),
            'status' => 'active',
        ]);
    }
}
