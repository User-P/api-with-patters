<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            //SAT
            PaymentMethodSeeder::class,
            PaymentMethodTypeSeeder::class,
            TaxRegimeSeeder::class,
            BankSeeder::class,
            //End SAT
            RolePermissionSeeder::class,
            GenderSeeder::class,
        ]);
    }
}
