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

    public function index(Request $request, $id)
    {
        $temperature = ForecastsModel::where('city_id', $id)->get();
        $city = CityForecastModel::find($id);
        // $cities = ForecastsModel::with(['city'=>function($query){$query->select('id','name');}])->where('city_id',$id)->get();
        return view('forecasts', compact('temperature', 'city'));
    }


}
