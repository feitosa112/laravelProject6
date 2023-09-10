<?php

namespace App\Http\Controllers;

use App\Models\CityForecastModel;
use App\Models\ForecastsModel;
use Carbon\Carbon;
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
        // $prognoze = ForecastsModel::where(['city_id' => $city->id])->get();
        
        
        return view('forecasts',compact('city'));
    }

   public function insert(Request $request){
        $request->validate([
            'temperature'=> 'required|string',
            'city_id' =>'required'
        ]);
        
        $weatherType = ForecastsModel::WEATHERS[rand(0,2)];
        $probability = null;
        if($weatherType == "rainy" || $weatherType == "snowy"){
            $probability = rand(1,100);
        }
        ForecastsModel::create([
            'temperature'=>$request->get('temperature'),
            'city_id' => $request->get('city_id'),
            'date' => Carbon::now()->addDays(rand(1,30)),
            'weatherType' => $weatherType,
            'probability' =>$probability
        ]);
        return redirect()->back()->with('insertTemp', 'Uspjesno ste dodali novu temperaturu');

   }


}
