<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForecastsModel extends Model
{

    protected $table = "forecasts";

    protected $fillable = [
        "city_id", "temperature", "date", "name","weatherType","probability"
    ];
    use HasFactory;
    const WEATHERS = ["rainy","sunny","snowy","cloudy"];

    public function city()
    {
        return $this->belongsTo(CityForecastModel::class, 'city_id');
    }
    
    
}
