<?php

namespace App\Helpers;

class Currency 
{
    public static function convert($amount)
    {
        $currency = \Session::get('currency');
        if($currency === 'USD')
        {
            $amount = $amount;
            return $amount;

        }
        $currencyExist = \App\Models\Currency::where('code',$currency)->first();
        if($currencyExist)
        {
            return $currencyExist->exchange_rate * $amount;
        }
    }
}