<?php

namespace App\Http\Controllers;

use App\Models\CurrencyModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class CurrencyController extends Controller
{
    public function todaysExchangeRate(){
        Artisan::call('exchange:rate');

        
        return redirect()->back()->with('currency','You have successfully updated the course list');
    }
}
