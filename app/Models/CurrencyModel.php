<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrencyModel extends Model
{
    protected $table = 'currency';

    protected $fillable = [
        'currency',
        'value',
    ];
    public static function currencyForToday($cur){
        return self::where('currency',$cur)->whereDate('created_at',Carbon::now())->first();
    }
    use HasFactory;
}
