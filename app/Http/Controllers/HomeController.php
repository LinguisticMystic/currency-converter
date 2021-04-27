<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        $symbols = DB::table('currencies')->pluck('symbol');

        $currencyInfo = $request->session()->get('currencyInfo');
        $request->session()->flush();

        return view('home', [
            'symbols' => $symbols,
            'currencyInfo' => $currencyInfo,
            'flags' => require_once('../public/flags.php')
        ]);
    }
}
