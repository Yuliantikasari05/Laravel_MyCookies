<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'category_id' => 1,
                'name' => 'Double Chocolate Chip Cookies',
                'description' => 'Rich double chocolate chip cookies made with premium cocoa powder.',
                'price' => 25000,
                'stock' => 100,
                'image' => 'products/chocolate-chip.jpg',
            ],
            // Add more products here
        ];

        foreach ($products as $product) {
            $product['slug'] = Str::slug($product['name']);
            Product::create($product);
        }
    }
}