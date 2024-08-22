<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Seller;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $sellers = Seller::get();

        foreach ($sellers as $seller) {
            
            $this->createProducts($seller->id, 50);
        }
    }

    private function createProducts($seller_id, $productCount)
    {
        for ($i = 0; $i < $productCount; $i++) {

            Product::create([
                'seller_id' => $seller_id,
                'name' => fake()->name(),
                'image' => 'images/product.png',
                'regular_price' => 1200,
                'sale_price' => 1000,
                'description' => fake()->sentence(),
                'stock_in' => rand(100, 500),
                'stock_out' => 0,
                'is_active' => true,
            ]);
        }
    }
}
