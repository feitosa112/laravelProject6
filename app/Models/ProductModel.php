<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table = "product";

    protected $fillable = [
        "name", "price", "amount", "description", "userID",
    ];
    use HasFactory;
}
