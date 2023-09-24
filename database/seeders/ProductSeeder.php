<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::insert([
            'name' => 'Bionev Liquid',
            'price' => 98000,
            'weight' => 500,
        ]);
    }
}
