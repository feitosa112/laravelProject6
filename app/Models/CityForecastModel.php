<?php

namespace App\Models;

use Carbon\Carbon;
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

    public function toDay(){
        return $this->hasOne(ForecastsModel::class,"city_id","id")->orderBy('date')->whereDate('date',Carbon::now());

    }

    
    use HasFactory;
}
