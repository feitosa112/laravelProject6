<?php

namespace App\Http\Controllers;

use App\Models\CityForecastModel;
use App\Models\ForecastsModel;
use Illuminate\Http\Request;

class ForecastController extends Controller
{

    public function allCities()
    {
        $cityfor = CityForecastModel::all();
        return view('cities', compact('cityfor'));
    }

    public function index(CityForecastModel $city)
    {
        $prognoze = ForecastsModel::where(['city_id' => $city->id])->get();
        
        
        return view('forecasts', compact('prognoze'));
    }


}
