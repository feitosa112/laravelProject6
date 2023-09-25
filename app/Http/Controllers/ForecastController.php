<?php

namespace App\Http\Controllers;

use App\Models\CityForecastModel;
use App\Models\ForecastsModel;
use App\Models\UserCities;
use App\Services\WeatherService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class ForecastController extends Controller
{

    public function allCities()
    {
        $cityfor = CityForecastModel::all();
        return view ('cities', compact('cityfor'));
    }

    public function index(CityForecastModel $city,UserCities $favourite)
    {
        // $prognoze = ForecastsModel::where(['city_id' => $city->id])->get();
        $userFavorites = Auth::user()->cityFavorites;
        $userFavorites = $userFavorites->pluck('city_id')->toArray();

        $userFav1 = UserCities::where([
            'user_id' => Auth::user()->id
        ])->get();
        
        
        return view('forecasts',compact('city','userFavorites','userFav1'));
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

   public function search(Request $request){
    $cityName = $request->get('city');

    $cities = CityForecastModel::with('toDay')->where('name','LIKE', "%$cityName%")->get();
    
    if(count($cities)==0){
        $cityApi = Artisan::call('weather:currentWeather',['city' => $cityName]);
        

    }else{
        
    return view('searchResults',compact('cities'));
    }
   }

   public function singleCity(CityForecastModel $city){

    
    $weatherService = new WeatherService();
    $jsonresponse = $weatherService->getSunsetAndSunrise($city->name);
    $sunrise = $jsonresponse['astronomy']['astro']['sunrise'];
    $sunset = $jsonresponse['astronomy']['astro']['sunset'];
    
    return view('singleCity',compact('city','sunrise','sunset'));
   }


}
