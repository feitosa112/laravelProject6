<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityForecastModel extends Model
{
    protected $table = "cities";

    protected $fillable = [
        "name",
    ];

    public function forecast(){
        return $this->hasMany(ForecastsModel::class,"city_id","id")->orderBy('date');
    }

    
    use HasFactory;
}
