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


    public function weatherType($weatherType){
        if($weatherType == 'sunny'){
            $icons = ' fa-sun';
        }elseif($weatherType == "rainy"){
            $icons = 'fa-cloud-rain';
        }elseif ($weatherType == "snowy"){
            $icons = 'fa-snowflake';
        }
        return $icons;
    }
}
?>
