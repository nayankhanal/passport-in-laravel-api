<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Country;
use App\Models\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $cities_with_countryId = [];

        $nepal_cities = ['Kathmandu', 'Damak', 'Biratnagar', 'Pokhara'];
        $usa_cities = ['Los Angeles', 'Las Vegas', 'New York', 'Washington DC'];
        $france_cities = ['Paris', 'Lyon'];
        $japan_cities = ['Tokyo', 'Hiroshima'];
        $uk_cities = ['London', 'Oxford', 'Southamton'];
        $india_cities = ['Dheli', 'Mumbai', 'Chennai', 'Bengaluru', 'Kolkata', 'Beijing'];
        $china_cities = ['Beijing', 'Shanghai', 'Wuhan'];
        $canada_cities = ['Toronto', 'Ottawa'];

        $countries = Country::all();



        foreach ($countries as $country) {
            switch ($country->name) {
                case 'Nepal':
                    foreach ($nepal_cities as $nepal_city) {
                        $cities_with_countryId[] = ['name'=>$nepal_city, 'country_id'=>$country->id];
                    }
                    break;
                case 'USA':
                    foreach ($usa_cities as $usa_city) {
                        $cities_with_countryId[] = ['name'=>$usa_city, 'country_id'=>$country->id];
                    }
                    break;
                case 'France':
                    foreach ($france_cities as $france_city) {
                        $cities_with_countryId[] = ['name'=>$france_city, 'country_id'=>$country->id];
                    }
                    break;
                case 'Japan':
                    foreach ($japan_cities as $japan_city) {
                        $cities_with_countryId[] = ['name'=>$japan_city, 'country_id'=>$country->id];
                    }
                    break;
                case 'UK':
                    foreach ($uk_cities as $uk_city) {
                        $cities_with_countryId[] = ['name'=>$uk_city, 'country_id'=>$country->id];
                    }
                    break;                   
                case 'India':
                    foreach ($india_cities as $india_city) {
                        $cities_with_countryId[] = ['name'=>$india_city, 'country_id'=>$country->id];
                    }
                    break;
                case 'China':
                    foreach ($china_cities as $china_city) {
                        $cities_with_countryId[] = ['name'=>$china_city, 'country_id'=>$country->id];
                    }
                    break;   
                case 'Canada':
                    foreach ($canada_cities as $canada_city) {
                        $cities_with_countryId[] = ['name'=>$canada_city, 'country_id'=>$country->id];
                    }
                    break;          
                default:
                    # code...
                    break;
            }
        }

        foreach ($cities_with_countryId as $city) {
            City::updateOrCreate(
                ['name'=>$city['name']],
                $city
            );
        }
    }
}
