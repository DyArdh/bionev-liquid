<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $res = Http::withHeaders([
            'key' => '4930838704876d8aa5335a730bc8f4d4'
        ])->get('https://api.rajaongkir.com/starter/province');

        $province = [];
        $data = $res->json('rajaongkir.results');

        foreach ($data as $city) {
            array_push($province, ["id" => (int)$city["province_id"], 'name' => $city["province"]]);
        }

        Province::insert($province);
    }
}
