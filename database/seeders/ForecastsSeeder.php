<?php

namespace Database\Seeders;

use App\Models\CityForecastModel;
use App\Models\ForecastsModel;
use Carbon\Carbon;
use Illuminate\Database\Seeder;


class ForecastsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = CityForecastModel::all();
       
        foreach( $cities as $city ){
            for ($i = 0; $i < 5 ; $i++) {
                $weatherType = ForecastsModel::WEATHERS[rand(0,3)];
                $probability = null;
                if($weatherType == "rainy" || $weatherType == "snowy" || $weatherType == "cloudy"){
                    $probability = rand(1,100);
                }

                if($weatherType == 'rainy'){
                    $temperature = rand(-10,20);
                }elseif($weatherType == 'cloudy'){
                    $temperature = rand(0,15);
                }elseif($weatherType == 'snowy'){
                    $temperature  = rand(-20,1);
                }else {
                    $temperature = rand(15,30);
                }
                
                ForecastsModel::create([
                    'city_id' => $city->id,
                    'temperature' => $temperature,
                    'date' => Carbon::now()->addDays(rand(1,30)),
                    "weatherType"=>$weatherType,
                    "probability"=>$probability
                ]);
                $this->command->getOutput()->info("Uspjesno ste dodali temperature za gradove");        
            }
        }
    }
}
