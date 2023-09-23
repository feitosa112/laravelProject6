<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Nette\Utils\Json;

class newCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:currentWeather';

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
        $url = 'http://api.weatherapi.com/v1/current.json?key=0d637e4980354042815151746232309&q=Celinac&aqi=no';
        $response = Http::get($url);
        $jsonResponse = $response->body();
        $jsonResponse = json_decode($jsonResponse);
        dd($jsonResponse->location->name."-".$jsonResponse->location->localtime);
        
    }
}
