<?php

namespace Database\Seeders;

use App\Models\CityModel;
use Illuminate\Database\Seeder;

class UserWeatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $city = $this->command->getOutput()->ask('Unesite ime grada');
        if($city == null){
            $this->command->getOutput()->error('Niste unijeli naziv grada!'); 
        }

        $temperature = $this->command->getOutput()->ask('Unesite temperaturu');
        if($temperature == null){
            $this->command->getOutput()->error('Niste unijeli temperaturu!'); 
        }

        $country = $this->command->getOutput()->ask('Unesite naziv drzave');
        if($country == null){
            $this->command->getOutput()->error('Niste unijeli naziv drzave!'); 
        }

        CityModel::create([
            'city'=>$city,
            'country'=>$country,
            'currentTemperatures'=>$temperature
        ]);

        $this->command->getOutput()
->info('Uspjesno ste unijeli novi grad'.''.$city.''.'koji se nalazi u drzavi'.''.$country.''.'sa temperaturom od'.''.$temperature.''.'stepeni celzijusa');    }
}
