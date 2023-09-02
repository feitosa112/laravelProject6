<?php

namespace App\Http\Controllers;

use App\Models\CityModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
{
    //funkcija za prikaz svih gradova sa temperaturama 
    public function showTemperatures(){
        $temperatures = CityModel::all();
        return view('temperatures.cityTemperatures',compact('temperatures'));
    }

    //funkcija za prikaz forme za dodavanje novog grada
    public function addCityView(){

        return view('temperatures.addCityView');
    }

    //funkcija za dodavanje novog unosa iz forme,novi grad
    public function addCity(Request $request){
        $request->validate([
            'city'=>'required|string|unique:city_temperatures',
            'country'=>'required|string',
            'temperature'=>'required|string',
        ]);

        CityModel::create([
            'city'=>$request->get('city'),
            'country'=>$request->get('country'),
            'currentTemperatures'=>$request->get('temperature'),

        ]);

        return redirect(route('temperaturesView'))->with('addCity','You have successfully added a new city!');
    }

    //funkcija za brisanje odredjenog grada na osnovu id broja
    public function deleteCity($id){
        $city = CityModel::find($id);

        if($city == null){
            echo "Ovaj product ne postoji";
        }else{
            $city->delete();
        }

        return redirect()->back()->with('deleteCity','City deleted!!');
    }

    //funkcija za prikaz forme za editovanje podaataka o gradu
    public function editView($id){
        $city = CityModel::find($id);
        return view('temperatures.edit-form',compact('city'));
    }

    //funkcija za unos podataka u bazu,iz forme za izmjenu podataka o gradu
    public function updateCity(Request $request,$id){
        $city = $request->city;
        $country = $request->country;
        $currentTemperatures = $request->temperature;
        $id = $request->id;
         
        // dd($request->all());
        $request->validate([
            'city'=>'required|string',
            'country'=>'required|string',
            'temperature'=>'required|string',
        ]);
        

        DB::update('UPDATE city_temperatures SET city= :city,country= :country,currentTemperatures= :currentTemperatures WHERE id= :id',['id' => $id,'city' => $city, 'country' => $country, 'currentTemperatures' => $currentTemperatures]);
        return redirect(route('temperaturesView'))->with('updateCity','You have successfully edited the city!');

    }
}
