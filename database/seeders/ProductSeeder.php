<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public $product = [
       ['name' => 'Example Product 2',
        'description' => 'This is an example product.',
        'price' => 29.99,],
        ['name' => 'Example Product 3',
        'description' => 'This is an example product.',
        'price' => 39.99,]
        ];
    public function run(): void
    {
        foreach($this->product as $product)
        {
            \App\Models\Product::create($product);
        }
        
    }
}
