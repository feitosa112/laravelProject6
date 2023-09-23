<?php

namespace App\Http\Controllers;

use App\Models\UserCities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCitiesController extends Controller
{
    public function favourite(Request $request,$city){
        
        UserCities::create([
            'city_id' => $city,
            'user_id' => Auth::user()->id
        ]);
        
        
        return redirect()->back()->with('addFav','You have successfully added this city to your favorites');
    }

    public function deleteFav($city){

        $userFavourite = UserCities::where([
            'city_id' => $city,
            'user_id' => Auth::user()->id
        ])->first();

        $userFavourite->delete();

        return redirect()->back()->with('deleteFav','You have successfully deleted this city from your favorites');

        
    }
}
