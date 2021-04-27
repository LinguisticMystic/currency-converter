<?php

namespace App\Http\Controllers;

use App\Services\Currencies\Import\ImportCurrenciesService;
use App\Services\Currencies\Show\GetCurrencyRateRequest;
use App\Services\Currencies\Show\GetCurrencyRateService;
use Illuminate\Http\Request;

class CurrenciesController extends Controller
{
    private ImportCurrenciesService $importCurrenciesService;
    private GetCurrencyRateService $getCurrencyRateService;

    public function __construct(
        ImportCurrenciesService $importCurrenciesService,
        GetCurrencyRateService $getCurrencyRateService
    )
    {
        $this->importCurrenciesService = $importCurrenciesService;
        $this->getCurrencyRateService = $getCurrencyRateService;
    }

    public function import()
    {
        $this->importCurrenciesService->execute();

        return redirect('/');
    }

    public function exchange(Request $request)
    {
        $this->validate($request, [
            'symbol' => 'required',
            'amount' => 'required|numeric|gt:0'
        ],
        [
            'amount.required' => 'Please enter an amount to exchange.'
        ]);

        $symbol = $request['symbol'];
        $amount = $request['amount'];

        $exchangeRate = $this->getCurrencyRateService->execute(new GetCurrencyRateRequest($symbol));
        session()->put('currencyInfo', [$symbol, $amount, $exchangeRate]);

        return redirect('/');
    }
}
