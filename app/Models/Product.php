<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\Currency;

class Product extends Model
{
    use HasFactory;

    public function getPriceAttributes($value)
    {
        return Currency::convert($value);
    }
}
