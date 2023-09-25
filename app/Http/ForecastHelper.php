<?php
namespace App\Http;

class ForecastHelper {
    public static function colorByTemperature($temperature){


       

        if($temperature <=0){
            $boja = "lightblue";
        }elseif ($temperature >=1 && $temperature<=15) {
            $boja = "blue";
        }elseif($temperature > 15 && $temperature <=25){
            $boja = "green";
        }else{
            $boja = "red";
        }
        return $boja;
    }

    
    const WEATHER_ICONS = [
        'rainy' => 'fa-cloud-rain',
        'snowy' => 'fa-snowflake',
        'sunny' => 'fa-sun',
        'cloudy' => 'fa-cloud',
        
    ];

    public function weatherType($type){
       
       
        $icons = self::WEATHER_ICONS[$type];
        return $icons;
    }
}
?>
