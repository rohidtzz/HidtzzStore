<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Address;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Address::create([
            'city_id' => null,
            'province_id' => null,
            'name' => null,
            'kode_pos' => null,
            'alamat' => null,
            'user_id' => 1,
        ]);
    }
}
