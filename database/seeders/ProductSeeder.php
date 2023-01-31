<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Product::create([
            'name' => 'tiket',
            'description' => 'Tiket Semi Final',
            'price' => 125000,
            'image' => '1.jpg',
            'stock' => 350,
        ]);

        // Product::create([
        //     'name' => 'baju 1',
        //     'description' => 'baju 1 ini sangat bagus',
        //     'price' => 100000,
        //     'image' => '1.jpg',
        //     'stock' => 10,
        // ]);

        // Product::create([
        //     'name' => 'baju 2',
        //     'description' => 'baju 2 ini sangat bagus',
        //     'price' => 110000,
        //     'image' => '5.jpg',
        //     'stock' => 11,
        // ]);

        // Product::create([
        //     'name' => 'baju 3',
        //     'description' => 'baju 3 ini sangat bagus',
        //     'price' => 120000,
        //     'image' => '3.jpg',
        //     'stock' => 12,
        // ]);

        // Product::create([
        //     'name' => 'baju 4',
        //     'description' => 'baju 4 ini sangat bagus',
        //     'price' => 130000,
        //     'image' => '4.jpg',
        //     'stock' => 13,
        // ]);
    }
}
