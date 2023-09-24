<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $res = Http::withHeaders([
            'key' => '4930838704876d8aa5335a730bc8f4d4'
        ])->get('https://api.rajaongkir.com/starter/city');

        $cities = [];
        $data = $res->json('rajaongkir.results');

        foreach ($data as $city) {
            array_push($cities, ["id" => (int)$city["city_id"], "province_id" => (int)$city['province_id'], "type" => $city["type"], 'name' => $city["city_name"]]);
        }

        City::insert($cities);
    }
}
