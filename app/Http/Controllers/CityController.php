<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCityRequest;
use App\Http\Requests\UpdateCityRequest;
use App\Models\CityModel;
use App\Repositories\CityRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
{
    private $cityRepo;

    public function __construct() {
        $this->cityRepo = new CityRepository();
    }
    //funkcija za prikaz svih gradova sa temperaturama
    public function showTemperatures()
    {
        $temperatures = CityModel::all();
        return view('temperatures.cityTemperatures', compact('temperatures'));
    }

    //funkcija za prikaz forme za dodavanje novog grada
    public function addCityView()
    {

        return view('temperatures.addCityView');
    }

    //funkcija za dodavanje novog unosa iz forme,novi grad
    public function addCity(CreateCityRequest $request)
    {
        
        $this->cityRepo->createCity($request);

        return redirect(route('city.temperaturesView'))->with('addCity', 'You have successfully added a new city!');
    }




    //funkcija za brisanje odredjenog grada na osnovu id broja
    public function deleteCity($id)
    {
        $city = $this->cityRepo->deleteCityRepo($id);

        if ($city == null) {
            echo "Ovaj product ne postoji";
        } else {
            $city->delete();
        }

        return redirect()->back()->with('deleteCity', 'City deleted!!');
    }



    //funkcija za prikaz forme za editovanje podaataka o gradu
    public function editView($id)
    {
        $city = CityModel::find($id);
        return view('temperatures.edit-form', compact('city'));
    }

    //funkcija za unos podataka u bazu,iz forme za izmjenu podataka o gradu
    public function updateCity(UpdateCityRequest $request, $id)
    {
   
        $this->cityRepo->updateCityRepo($request,$id);
        return redirect(route('city.temperaturesView'))->with('updateCity', 'You have successfully edited the city!');

    }
}
