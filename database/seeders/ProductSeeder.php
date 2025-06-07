<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $electronics = Category::where('name', 'Electronics')->first();
        $fashion = Category::where('name', 'Fashion')->first();
        $books = Category::where('name', 'Books')->first();

        Product::create(['name' => 'Smartphone', 'price' => 599.99, 'stock' => 50, 'category_id' => $electronics->id]);
        Product::create(['name' => 'T-Shirt', 'price' => 19.99, 'stock' => 100, 'category_id' => $fashion->id]);
        Product::create(['name' => 'Novel', 'price' => 9.99, 'stock' => 200, 'category_id' => $books->id]);
    }
}
