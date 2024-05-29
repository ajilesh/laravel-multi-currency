<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;
use App\Models\Currency;

class SetCurrency
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->has('currency')) {
            $currency = $request->get('currency');
            $currencyExists = Currency::where('code', $currency)->exists();
            if ($currencyExists) {
                Session::put('currency', $currency);
            }
        }

        if (!Session::has('currency')) {
            Session::put('currency', 'USD'); // Default currency
        }
        return $next($request);
    }
}
