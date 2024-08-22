<?php

namespace Database\Seeders;

use App\Models\Seller;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SellerSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::where('role', User::SELLER)->get();

        foreach($users as $user) {
            
            $seller = Seller::create([
                'user_id' => $user->id,
                'name' => $user->name,
                'phone' => fake()->phoneNumber(),
                'address' => fake()->address(),
                'delivery_charge' => 100,
                'image' => 'images/shop.png',
            ]);

            $user->seller_id = $seller->id;
            $user->save();
        }
    }
}
