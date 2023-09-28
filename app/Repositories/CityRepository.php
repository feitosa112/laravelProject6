<?php 

namespace App\Repositories;


use App\Models\CityModel;
use Illuminate\Support\Facades\DB;

class CityRepository {
    private $cityModel;

    public function __construct() {
        $this->cityModel = new CityModel();
    }

    public function createCity($request){
        $this->cityModel->create([
            'city' => $request->get('city'),
            'country' => $request->get('country'),
            'currentTemperatures' => $request->get('temperature'),
        ]);
    }


    public function deleteCityRepo($id){
        return $this->cityModel->where(['id'=>$id]);
    }


    public function updateCityRepo($request , $id){
        $city = $request->city;
        $country = $request->country;
        $currentTemperatures = $request->temperature;
        $id = $request->id;

        DB::update('UPDATE city_temperatures SET city= :city,country= :country,currentTemperatures= :currentTemperatures WHERE id= :id', ['id' => $id, 'city' => $city, 'country' => $country, 'currentTemperatures' => $currentTemperatures]);

    }

    
}