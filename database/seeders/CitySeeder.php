<?php

namespace Database\Seeders;

use App\Models\CityForecastModel;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for($i = 0; $i < 100; $i++){
            CityForecastModel::create([
                'name' => $faker->city
            ]);
        }
    }
}
