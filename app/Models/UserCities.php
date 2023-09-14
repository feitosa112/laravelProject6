<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCities extends Model
{
    protected $table = "product";

    protected $fillable = [
        'user_id','city_id',
    ];

    use HasFactory;
}
