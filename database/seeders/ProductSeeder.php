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
            'name' => 'baju rajut',
            'jenis' => 'Baju Biasa',
            'description' => '
            Produk 100% terjamin New, Original & Authentic!<br>
            Di impor langsung dari Coach Warehouse di Amerika.<br>
            <br>
            Size: 27 (P) x 8 (L) x 17 (T) cm<br>
            <br>
            Pembelian Produk sudah termasuk:<br>
            1. Coach Card Care Instruction<br>
            2. Dust Bag<br>
            3. Paper Bag<br>
            4. Original Receipt<br>
            5. Certificate of Product<br>
            6. Price Tag<br>
            (Semua kelengkapan sama persis seperti saat membeli langsung di store)<br>
            <br>
            Kok Harga MURAH?<br>
            Produk yang kami jual adalah produk factory outlet di luar negri (contoh: US, Eropa, UK dll)<br>
            <br>
            Yakin Original?<br>
            Produk yang kami jual 100% original, Produk yang kami jual langsung dari Pabrik Coach dan karena itu kualitas nya sudah standar dengan produk yang di jual di toko.<br>
            <br>
            100% Garansi bila barang yang kami jual palsu!<br>
            <br>
            RESELLER ARE WELCOME!<br>
            (Special Price untuk pembelian diatas 3pcs)<br>
            <br>
            Happy Shopping!<br>
            LuckyWarehouse.',
            'price' => 125000,
            'image' => '1.jpg',
            'stock' => 350,
        ]);

        Product::create([
            'name' => 'baju ultras',
            'jenis' => 'Baju biasa',
            'description' => '
            Produk 100% terjamin New, Original & Authentic!<br>
            Di impor langsung dari Coach Warehouse di Amerika.<br>
            <br>
            Size: 27 (P) x 8 (L) x 17 (T) cm<br>
            <br>
            Pembelian Produk sudah termasuk:<br>
            1. Coach Card Care Instruction<br>
            2. Dust Bag<br>
            3. Paper Bag<br>
            4. Original Receipt<br>
            5. Certificate of Product<br>
            6. Price Tag<br>
            (Semua kelengkapan sama persis seperti saat membeli langsung di store)<br>
            <br>
            Kok Harga MURAH?<br>
            Produk yang kami jual adalah produk factory outlet di luar negri (contoh: US, Eropa, UK dll)<br>
            <br>
            Yakin Original?<br>
            Produk yang kami jual 100% original, Produk yang kami jual langsung dari Pabrik Coach dan karena itu kualitas nya sudah standar dengan produk yang di jual di toko.<br>
            <br>
            100% Garansi bila barang yang kami jual palsu!<br>
            <br>
            RESELLER ARE WELCOME!<br>
            (Special Price untuk pembelian diatas 3pcs)<br>
            <br>
            Happy Shopping!<br>
            LuckyWarehouse.',
            'price' => 120000,
            'image' => '2.jpg',
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
