<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Coupon;

class CouponSeeder extends Seeder
{
    public function run(): void
    {
        Coupon::create(['code' => 'SAVE10', 'discount' => 10.00, 'expires_at' => now()->addMonth()]);
        Coupon::create(['code' => 'SAVE20', 'discount' => 20.00, 'expires_at' => now()->addMonth()]);
    }
}
