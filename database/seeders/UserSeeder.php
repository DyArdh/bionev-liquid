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
            'bod' => "2000-01-01",
            'gender' => "male",
            'address' => "Sumbersari, Lowokwaru, Kota Malang",
            'phone' => '081330781918',
            'password' => Hash::make("admin123", [
                'rounds' => 12,
            ]),
            'role' => 'Admin'
        ]);

        User::insert([
            'name' => "User",
            'bod' => "2000-01-01",
            'gender' => "male",
            'address' => "Sumbersari, Lowokwaru, Kota Malang",
            'phone' => '081330781918',
            'email' => "bionevid.user@gmail.com",
            'password' => Hash::make("user123", [
                'rounds' => 12,
            ]),
        ]);
    }
}
