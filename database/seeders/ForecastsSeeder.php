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
                $prevTemp = null;
                if($prevTemp !== null){
                    $minTemp = $prevTemp-5;
                    $maxTemp = $prevTemp+5;
                    $temperature = rand($minTemp,$maxTemp);
                }else{
                    switch($weatherType){
                        case 'rainy':
                            $temperature = rand(-10,20);
                            break;
                        case 'cloudy':
                            $temperature = rand(0,15);
                            break;
                        case 'snowy':
                            $temperature  = rand(-20,1);
                            break;
                        case 'sunny':
                            $temperature = rand(15,30);
                            break;
                    }
                }
                
                
                
                
                ForecastsModel::create([
                    'city_id' => $city->id,
                    'temperature' => $temperature,
                    'date' => Carbon::now()->addDays($i),
                    "weatherType"=>$weatherType,
                    "probability"=>$probability
                ]);
                $prevTemp = $temperature;
                $this->command->getOutput()->info("Uspjesno ste dodali temperature za gradove");        
            }
        }
    }
}
