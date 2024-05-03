<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    public function run(): void
    {
        $countries = [
            ['name'=>'Nepal'],
            ['name'=>'India'],
            ['name'=>'China'],
            ['name'=>'USA'],
            ['name'=>'UK'],
            ['name'=>'France'],
            ['name'=>'Japan'],
            ['name'=>'Canada'],
        ];

        foreach ($countries as $country) {
            Country::updateOrCreate(
                ['name'=>$country['name']],
                $country
            );
        }

    }
}
