<?php

namespace App\Console\Commands;

use App\Models\CityForecastModel;
use App\Models\ForecastsModel;
use App\Services\WeatherService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;


class newCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:currentWeather {city}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        
        
        // $response =Http::get('http://api.weatherapi.com/v1/current.json',[
        //     'key' => '0d637e4980354042815151746232309',
        //     'q' => $city,
        //     'aqi' => 'no',
        //     'lang' =>'sr',
        
        // ]);
            $city = $this->argument('city');
            $weatherService = new WeatherService();
            $jsonResponse = $weatherService->getForecast($city);
        
        
        if(isset($jsonResponse['error'])){
            die($jsonResponse['error']['message']);
        }else{
            CityForecastModel::create([
                'name' => $jsonResponse['location']['name']
            ]);
            $nameId = $jsonResponse['location']['name'];
            $cityFind = CityForecastModel::where('name',$nameId)->first();
            ForecastsModel::create([
                'city_id' => $cityFind['id'],
                'temperature' => $jsonResponse['current']['temp_c'],
                'date' => $jsonResponse['location']['localtime'],
                'weatherType' => $jsonResponse['current']['condition']['text'],
                'probability' => $jsonResponse['current']['humidity']
            ]);
            
            
            // $cityData = [
            //     'name' => $jsonResponse['location']['name'],
                
            // ];
            // dd($cityData);
            // $jsonResponse = $response->body();
            // $jsonResponse = json_decode($jsonResponse);
            // dd($jsonResponse);
            // dd($jsonResponse->location->name."-".$jsonResponse->location->country."-".$jsonResponse->location->localtime."--".$jsonResponse->current->condition->text);
        }
        
    }
}
