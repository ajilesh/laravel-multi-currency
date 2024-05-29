<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currency = [
            // ['code' => 'USD','name'=>'United States Dollar','symbol'=>'$','exchange_rate'=>1],
            // ['code' => 'INR','name'=>'Indian Rupees','symbol'=>'₹','exchange_rate'=>83.18],
            ['code' => 'OMR','name'=>'Oman Riyal','symbol'=>'﷼','exchange_rate'=>2.60],
        ];
        foreach ($currency as $currency) {
            \App\Models\Currency::create($currency);
        }
        
    }
}
