<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $this->createAdmin();
        $this->createCustomer();
        $this->createSellers(30);
    }

    private function createAdmin()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
            'role' => User::ADMIN,
        ]);
    }

    public function createCustomer()
    {
        User::create([
            'name' => 'Customer',
            'email' => 'customer@gmail.com',
            'password' => Hash::make('123456'),
            'role' => User::CUSTOMER,
        ]);
    }

    public function createSellers($sellerCount)
    {
        User::create([
            'name' => 'Seller',
            'email' => 'seller@gmail.com',
            'password' => Hash::make('123456'),
            'role' => User::SELLER,
        ]);

        for ($i = 0; $i < $sellerCount; $i++) {

            User::create([
                'name' => fake()->name(),
                'email' => fake()->safeEmail(),
                'password' => Hash::make('123456'),
                'role' => User::SELLER,
            ]);
        }
    }
}
