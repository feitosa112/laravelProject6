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
        if($weatherType == 'synny'){
            $icons = '<i class="fa-solid fa-sun"></i>';
        }elseif($weatherType == "rainy"){
            $icons = '<i class="fa-solid fa-cloud-rain"></i>';
        }elseif ($weatherType == "snowy"){
            $icons = '<i class="fa-regular fa-snowflake"></i>';
        }
    }
}
?>
