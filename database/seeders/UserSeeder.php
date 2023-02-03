<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'rohid',
            'username' => 'rohidtzz',
            'password' => bcrypt('qwerty0009'),
            'email' => 'gemersrasta@gmail.com',
            'no_hp' => '123213',
            'role' => 'admin',
            // 'nik' => '21121121212112'
        ]);

        // User::create([
        //     'name' => 'staff',
        //     'username' => 'staff',
        //     'password' => bcrypt('staff'),
        //     'email' => 'staff@gmail.com',
        //     'no_hp' => '866778',
        //     'role' => 'staff'
        // ]);

        // User::create([
        //     'name' => 'user',
        //     'username' => 'user',
        //     'password' => bcrypt('user'),
        //     'email' => 'user@gmail.com',
        //     'no_hp' => '087898780987',
        //     'role' => 'user'
        // ]);

    }
}
