<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::insert([
            'name' => "Admin",
            'email' => "bionevid.admin@gmail.com",
            'password' => Hash::make("admin123", [
                'rounds' => 12,
            ]),
            'address' => "Sumbersari, Lowokwaru, Kota Malang",
            'phone' => '081330781918',
            'role' => 'admin'
        ]);
    }
}
