<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityModel extends Model
{
    protected $table = "city_temperatures";

    protected $fillable = [
        "city", "country", "currentTemperatures",
    ];
    use HasFactory;
}
