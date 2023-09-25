<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Nette\Utils\Json;
use PhpParser\Node\Stmt\Catch_;

class EuroDolarCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'exchange:rate {currency}';

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
        try
        {
            $currency = $this->argument('currency');
            $response = Http::get(env('CURRENCY_API_URL').'/latest?',[
                'access_key'=> env('CURRENCY_API_KEY'),
                'base' => 'EUR',
                'symbols' => $currency
    
    
            ]);
            if($response->status() ==200){
                $jsonResponse = $response->body();
                $jsonResponse = json_decode($jsonResponse);
                
                dd($jsonResponse->rates);
            }else
            {
                $this->error('Nije moguce dobiti informacije o kursu');
            }
        }
        catch(\Exception $e) 
        {
            $this->error('Doslo je do greske'.$e->getMessage());
        }
        
    }
}
