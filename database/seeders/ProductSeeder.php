<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product; 

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Product::create([          
            'name' => 'Quadro Embutir 8 Disyuntores',
            'unit_type' => 'Unidad',
            'unit_price' => 0,
            'buy_price' => 0.00,     
            'stock' => 0,
        ]);

        Product::create([           
            'name' => '',
            'unit_type' => 'Unidad',
            'unit_price' => 0.00,
            'buy_price' => 0.00,           
            'stock' => 0,
        ]);

         Product::create([           
            'name' => 'Interruptor Simple 10A',
            'unit_type' => 'Unidad',
            'unit_price' => 0.00,
            'buy_price' => 0.00,           
            'stock' => 0,
        ]);







    }
}
