<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrencyModel extends Model
{
    protected $table = 'currency';

    protected $fillable = [
        'currency',
        'value',
    ];
    use HasFactory;
}
