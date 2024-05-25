<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        Product::create(['name' => 'C', 'price' => 56.89, 'details' => 'Detail of product C', 'publish' => true]);
        Product::create(['name' => 'B', 'price' => 23.33, 'details' => 'B detail', 'publish' => true]);
        Product::create(['name' => 'A', 'price' => 60.56, 'details' => 'A detail...', 'publish' => false]);
    }
}

