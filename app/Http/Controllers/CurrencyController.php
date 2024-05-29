<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    function switchCurrency(Request $request)
    {
        echo $request->currency;
        return redirect()->back();
    }
}
