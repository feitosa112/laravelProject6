<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCities extends Model
{
    protected $table = "user_cities";

    protected $fillable = [
        'user_id','city_id',
    ];

    use HasFactory;

    public function favourite()
    {
        return $this->hasOne(CityForecastModel::class, 'id','city_id');
    }
}
